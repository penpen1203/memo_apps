@extends('layout')
@section('content')
    <h1>Articles</h1>
    <hr>
    <a href="articles/create" class="btn btn-primary float-right">New Article</a>
    @foreach ($articles as $article)
        <article>
            <h2>
                <a href="{{url('articles',$article->id)}}">
                {{$article->title}}
                </a>
            </h2>
        </article>
    @endforeach
@endsection