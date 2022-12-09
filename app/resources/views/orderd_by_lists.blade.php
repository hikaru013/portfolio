@extends('layouts.layout')
@section('content')
<div class="page_title">売却履歴</div>

<!-- 下記foreach -->

<div class="row">
    <div class="d-flex align-items-center justify-content-center" style="width:50%">XX時に購入されました</div>
    <div class="col">
        <img class="card-img-top" style="width:25%" src="/images/pathToYourImage.png">画像
    </div>

    <div class="col"style="width:25%">
        <div class="row">
            <div class="col-4">商品名</div>
            <div class="col-3">値段</div>
        </div>

        <div class="row">購入者の名前</div>
        <div class="row">住所</div>
    </div>
</div>
@endsection