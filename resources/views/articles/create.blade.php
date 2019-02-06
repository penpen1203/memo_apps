@extends('layout')
@section('content')
<h1>New Article</h1>
<hr>
@include('errors.form_errors')
{!! Form::open(['route'=>'articles.store','files'=>true]) !!}
    @include('articles.form',['published_at'=>date('Y-m-d'),'submitButton'=>'Add Article'])
{!! Form::close()!!}
@endsection