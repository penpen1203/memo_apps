@extends('layout')
@section('content')
    <h1>記事一覧</h1>
    <hr>
    <div class="container-flex">
    @foreach ($articles as $article)
    <div class="card card-item">
        <div class="card-body">
            <div class="card-article-author">
                <h6>{{$article->user->name}}</h6>
                <h6>{{$article->created_at->format('Y/m/d H:i')}}</h6>
            </div>
            @if(isset($article->image))
                <a href="{{url('articles',$article->id)}}" class="card-image-link">
                    <img src="https://s3.amazonaws.com/first-laravel-app/public/images/{{$article->image}}" alt="" class="card-image">
                </a>
            @else
                <img src="storage/images/{{$article->image}}" alt="" style="display:none;">
            @endif
            <a href="{{url('articles',$article->id)}}" class="card-title-link">
                <h5 class="card-title">{{$article->title}}</h5>
            </a>
            <p class="card-text">{!! nl2br(e($article->body)) !!}</p>
            <div class="bottom-container" style="position: absolute;bottom: 0.6rem;">
                <a href="{{url('articles',$article->id)}}" class="card-link">詳細</a>
                @unless($article->tags->isEmpty())
                @foreach($article->tags as $tag)
                <a href="{{ action('ArticlesController@tag',[$tag->id]) }}" class="card-link">
                    #{{$tag->name}}
                </a>
                @endforeach
                @endunless
            </div>

        </div>
    </div>
    @endforeach
    </div>
        <div class="paginate paginate-extend">
        {{$articles->links()}}
    </div>

@endsection