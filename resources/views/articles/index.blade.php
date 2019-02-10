@extends('layout')
@section('content')
    <h1>記事一覧</h1>
    <hr>
    <div class="container-flex">
    @foreach ($articles as $article)
    <div class="card card-item">
        <div class="card-body">
            <img src="/storage/images/{{$article->image}}" alt="">
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