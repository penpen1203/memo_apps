@extends('layout')
@section('content')
<h1>新規作成</h1>
<hr>
@include('errors.form_errors')
{!! Form::open(['route'=>'articles.store','files'=>true]) !!}
    @include('articles.form',['submitButton'=>'新規作成'])
{!! Form::close()!!}
@endsection