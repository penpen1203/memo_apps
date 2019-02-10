@extends('layout')
@section('content')
<h1>お問い合わせ</h1>
<hr>
@include('errors.form_errors')
{!! Form::open(['route'=>'contact.send']) !!}
    <div class="form-group">
        {!! Form::label('email','メールアドレス') !!}
        @if(isset($email))
        {!! Form::text('email',$email,['class'=>'form-control']) !!}
        @else
        {!! Form::text('email',null,['class'=>'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('title','件名') !!}
        @if(isset($title))
        {!! Form::text('title',$title,['class'=>'form-control']) !!}
        @else
        {!! Form::text('title',null,['class'=>'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('body','お問い合わせ内容') !!}
        @if(isset($body))
        {!! Form::textarea('body',$body,['class'=>'form-control']) !!}
        @else
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::submit('問い合わせる',['class'=>'btn btn-primary form-control']) !!}
    </div>
{!! Form::close()!!}

</form>
@endsection