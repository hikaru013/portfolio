@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            商品画像
        </div>
        <div class="col">
            <div class="card">出品者名</div>
            <div class="card">いいね</div>
            <div class="card">出品者の説明</div>
        </div>
    </div>

    <div class="row">
        <span>このショップの商品</span>
    </div>

    <div class="row">
        <div class="card">
            <img src ="" class="card-img-top">
            <span class="fs-5">商品名</span>
            <span class="fs-5">値段</span>
        </div>
    </div>
</div>


@endsection