@extends('layout')
@section('content')
<h1>編集画面</h1>
<hr>
@include('errors.form_errors')
@if(isset($article->image))
    <img src="{{asset('storage/images/'.$article->image)}}" alt="" class="article-edit-image">
@else
    <img src="{{asset('storage/images/'.$article->image)}}" alt="" style="display:none;">
@endif

{!! Form::model('article',['method'=>'PATCH','route'=>['articles.update',$article->id ],'files'=>true])!!}
    @include('articles.form',['title'=>$article->title,'body'=>$article->body,'submitButton'=>'編集する'])
{!! Form::close() !!}
@endsection