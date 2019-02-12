<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'tag']);
    }
    public function index()
    {
        // $articles = Article::all();
        $articles = Article::latest('created_at')->paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $tag_list = Tag::pluck('name', 'id');
        return view('articles.create', compact('tag_list'));
    }
    public function store(ArticleRequest $request)
    {
        // $rules = [
        //     'title' => 'required|min:3',
        //     'body' => 'required',
        //     'published_at' => 'required|date'
        // ];
        // $validate = $this->validate($request, $rules);
        // Article::create($request->validated());
        $article = Auth::user()->articles()->create($request->validated());
        $article->tags()->attach($request->input('tags'));
        $options = [
            'disk' => 's3',
            'visibility' => 'public',
            'mimetype' => 'image/jpeg'
        ];
        if (!empty($request->file('image'))) {
            $path = 'app/' . $request->file('image')->store('public/images', $options);
            $article->image = basename($path);
            $article->save();
        }


        \Flash::success('記事を作成しました');
        return redirect()->route('articles.index');
        // $inputs = \Request::all();
        // // dd($inputs);
        // Article::create($inputs);
        // return redirect('articles');

    }
    public function show(Article $article)
    {
        // $article = Article::findOrFail($id);
        $user = Auth::user();
        return view('articles.show', compact('article', 'user'));
    }

    // public function prev(Article $article)
    // {
    //     $user = Auth::user();

        
    //     return view('articles.show', compact('article', 'user'));

    // }
    //

    public function edit(Article $article)
    {

        // $article = Article::findOrFail($id);
        $tag_list = Tag::pluck('name', 'id');
        return view('articles.edit', compact('article', 'tag_list'));

    }
    public function update(ArticleRequest $request, Article $article)
    {
        // $article = Article::findOrFail($id);
        $article->update($request->validated());
        $article->tags()->sync($request->input('tags'));
        $options = [
            'disk' => 's3',
            'visibility' => 'public',
            'mimetype' => 'image/jpeg'
        ];

        if (!empty($request->file('image'))) {
            $path = 'app/' . $request->file('image')->store('public/images', $options);
            $article->image = basename($path);
            $article->save();
        }

        \Flash::success('記事を更新しました');
        return redirect()->route('articles.index');
    }
    public function destroy(Article $article)
    {
        // $article = Article::findOrFail($id);
        $article->delete();
        \Flash::success('記事を削除しました');
        return redirect()->route('articles.index')->with('message', '記事を削除しました');
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        $articles = $tag->articles()->latest('created_at')->paginate(5);

        return view('articles.tag', compact('articles', 'tag'));

    }

    public function mypage()
    {
        // $articles = Article::all();
        $user = Auth::user();
        $articles = $user->articles()->latest('created_at')->paginate(5);
        return view('articles.mypage', compact('articles', 'user'));
    }

}
