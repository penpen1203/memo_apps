@extends('layout')
@section('content')
<div class="article-container">
    @if(isset($article->image))
        <img src="{{asset('storage/images/'.$article->image)}}" alt="" class="article-image">
    @else
        <img src="{{asset('storage/images/'.$article->image)}}" alt="" style="display:none;">
    @endif

    <div class="container-top">
        <div class="article-title">
            <h1>{{$article->title}}</h1>
        </div>
    </div>

    <div class="article-author">
        <h6>{{$article->user->name}}</h6>
        <h6>{{$article->created_at->format('Y-m-d')}}</h6>
    </div>
    @auth
    <div class="container-button">
        <a href="{{ action('ArticlesController@edit',[$article->id]) }}" class='button-edit'>
            <button class="btn btn-primary" >編集
            </button>
        </a>
        {!! delete_form(['articles.destroy',$article->id]) !!}
    </div>
    @endauth

    <div class="article-content">
        <div class="body">{!! nl2br(e($article->body)) !!}</div>
    <br>
        <div>
            @unless($article->tags->isEmpty())
                    @foreach($article->tags as $tag)
                    <a href="{{ action('ArticlesController@tag',[$tag->id]) }}" class="card-link">
                    #{{$tag->name}}
                    </a>
                    @endforeach
            @endunless

            {{-- <a href="{{ action('ArticlesController@index')}}" calss="btn btn-secondary float-right">一覧へ戻る</a> --}}
        </div>
    </div>
</div>
@endsection