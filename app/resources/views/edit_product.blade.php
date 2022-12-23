
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
<div class="register_product">
        <!-- 左側 -->
            <div class="container">

                <form action="{{ route('exe_edit_product',['id' => $product->id] )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- プレビュー -->
                    <div class="imagePreview" style="height:250px">
                    <!-- ０番目だけ取得 -->
                        @if(isset($file[0]))
                        <img style="height:100%; width:100%;"src="{{asset($file[0]->path)}}">
                        @endif
                    </div>

                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Choose File<input type="file" name="file" style="display:none" class="uploadFile">
                                
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly="">
                    </div>
                    

                    <div class="d-inline-flex">

                        <div class=col>
                            <div class="imagePreview">
                                @if(isset($file[1]))
                                <img style="height:100%; width:100%;"src="{{asset($file[1]->path)}}">
                                @endif
                            </div>

                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" style="display:none" name="file" class="uploadFile">
                                    </span>
                                </label>
                            <input type="text" class="form-control" readonly="">
                            </div>
                        </div>

                        <div class=col>
                            <div class="imagePreview">
                            @if(isset($file[2]))
                            <img style="height:100%; width:100%;"src="{{asset($file[2]->path)}}">
                            @endif
                            </div>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" style="display:none" class="uploadFile">
                                    </span>
                                </label>
                            <input type="text" class="form-control" readonly="">
                            </div>
                        </div>

                        <div class=col>

                            <div class="imagePreview">
                            @if(isset($file[3]))
                            <img style="height:100%; width:100%;"src="{{asset($file[3]->path)}}">
                            @endif
                            </div>

                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose File<input type="file" style="display:none" class="uploadFile">
                                    </span>
                                </label>
                            <input type="text" class="form-control" readonly="">
                            </div>
                        </div>
                    </div>
            </div>

        <!-- 右側 -->
        <div class="container">
        <div class="form-group">
                <label for="name">商品名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}{{ old('name') }}" />
              </div>

              <div class="form-group">
                <label for="price">販売金額</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}{{ old('price') }}" />
              </div>

              <div class="form-group">
                <label for="stock">在庫</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{$product->stock}} {{ old('stock') }}" />
              </div>

              <div class="form-group">
                <label for="sex">性別</label>
                <input type="radio" class="" id="sex" name="sex" value="男">メンズ</input>
                <input type="radio" class="" id="sex" name="sex" value="女">レディース</input>
                <input type="radio" class="" id="sex" name="sex" value="フリー">フリー</input>
              </div>

              <div class="form-group">
                <label for="size">性別</label>
                <input type="radio" class="" id="size" name="size" value="S">S</input>
                <input type="radio" class="" id="size" name="size" value="M">M</input>
                <input type="radio" class="" id="size" name="size" value="L">L</input>
                <input type="radio" class="" id="size" name="size" value="L">F</input>
              </div>

              <div class="form-group">
                <label for="category">性別</label>
                <input type="radio" id="cateogry" name="category" value="トップス">トップス</input>
                <input type="radio" id="cateogry" name="category" value="アウター">アウター</input>
                <input type="radio" id="cateogry" name="category" value="パンツ">パンツ</input>
                <input type="radio" id="cateogry" name="category" value="その他">その他</input>
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
    <button type='submit' class='btn btn-primary w-25 mt-3'>保存</button>
</div>
</form>

<div class ="product_delete">
    <form method="post" action="{{ route('product.destroy',['product' => $product->id]) }}">
            @csrf
            @method('delete')
            <button type="submit" class='btn btn-danger'>商品削除</button>
    </form>
            <!-- ないと画像プレビュー動作しない -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- なくても画像プレビュー動作する -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</div>

</main>
</html>
@endsection