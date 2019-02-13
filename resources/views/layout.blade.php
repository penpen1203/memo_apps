<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/app.js" defer></script>
    <script src="/js/function.js" defer></script>
    <title>MySite</title>
</head>
<body>
    @include('navvar')
    {{--フラッシュメッセージの表示--}}
    @include('flash::message')
    {{--メインコンテンツの表示--}}
    <div class="container py-4">
    @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.2/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>