@extends('layout')
@section('content')
    <h1>Articles</h1>
    <hr>
    @auth
        <a href={{route('articles.create')}} class="btn btn-primary float-right">New Article</a>
    @endauth
    <div class="container-flex" style="display: flex;flex-wrap: wrap;">
    @foreach ($articles as $article)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-text">{{$article->body}}</p>
            <div class="bottom-container" style="position: absolute;bottom: 0.6rem;">
                <a href="{{url('articles',$article->id)}}" class="card-link">詳細</a>
                @unless($article->tags->isEmpty())
                @foreach($article->tags as $tag)
                <a href="{{ action('ArticlesController@tag',[$tag->id]) }}" class="card-link">
                    {{$tag->name}}
                </a>
                @endforeach
                @endunless
            </div>

        </div>
    </div>
    @endforeach
    </div>
@endsection