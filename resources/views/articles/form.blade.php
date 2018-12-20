    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        @if(isset($title))
        {!! Form::text('title',$title,['class'=>'form-control']) !!}
        @else
        {!! Form::text('title',null,['class'=>'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('body','Body:') !!}
        @if(isset($body))
        {!! Form::textarea('body',$body,['class'=>'form-control']) !!}
        @else
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('published_at','Publish_On') !!}
        {!! Form::input('date','published_at',$published_at,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tags','Tags:') !!}
        {!! Form::select('tags[]',$tag_list,null,['class'=>'form-control','multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit($submitButton,['class'=>'btn btn-primary form-control']) !!}
    </div>
