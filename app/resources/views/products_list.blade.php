@extends('layouts.layout')
@section('content')
<div class="title">
        <div class="list_title"><span>人気商品一覧</span></div>
        </div>
    <div class="row">
        @foreach ($products as $product)
        
        <a href="{{ route('product_detail',['id' => $product->id]) }}" class="col-lg-3 col-md-3">
            <div class="card">

                @if(empty($product->file_id))
                <img src="{{ $default_img->path }}" style="height:250px" class="card-img"/>
                @else
                <img src="{{ $product->file_path}}" style="height:250px" class="card-img">
                @endif

                <div class="card-body">
                    <p class="card-title">{{ $product->name }}</p>
                    <p class="card-text">¥{{ $product->price }} </p>
                </div>
            </div>
        </a>
        @endforeach
        {{ $products->links() }}
    </div>

@endsection