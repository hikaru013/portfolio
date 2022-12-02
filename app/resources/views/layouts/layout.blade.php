<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'portfolio') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="https://kit.fontawesome.com/b5f029821e.js" crossorigin="anonymous"></script>

    <style>app{width;100vw}</style>
 
</head>

<body>
<div class="header">
    <div class="home">
            <a href="{{route('top')}}" class="btn btn-home">ホーム</a>
    </div>

    <div class="search_frame">
    <div class="search">
        <form action="自分のサイトURL" method="get">
        <input id="sbox2"  id="s" name="s" type="text" placeholder="フリーワードを入力"/>
        <button type="submit" id="sbtn2"><i class="fas fa-search"></i></button>
        </form>
       
    </div>
    
    <div class="search_detail_frame">
    <a href="#" class="search_detail">詳細検索</a> 
    </div>
    </div>

    <div class="login"> 
        <a href="{{ route('login')}}" class="btn btn-login">ログイン</a> 
    </div>
</div>

@yield('content')

<div class="footer">
    <ul class="footer_content">
        <li class="footer_link1">
            <a href="{{route('top')}}" class="footer_text">HOME</a>
        </li>

        <li class="footer_link">
            <a href="#" class="footer_text">詳細検索</a>
        </li>

        <li class="footer_link">
            <a href="{{ route('products_list')}}" class="footer_text">商品一覧</a>
        </li>

        <li class="footer_link">
            <a href="{{ route('shops_list')}}" class="footer_text">出品者一覧</a>
        </li>

        <li class="footer_link">
            <a href="{{ route('likes_list')}}" class="footer_text">いいね一覧</a>
        </li>
    </ul>
</div>
        
</body>
</html>