@extends('layouts.layout')
@section('content')
<div class="page_title" style="margin-bottom:30px;">カート内商品</div>

<!-- 下記foreach -->

<div class="d-flex" style="width:85%;">
    
        <div class="col-lg-3 text-center">
            <img class="frame" src="storage/product_img/no_image.jpg" style="width:150px;height:150px;"alt="photo">
        </div>
    <div class="col-lg-3">
        <p class="col">{{$SessionProductName->name}}</p>
        <p class="col">{{$SessionProductQuantity}}</p>
    </div>

        <div class="col-lg-3">
            <p class="col">出品者名</p>
            <p class="col">{{$SessionProductPrice}}</p>
        </div>

    <div class="col-lg-3">
    <p class="individual_price">値段</p>
    <button>削除</buton>
    </div>
    
</div>

<div class="ABCD">
    <span style="display:block;"class="">XXX円</span>
    <button>レジへ進む</button>
</div>

<div class="EFG">
    <div>
        <p class="cart_total_price">合計：XXX円</p>
        <button>レジへ進む</button>
    </div>
</div>

@endsection