
@extends('layouts.layout')

@section('content')
<style>
    .imagePreview {
        width: 100%;
        height: 100px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }
</style>

<main>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="register_product">
        <!-- 左側 -->
            <div class="container" style="padding-top:30px;">

                <form action="{{ route('product.update',['product' => $product->id] )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    
                    <!-- プレビュー -->
                    <div class="imagePreview" style="height:250px">
                    <!-- ０番目だけ取得 -->
                        @if(!empty($file[0]))
                        <img style="height:100%; width:100%;"src="{{asset($file[0]->path)}}">
                        @endif
                    </div>

                        @if(empty($file[0]))
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Choose File<input type="file" style="display:none" name="img[]" class="uploadFile">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly="">
                    </div>
                        @endif
                    
                    

                    <div class="d-inline-flex">
                    
                        <div class=col style="padding-top:20px">
                        
                            <div class="imagePreview" style="width:104px">
                                @if(!empty($file[1]))
                                <img style="height:100%; width:100%;"src="{{(asset($file[1]->path))}}">                  
                                @endif
                            </div>

                            @if(empty($file[0]))
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" style="display:none" name="img[]" class="uploadFile">                                    </span>
                                </label>
                            <input type="text" class="form-control" readonly="">
                            </div>
                            @endif
                        </div>
                    
                        
                       
                        <div class=col style="padding-top:20px">
                            
                            <div class="imagePreview" style="width:104px">
                            @if(!empty($file[2]))
                                <img style="height:100%; width:100%;"src="{{asset($file[2]->path)}}">
                                @endif
                            </div>
                           
                            @if(empty($file[0]))
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" style="display:none" name="img[]" class="uploadFile">
                                    </span>
                                </label>
                            <input type="text" class="form-control" readonly="">
                            </div>
                            @endif
                        </div>

                        <div class=col style="padding-top:20px">

                            <div class="imagePreview" style="width:104px">
                            @if(!empty($file[3]))
                                <img style="height:100%; width:100%;"src="{{asset($file[3]->path)}}">
                            @endif
                            </div>

                            @if(empty($file[0]))
                            <div class="input-group">
                                <label class="input-group-btn">
                                
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" style="display:none" name="img[]" class="uploadFile">
                                    </span>
                                
                                </label>
                            <input type="text" class="form-control" readonly="">
                            </div>
                            @endif
                        </div>
                   
                    </div>
            </div>

        <!-- 右側 -->
        <div class="container">
        <div class="form-group">
                <label for="name">商品名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" />
              </div>

              <div class="form-group">
                <label for="price">販売金額</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" />
              </div>

              <div class="form-group">
                <label for="stock">在庫</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{$product->stock }}" />
              </div>

              <div class="form-group">
                <label for="sex">性別</label>
                <input type="radio" class="" id="sex" name="sex" value="男" {{ old('sex', $product->sex)==="男"?'checked':''}}>メンズ</input>
                <input type="radio" class="" id="sex" name="sex" value="女" {{ old('sex', $product->sex)==="女"?'checked':''}}>レディース</input>
                <input type="radio" class="" id="sex" name="sex" value="フリー" {{ old('sex', $product->sex)==="フリー"?'checked':''}}>フリー</input>
              </div>

              <div class="form-group">
                <label for="size">性別</label>
                <input type="radio" class="" id="size" name="size" value="S" {{ old('size', $product->size)==="S"?'checked':''}}>S</input>
                <input type="radio" class="" id="size" name="size" value="M" {{ old('size', $product->size)==="M"?'checked':''}}>M</input>
                <input type="radio" class="" id="size" name="size" value="L" {{ old('size', $product->size)==="L"?'checked':''}}>L</input>
                <input type="radio" class="" id="size" name="size" value="L" {{ old('size', $product->size)==="F"?'checked':''}}>F</input>
              </div>

              <div class="form-group">
                <label for="category">カテゴリ</label>
                <input type="radio" id="cateogry" name="category" value="トップス"{{ old('category', $product->category)==="トップス"?'checked':''}}>トップス</input>
                <input type="radio" id="cateogry" name="category" value="アウター"{{ old('category', $product->category)==="アウター"?'checked':''}}>アウター</input>
                <input type="radio" id="cateogry" name="category" value="パンツ"{{ old('category', $product->category)==="パンツ"?'checked':''}}>パンツ</input>
                <input type="radio" id="cateogry" name="category" value="その他"{{ old('category', $product->category)==="その他"?'checked':''}}>その他</input>
              </div>
        </div>
</div>
<div class="container">
    <div class="form-group">
        <label for="detail">商品説明</label>
        <textarea id="detail" name="detail" value="" style="width:100%; height:80px;" placeholder="商品サイズ等の説明を記載してください">
            {{$product->detail}}
        </textarea>
    </div>
</div>

<div class='row justify-content-center'>
    <button type='submit'  onclick="return confirm('変更内容を保存してよろしいですか？')"class='btn btn-primary w-25 mt-3'>保存</button>
</div>
</form>

<div class ="product_delete row justify-content-center" >
    <form method="post" action="{{ route('product.destroy',['product' => $product->id]) }}">
            @csrf
            @method('delete')
    
            <button type="submit"  onclick="return confirm('商品を削除してよろしいですか？')"class='btn btn-danger'>商品削除</button>
    </form>
</div>

@if(!empty($file[0]))
<div class="image_delete" style="width:100px">
    <form method="post" action="{{route('delete_img',['id' => $product->id])}}">
        @csrf 
        <button type="submit"  onclick="return confirm('登録画像を削除します。')"class="btn btn-primary outline">画像削除</button>
    </form>
@endif
    </div>
            <!-- ないと画像プレビュー動作しない -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- なくても画像プレビュー動作する -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</main>
</html>
@endsection