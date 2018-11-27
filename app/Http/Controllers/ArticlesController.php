<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        $articles = Article::latest('published_at')->latest('created_at')->published()->get();
        return view('articles.index', compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store(ArticleRequest $request)
    {
        // $rules = [
        //     'title' => 'required|min:3',
        //     'body' => 'required',
        //     'published_at' => 'required|date'
        // ];
        // $validate = $this->validate($request, $rules);
        Article::create($request->validated());
        return redirect('articles');
        // $inputs = \Request::all();
        // // dd($inputs);
        // Article::create($inputs);
        // return redirect('articles');

    }
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
    //

    public function edit($id)
    {

        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->validated());
        return redirect(url('articles', [$article->id]));
    }
}
