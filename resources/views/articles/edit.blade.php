@extends('layout')
@section('content')
<h1>Edit {{$article->title}}</h1>
<hr>
@include('errors.form_errors')
{!! Form::model('article',['method'=>'PATCH','route'=>['articles.update',$article->id]]) !!}
    @include('articles.form',['title'=>$article->title,'body'=>$article->body,'published_at'=>$article->published_at->format('Y-m-d'),'submitButton'=>'Edit Article'])
{!! Form::close() !!}
@endsection