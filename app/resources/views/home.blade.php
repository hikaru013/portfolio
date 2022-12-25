
@extends('layouts.layout')

@section('content')
    
    
    <!-- 商品 -->
    <div class="page_title">人気商品一覧</div>
    <div class="button021">
	<a href="{{route('product.index')}}">+MORE</a>
    </div>

    <div class="row" style="padding-bottom: 100px;">
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
    <div class="page_title">人気ショップ一覧</div>
        <div class="button021">
            <a href="{{route('shops_list')}}">+MORE</a>
        </div>

    <div class="row" style="padding-bottom: 100px;">
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
        <div class="page_title">いいねした商品</div>
        <div class="button021">
            <a href="{{route('likes_list')}}">+MORE</a>
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