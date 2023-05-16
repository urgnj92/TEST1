@extends('productsapp')




@section('content')



<form action="{{ route('products.update',$products->id) }}" method="POST">


@csrf

<div class="row">
    <div>
        <h1>商品情報編集</h1>
    </div>

    <div class="row">
            <div class="form-group">
                <input type="text" name="id" value="{{ $products->id }}"  placeholder="商品情報ID">
            </div>

    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="product_name" value="{{ $products->product_name }}" placeholder="商品名">
            </div>
        </div>

            <div class="form-group">
                <select name="company_id" class="form-select">
                
                
                <option>{{ $products->company_name }}</option>


                </select>
            </div>
     </div>

            <div class="form-group">
                <input type="text" name="price" value="{{ $products->price }}" placeholder="価格">
            </div>

            <div class="form-group">
                <input type="text" name="stock" value="{{ $products->stock }}" placeholder="在庫数">
            </div>
 
            <div class="form-group">
                <textarea class="form-control" style="height:100px" name="comment" value="{{ $products->comment }}" placeholder="コメント">{{ $products->comment }}</textarea>
            </div>
 
            <div class="form-group">
                <input type="text" name="img" value="{{ $products->img_path }}" class="imgform">
                <input type="file" name="img_path" class="imgform">
            </div>
       

    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary">{{ __('更新') }}</button>
    </div>

</form>
</div>

    <div class="text-right">
            <button type="button" onclick="history.back()">{{ __('戻る') }}</button>
    </div>
</form>
@endsection

    