@extends('layouts.layout')
@section('content')

<div class="page_title">いいね一覧</div>

<div class="liked_products">
@if(empty($likes))
    <div class="card text-center">
            <p class="p-5">いいねした商品がありません</p>
    </div>

@else
    <div class="row">
        @foreach ($likes->unique('id') as $like)
            @if($loop->index === 8)
            @php break; @endphp
            @endif
        <a href="{{ route('product.show',['product' => $like->id]) }}" class="col-lg-3 col-md-3">
            <div class="card">

                @if(empty($like->file_id))
                <img src="{{ $default_img->path }}" style="height:250px" class="card-img"/>
                @else
                <img src="{{ $like->file_path}}" style="height:250px" class="card-img">
                @endif

                <div class="card-body">
                    <p class="card-title">{{ $like->name }}</p>
                    <p class="card-text">¥{{ $like->price }} </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endif
@endsection