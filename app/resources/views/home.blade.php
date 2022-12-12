
@extends('layouts.layout')

@section('content')
    <!-- <div class="user_id">
    @if( Auth::check() )
    <p>ログイン中のユーザーのclass_id：{{ Auth::user()->class_id }}</p>
    <p>ログイン中のユーザー名：{{ Auth::user()->name }}
    @endif -->
    <!-- </div> -->
    <div class="title">
        <div class="list_title"><span>人気商品一覧</span></div>
        <div class="list_more"><span><a href="{{ route('products_list')}}">もっと見る</a></span></div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        @if($loop->index === 4)
        @php break; @endphp
        @endif
        <a href="{{ route('product_detail',['id' => $product->id]) }}" class="col-lg-3 col-md-3">
            <div class="card">

                @if(empty($product->file_id))
                <img src="{{ $default_img->path }}" class="card-img"/>
                @else
                <img src="{{ $product->file_path}}" class="card-img">
                @endif

                <div class="card-body">
                    <p class="card-title">{{ $product->name }}</p>
                    <p class="card-text">¥{{ $product->price }} </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="title">
        <div class="list_title"><span>人気ショップ一覧</span></div>
        <div class="list_more"><span><a href="{{ route('shops_list')}}">もっと見る</a></span></div>
    </div>

    <div class="row">
        @foreach ($products as $product)
        @if($loop->index === 4)
        @php break; @endphp
        @endif
        <a href="#" class="col-lg-3 col-md-3">
            <div class="card">

                @if(empty($product->file_id))
                <img src="{{ $default_img->path }}" class="card-img"/>
                @else
                <img src="{{ $product->file_path}}" class="card-img">
                @endif

                <div class="card-body">
                    <p class="card-title">{{ $product->name }}</p>
                    <p class="card-text">¥{{ $product->price }} </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>


        <div class="likes">
            <div class="title">
                <div class="list_title"><span>いいね一覧</span></div>
                <div class="list_more"><span><a href="{{ route('likes_list')}}">もっと見る</a></span></div>
            </div>
            

            <div class="popular_shops">
                <div class="popular_shop_photo">
                    @foreach($default_img as $file)
                    <img src="" width="100%" height="100%">
                    @endforeach
                
                </div>
                <div class="popular_shops_detail">
                    <div class="popular_shops_title">
                        店の名前
                    </div>
                </div>
        </div>

@endsection