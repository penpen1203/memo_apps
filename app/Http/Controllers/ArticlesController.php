<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'tag']);
    }
    public function index()
    {
        // $articles = Article::all();
        $articles = Article::latest('published_at')->latest('created_at')->published()->get();
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
        return view('articles.show', compact('article'));
    }
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
        $tag = Tag::with('id', $id)->get();
        $articles = Article::with('tags', $id)->get();

        return view('articles.tag', compact('articles'));

    }
}
