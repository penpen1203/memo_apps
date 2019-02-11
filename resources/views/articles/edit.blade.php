@extends('layout')
@section('content')
<h1>編集画面</h1>
<hr>
@include('errors.form_errors')
@if(isset($article->image))
    <img src="https://s3.amazonaws.com/first-laravel-app/public/images/{{$article->image}}" alt="" class="article-edit-image">
@else
    <img src="{{asset('storage/images/'.$article->image)}}" alt="" style="display:none;">
@endif

{!! Form::model('article',['method'=>'PATCH','route'=>['articles.update',$article->id ],'files'=>true])!!}
    @include('articles.form',['title'=>$article->title,'body'=>$article->body,'submitButton'=>'編集する'])
{!! Form::close() !!}
{{-- @unless($article->tags->isEmpty())
    @foreach($article->tags as $tag)
        @if({{$tag->name}}==="hobby")

        #{{$tag->name}}
    @endforeach
@endunless --}}


@endsection