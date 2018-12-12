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
        <a href="{{url('articles',$article->id)}}" class="card-link" style="position: absolute;bottom: 0.6rem;">詳細</a>
        <a href="#" class="card-link" style="position: absolute;bottom: 0.6rem;margin-left: 3rem;">Another link</a>
    </div>
    </div> 
    @endforeach
    </div>
@endsection