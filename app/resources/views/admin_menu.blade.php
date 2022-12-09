@extends('layouts.layout')
@section('content')
<div class="title_frame">
<div class="page_title">管理者メニュー</div>
</div>

<div class="container mt-30">
<div class="card mx-auto" style="width: 30rem;">
  <ul class="list-group list-group-flush ">
  <a href="{{route('users_list')}}" class="list-group-item text-center">ユーザー一覧</a>
  <a href="{{ route('products_list') }}" class="list-group-item text-center">商品　一覧</a>
  <a href="{{ route('register') }}" class="list-group-item text-center">新規管理者 追加</a>
  </ul>
</div>
</div>
@endsection
