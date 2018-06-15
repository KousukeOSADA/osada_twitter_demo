<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF トークン -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Bootstrap用CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
    <!-- グローバルナビ -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <!-- アプリ名 -->
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>

            <!-- モバイル画面用のメニュー開閉ボタン -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- メニュー項目 -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- 左詰め -->
                <ul class="navbar-nav mr-auto">
                  @guest
                  @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('posts') }}">{{ __('ツイート一覧') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('users') }}">{{ __('ユーザー') }}</a>
                    </li>
                  @endguest
                </ul>
                <!-- 右詰め (上で .mr-auto を指定しているため) -->
                <ul class="navbar-nav my-2 my-lg-0">

                    <!-- 投稿ボタン -->
                    @guest
                    @else
                    <li class="nav-item">
                        <a href="{{ url('posts/create') }}" id="new-post" class="btn btn-success">
                            {{ __('ツイート') }}
                        </a>
                    </li>
                    @endguest

                    <!-- ログイン・ログアウト -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                        </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">{{ __('ログアウト') }}</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- 個別ページの内容 -->
    <div class="container mt-3"><!-- 上マージン3を確保 -->
        @yield('content')
    </div>

    <!-- Bootstrap用JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
