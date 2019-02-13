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
        {!! Form::label('body','本文',['class'=>'form-content-label']) !!}
        <div class="form-count-container">
        </div>
        @if(isset($body))
        <div class="form-count-container">
            <span class="js-form-count-view">{{mb_strlen(str_replace("\r\n", "\n", $body),'UTF-8')}}</span>
            <span>文字</span>
        </div>
        {!! Form::textarea('body',$body,['class'=>'form-control js-form-content']) !!}
        @else
        <div class="form-count-container">
            <span class="js-form-count-view">0</span>
            <span>文字</span>
        </div>
        {!! Form::textarea('body',null,['class'=>'form-control js-form-content']) !!}
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('tags','タグ') !!}
        {!! Form::select('tags[]',$tag_list,null,['class'=>'form-control','multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit($submitButton,['class'=>'btn btn-primary form-control']) !!}
    </div>
