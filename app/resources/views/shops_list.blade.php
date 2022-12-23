@extends('layouts.layout')
@section('content')

<div class="title">
        <div class="list_title"><span>ショップ一覧</span></div>
    </div>

    <div class="row">
        @foreach ($users as $user)
            
        <a href="{{route('shop_detail',['id' => $user->id]) }}" class="col-lg-3 col-md-3">
            <div class="card">

                @if(empty($user->file->path))
                <img src="{{ $default_img->path }}" style="height:250px" class="card-img"/>
                @else
                <img src="{{ $user->file->path}}" style="height:250px" class="card-img">
                @endif

                <div class="card-body">
                    <p class="card-title">{{ $user->name }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
    
    </div>

@endsection