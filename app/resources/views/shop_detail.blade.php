@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <img src="{{asset($user_img->path)}}" style="width:250px;height:250px;">
        </div>
        <div class="col">
            <div class="card">{{$users->name}}</div>

    
            <div class="card">いいね</div>
        </div>
    </div>

    <div class="row">
        <span>このショップの商品</span>
    </div>

    <div class="row">
            @foreach($products as $product)
            <a href="{{route('product_detail',['id' => $product->id])}}" class="col-lg-2">

            <div class="card">
                @if(empty($product->file_id))
                    <img src ="{{asset($user_img->path)}}" style="height:150px" class="card-img">
                @else
                <img src ="{{asset($product->file_path)}}" style="height:150px" class="card-img">
                @endif
                <div class="card-body">
                    <p class="card-tile">{{$product->name}}</p>
                    <p class="card-text">¥{{$product->price}}</p>
                </div>
            </div>
            </a>
            @endforeach
    </div>
</div>


@endsection