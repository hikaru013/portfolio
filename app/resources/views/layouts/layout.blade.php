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

    <!-- 虫眼鏡マーク -->
    <script src="https://kit.fontawesome.com/b5f029821e.js" crossorigin="anonymous"></script>

    <style>app{width;100vw}</style>

</head>
@csrf
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
    <a href="{{route('filter_search')}}" class="search_detail">詳細検索</a> 
    </div>
    </div>
    
    @guest
    <div id="login"> 
        <a href="{{ route('login')}}" class="btn btn-login">ログイン</a> 
    </div>
    @endguest

    
    <div id="navArea">
        <nav class="navArea">
            @auth
            <div class="inner">
                <ul>
                    
                @auth 
                    @php 
                        $class_id=Auth::User()->class_id;
                        $name=Auth::User()->name;
                    @endphp
                @endauth

                    <li>Hello,{{$name}}</li>
                    <!-- 購入者専用メニュー -->
                    @if($class_id === 1)
                    <li><a href="{{route ('ordered_lists')}}">購入した商品</a></li>
                    @endif

                    <!-- 出品者専用メニュー -->
                    @if($class_id === 2)
                    <li><a href="{{ route ('view_register_product')}}">出品</a></li>
                    <li><a href="{{ route('products_list')}}">出品した商品</a></li>
                    <li><a href="{{ route('orderd_by_lists')}}">購入された商品</a></li>
                    @endif

                    <!-- 管理者専用メニュー -->
                    @if($class_id === 3)
                    <li><a href="{{ route('admin_menu') }}">管理者メニュー</a></li>
                    @endif                    

                    <li><a href="{{route('view_user_info')}}">登録情報</a></li>
                    <li><a href="{{route('likes_list')}}">いいねした商品/ショップ</a></li>

                    <li><a href="#" id="logout" class="my-navbar-item">ログアウト
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <script>
                            document.getElementById('logout').addEventListener('click', function(event){
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                            });
                        </script>
                    </a></li>
                    
                </ul>
            </div>
            @endauth
        </nav>


    <!-- <div class="toggle-btn">
        <span></span>
        <span></span>
        <span></span>

    </div> -->

    <div id="mask">
    </div>
</div>

    @auth
    <div id="toggle-btn"> 
        <span class="btn btn-login"><a>マイページ</a></span>
    </div>
    @endauth
    
</div>

<main>
@yield('content')
</main>
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
<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>