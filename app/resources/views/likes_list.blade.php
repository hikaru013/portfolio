@extends('layouts.layout')
@section('content')
<div class="liked_products">
            <div class="title">
                <div class="list_title"><span>いいね一覧</span></div>
                <div class="list_more"><span><a href="{{ route('likes_list')}}">もっと見る</a></span></div>
            </div>
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
@endsection