@extends('layouts.layout')
@section('content')

<div class="page_title">詳細検索</div>

<div class="search" style="padding:20px">
    <form action="{{ route('exe_filter_search') }}" method="get">
    <input type="text" name="search" class="filter_search_window" value="{{request('search')}}" placeholder="フリーワードを入力"/>
</div>

<div class="container">
    <ul class="form-group">
        <li for="sex" style="position:relative;left: 280px;" class="list-group-horizontal">性別</li>
        <li class="list-group-item mx-auto d-flex" style="width:50%; display:flex; justify-content:space-around;">
            <div><input type="radio" class="" id="sex" name="sex" value="男">メンズ</input></div>
            <div><input type="radio" class="" id="sex" name="sex" value="女">レディース</input></div>
            <div><input type="radio" class="" id="sex" name="sex" value="フリー">フリー</input></div>
            <div><input type="radio" class="" id="sex" name="sex" value="" checked>指定しない</input></div>
        <li>
    </ul>

    <ul class="form-group">
        <li for="category" style="position:relative;left: 280px;" class="list-group-horizontal">カテゴリ</li>
        <li class="list-group-item mx-auto d-flex" style="width:50%; display:flex; justify-content:space-around;">
            <div><input type="radio" id="cateogry" name="category" value="トップス" >トップス</input></div>
            <div><input type="radio" id="cateogry" name="category" value="アウター">アウター</input></div>
            <div><input type="radio" id="cateogry" name="category" value="パンツ">パンツ</input></div>
            <div><input type="radio" id="cateogry" name="category" value="その他">その他</input></div>
            <div><input type="radio" id="cateogry" name="category" value="" checked>指定しない</input></div>
        </li>
    </ul>

    <ul class="form-group">
        <li for="size" style="position:relative;left: 280px;" class="list-group-horizontal">サイズ</li>
        <li class="list-group-item mx-auto d-flex" style="width:50%;">
            <div><input type="radio" class="" id="size" name="size" value="S"><span>S</span></input></div>
            <div><input type="radio" class="" id="size" name="size" value="M"><span>M</span></input></div>
            <div><input type="radio" class="" id="size" name="size" value="L"><span>L</span></input></div>
            <div><input type="radio" class="" id="size" name="size" value="F"><span>F</span></input></div>
            <div><input type="radio" class="" id="size" name="size" value="" checked><span>指定しない</span></input></div>
        </li>
    </ul>

    <div class='row justify-content-center'>
    <button type='submit' class='btn btn-primary w-25 mt-3'>商品検索</button>
    </form>
</div> 
</div>
@endsection