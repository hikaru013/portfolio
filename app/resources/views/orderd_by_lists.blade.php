@extends('layouts.layout')
@section('content')
<div class="page_title">購入された商品</div>


コピーだよ


<!-- 下記foreach -->

@foreach($datas as $data)
<div class="cart_frame">
    
        <div class="col-lg-3 text-center">
            
           @if(empty($productimg[$loop->index]->path))
            <img class="frame" src="{{$defaultimg->path}}" style="width:150px;height:150px;"alt="photo">
            @else
            <img class="frame" src="{{$productimg[$loop->index]->path}}" style="width:150px;height:150px;"alt="photo">
            @endif
        </div>

    <div class="col-lg-3">
        <p class="col">@if (isset($data['SessionProductName'])){{ $data['SessionProductName'] }} @endif</p>
        <p class="col">サイズ：@if (isset($data['SessionProductSize'])){{ $data['SessionProductSize']}} @endif</p>
    </div>

        <div class="col-lg-3">
            <p class="col">@if(isset($shopname)){{$shopname[$loop->index]->user->name}} @endif</p>
            <p class="col">@if (isset($data['SessionProductQuantity']))個数：{{$data['SessionProductQuantity']}} @endif</p>
        </div>

    <div class="col-lg-3">
    <p class="individual_price">@if (isset($data['SessionProductPrice']))￥{{$data['SessionProductPrice']}} @endif</p>


    
</div>
@endforeach


<div class="row">
    <div class="d-flex align-items-center justify-content-center" style="width:50%">XX時に購入しました</div>
    <div class="col">
        <img class="card-img-top" style="width:25%" src="/images/pathToYourImage.png">画像
    </div>

    <div class="col"style="width:25%">
        <div class="row">商品名</div>
        <div class="row">ショップ名</div>
        <div class="row">値段</div>
    </div>
</div>
@endsection