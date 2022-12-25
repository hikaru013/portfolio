@extends('layouts.layout')
@section('content')
<div class="page_title">出品した商品</div>

    <div class="row">
        @foreach ($products->unique('id') as $product)
        
        <a href="{{ route('product.show',['product' => $product->id]) }}" class="col-lg-3">
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
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>

@endsection