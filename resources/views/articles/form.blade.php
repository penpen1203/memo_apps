    <div class="form-group">
        {!! Form::label('image','画像:') !!}
        @if(isset($image))
        {!! Form::file('image',$image,['class'=>'form-control']) !!}
        @else
        {!! Form::file('image',null,['class'=>'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('title','タイトル') !!}
        @if(isset($title))
        {!! Form::text('title',$title,['class'=>'form-control']) !!}
        @else
        {!! Form::text('title',null,['class'=>'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('body','本文:') !!}
        @if(isset($body))
        {!! Form::textarea('body',$body,['class'=>'form-control']) !!}
        @else
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('tags','Tags:') !!}
        {!! Form::select('tags[]',$tag_list,null,['class'=>'form-control','multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit($submitButton,['class'=>'btn btn-primary form-control']) !!}
    </div>
