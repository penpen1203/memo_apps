<nav class="navbar navbar-expand-lg navbar-dark bg-dark navvar-container">
  <div class="container">
    <!-- ブランド表示 -->
    <a class="navbar-brand" href="{{ route('home') }}">Diary App</a>

    <!-- スマホやタブレットで表示した時のメニューボタン -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- メニュー -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- 左寄せメニュー -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">お問い合わせ</a>
        </li>
      </ul>

      <!-- 右寄せメニュー -->
        <ul class="navbar-nav">
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">ログイン</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">ユーザ登録</a>
            </li>
          @else
          <!-- ドロップダウンメニュー -->
          <li class="nav-item dropdown nav-right-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{-- ⑤ --}}
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              {{-- ⑥ --}}
              <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >
                ログアウト
              </a>
              <a class="dropdown-item" href="{{ route('mypage') }}">
                マイページ
              </a>


              {{-- ⑦ --}}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          <li>
            <a class="nav-item nav-link nav-link-extend" href="{{route('articles.create')}}">
              <button type="button" class="btn-sm btn-success btn-extend">
                <span><i class="fas fa-pencil-alt"></i></span>
                <span>投稿</span>
              </button>
            </a>
          </li>
          @endguest
      </ul>
    </div>
  </div>
</nav>