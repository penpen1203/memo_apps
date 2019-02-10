@extends('layout')
@section('content')
<div class="article-container">
    <div class="article-title">
        <h1>{{$article->title}}</h1>
    </div>
    <div class="article-author">
        <h6>{{$article->user->name}}</h6>
        <h6>{{$article->published_at->format('Y-m-d')}}</h6>
    </div>
    <div class="article-content">
        <div class="body">{{$article->body}}</div>
    </div>
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
</div>
@endsection