@extends('layouts.layout')
@section('content')

    <div class="row-lg-12 d-flex">
        <!-- 左側 -->
        <div class="col-lg-8">
            <img src="{{( asset($file->path ))}}" class="card_img_top" alt="1" width="500px" height="500px">


            <div class="card w-75 mx-auto">
            <ul class="sub_img">
            <li><img src="{{($file->path)}}" class="card_img_top" alt="2"></li>
            <li><img src="{{($file->path)}}" class="card_img_top" alt="3"></li>
            <li><img src="{{($file->path)}}" class="card_img_top" alt="4"></li>
            <li><img src="{{($file->path)}}" class="card_img_top" alt="5"></li>
            </ul>
            </div>
        </div>
        
 
    
        <!-- 右側 -->
        <div class="col-lg-4">
            <div class="card-body">
                <span class="name">{{$product->name}}</span>
            </div>

            <!-- 出品者のみ表示 -->
            @auth
            @if($product->user_id === Auth::user()->id||Auth::user()->class_id === 3)
            <a href="{{route('view_edit_product',['id' => $product->id])}}">
            <button type="button" class="btn btn-secondary">編集</button>
            </a>
            @endif
            @endauth

            <div class="card-body">¥{{$product->price}}</div>
            <div class="card-body">
                <div class="">
                    <select name="size">
                        <option value="" selected hidden>サイズ</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                    </select>

                    <select name="数量">
                        <option value="" selected hidden>数量</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="purchase">
                <button type="button" class="btn btn-outline-warning">カートに入れる</button>
                    <button type="button" class="btn btn-outline-info">購入</button>
                </div>
            </div>
                <div class="shop_detail">
                    <img src="{{($file->path)}}"alt="1">

                    <p>{{ $product->user->name }}</p>
                </div>

            
        </div>
    </div>
    </div>



<div class="product_description">
<div class="description">{{ $product->detail}}</div>
</div>

@endsection