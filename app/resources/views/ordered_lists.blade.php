@extends('layouts.layout')
@section('content')
<div class="page_title">購入履歴</div>

<!-- 下記foreach -->

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