
@extends('layouts.layout')

@section('content')

    <main class="main">
        <div class="popular_products_box">
            <div class="title">
                <div class="list_title"><span>人気商品一覧</span></div>
                <div class="list_more"><span><a href="{{ route('products_list')}}">もっと見る</a></span></div>
            </div>
            
            <div class="popular_products">
                <div class="popular_product_photo">
                写真が入る
                </div>
                <div class="popular_products_detail">
                    <div class="popular_products_price">
                        ¥4000
                    </div>

                    <div class="popular_products_title">
                        Tシャツ
                    </div>
                </div>
            </div>
        </div>

        <div class="popular_shop_box">
            <div class="title">
                <div class="list_title"><span>人気ショップ一覧</span></div>
                <div class="list_more"><span><a href="{{ route('shops_list')}}">もっと見る</a></span></div>
            </div>

            <div class="popular_shops">
                <div class="popular_shop_photo">
                写真が入る
                </div>
                <div class="popular_shops_detail">
                    <div class="popular_shops_title">
                        店の名前
                    </div>
                </div>
            </div>
        </div>

        <div class="likes">
            <div class="title">
                <div class="list_title"><span>いいね一覧</span></div>
                <div class="list_more"><span><a href="{{ route('likes_list')}}">もっと見る</a></span></div>
            </div>

            <div class="popular_shops">
                <div class="popular_shop_photo">
                写真が入る
                </div>
                <div class="popular_shops_detail">
                    <div class="popular_shops_title">
                        店の名前
                    </div>
                </div>
        </div>
    </main>
@endsection