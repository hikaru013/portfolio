
@extends('layouts.layout')

@section('content')
    <!-- <div class="user_id">
    @if( Auth::check() )
    <p>ログイン中のユーザーのclass_id：{{ Auth::user()->class_id }}</p>
    <p>ログイン中のユーザー名：{{ Auth::user()->name }}
    @endif -->
    
    
    <!-- 商品 -->
    <div class="title">
        <div class="list_title"><span>人気商品一覧</span></div>
        <div class="list_more"><span><a href="{{ route('product.index')}}">もっと見る</a></span></div>
    </div>
    <div class="row">
        @foreach ($products->unique('id') as $product)
            @if($loop->index === 8)
            @php break; @endphp
            @endif
        <a href="{{ route('product.show',['product' => $product->id]) }}" class="col-lg-3 col-md-3">
            <div class="card">

                @if(empty($product->file_id))
                <img src="{{ $default_img->path }}" style="height:250px" class="card-img"/>
                @else
                <img src="{{ $product->file_path}}" style="height:250px" class="card-img">
                @endif
            

                <div class="card-body">
                    <p class="card-title">{{ $product->name }}</p>
                    <p class="card-text">¥{{ $product->price }} </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- ショップ -->
    <div class="title">
        <div class="list_title"><span>人気ショップ一覧</span></div>
        <div class="list_more"><span><a href="{{ route('shops_list')}}">もっと見る</a></span></div>
    </div>

    <div class="row">
        @foreach ($users as $user)
            @if($loop->index === 8)
            @php break; @endphp
            @endif
        <a href="{{route('shop_detail',['id' => $user->id]) }}" class="col-lg-3 col-md-3">
            <div class="card">

                @if(empty($user->file->path))
                <img src="{{ $default_img->path }}" style="height:250px" class="card-img"/>
                @else
                <img src="{{ $user->file->path}}" style="height:250px" class="card-img">
                @endif

                <div class="card-body">
                    <p class="card-title">{{ $user->name }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    @auth
        <div class="likeed_products">
            <div class="title">
                <div class="list_title"><span>いいね一覧</span></div>
                <div class="list_more"><span><a href="{{ route('likes_list')}}">もっと見る</a></span></div>
            </div>
            <div class="row">
        @foreach ($likes->unique('id') as $like)
        @if($loop->index === 8)
        @php break; @endphp
        @endif
        <a href="{{ route('product.show',['product' => $like->id]) }}" class="col-lg-3 col-md-3">
            <div class="card">

                @if(empty($like->file_id))
                <img src="{{ $default_img->path }}" style="height:250px" class="card-img"/>
                @else
                <img src="{{ $like->file_path}}" style="height:250px" class="card-img">
                @endif

                <div class="card-body">
                    <p class="card-title">{{ $like->name }}</p>
                    <p class="card-text">¥{{ $like->price }} </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    @endauth

@endsection