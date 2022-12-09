@extends('layouts.layout')
@section('content')
<div class="title_frame">
    <div class="page_title">ユーザー 一覧</div>
</div>

<div class="container d-flex">
@foreach($users as $user)
    <div class="parent">
        <div class="div1">ID:</div>
        <div class="div2">{{$user->id}}</div>
        <div class="div3">種別：</div>
        <div class="div4">購入者</div>
        <div class="div5">名前：</div>
        <div class="div6">XXXXXXX</div>
        <div class="div7">編集</div>
        <div class="div8">削除</div>
    </div>
@endforeach
</div>

@endsection