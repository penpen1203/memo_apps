@extends('layout')
@section('content')
<div class="article-container">
    @if(isset($article->image))
        <img src="https://s3.amazonaws.com/first-laravel-app/public/images/{{$article->image}}" alt="" class="article-image">
    @else
        <img src="{{asset('storage/images/'.$article->image)}}" alt="" style="display:none;">
    @endif

    <div class="article-title">
        <h1>{{$article->title}}</h1>
    </div>

    <div class="container-top">
        <div class="article-author">
            <h6>{{$article->user->name}}</h6>
            <h6>{{$article->created_at->format('Y/m/d H:i')}}</h6>
        </div>
        @auth
            @if($user->id === $article->user->id)
            <div class="container-button">
                <a href="{{ action('ArticlesController@edit',[$article->id]) }}" class='button-edit'>
                    <button class="btn btn-primary" >編集
                    </button>
                </a>
                <!-- ボタン -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demoNormalModal">
                    削除
                </button>

                <!-- モーダルダイアログ -->
                <div class="modal fade" id="demoNormalModal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="demoModalTitle">記事の削除</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                本当に削除してよろしいですか。
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                {!! delete_form(['articles.destroy',$article->id]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endauth
    </div>
    <div class="article-content">
        <div class="body">{!! nl2br(e($article->body)) !!}</div>
    <br>
        <div>
            @unless($article->tags->isEmpty())
                    @foreach($article->tags as $tag)
                    <a href="{{ action('ArticlesController@tag',[$tag->id]) }}" class="card-link">
                    #{{$tag->name}}
                    </a>
                    @endforeach
            @endunless

            <a href="{{url('articles',$article->id-1)}}" class="link">前の記事</a>


            {{-- <a href="{{ action('ArticlesController@index')}}" calss="btn btn-secondary float-right">一覧へ戻る</a> --}}
        </div>
    </div>
</div>
@endsection