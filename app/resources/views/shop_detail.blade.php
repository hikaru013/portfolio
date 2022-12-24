@extends('layouts.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <img src="{{asset($user_img->path)}}" style="width:250px;height:250px;">
        </div>

        <div class="" style="margin-left:30px;margin-top:20px;">
        <ul class="list-group list-group-horizontal" style="width:100%">
        <li class="hij list-group-item" style="width:125px;" >ショップ名</li>
        <li class="list-group-item flex-fill" >{{$users->name}}</li>
        </ul>
        <ul class="list-group list-group-horizontal" style="width:100%">
            <li class="hij list-group-item" style="width:125px;" >住所</li>
            <li class="list-group-item  flex-fill" >{{$users->address}}</li>
        </ul>
        <span>いいね</span>
        </div>
      
    </div>

    <div class="row">
        <span>このショップの商品</span>
    </div>

    <div class="row">
            @foreach($products->unique('id') as $product)
            <a href="{{route('product.show',['product' => $product->id])}}" class="col-lg-3">

            <div class="card">
                @if(empty($product->file_id))
                    <img src ="{{asset($default_img->path)}}" style="height:200px" class="card-img">
                @else
                <img src ="{{asset($product->file_path)}}" style="height:200px" class="card-img">
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