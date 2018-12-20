@extends('layout')
@section('content')
<h1>{{$article->title}}</h1>
<hr>
<article>
    <div class="body">{{$article->body}}</div>
    <div class="published_at">{{$article->published_at->format('Y-m-d')}}</div>
</article>
<br>
<div>
    @unless($article->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($article->tags as $tag)
            <li>{{$tag->name}}</li>
            @endforeach
        </ul>
    @endunless
    @auth
        <a href="{{ action('ArticlesController@edit',[$article->id]) }}"　class="btn btn-primary">編集</a>
        {!! delete_form(['articles.destroy',$article->id]) !!}
    @endauth
    <a href="{{ action('ArticlesController@index')}}" calss="btn btn-secondary float-right">一覧へ戻る</a>
</div>
@endsection