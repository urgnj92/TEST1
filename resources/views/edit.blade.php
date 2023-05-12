@extends('productsapp')




@section('content')

@foreach ($products as $product)

<form action="{{ route('products.index',$product->id) }}" mathod="POST">

@endforeach

@method('PUT')

@csrf

<div class="row">
    <div>
        <h1>商品情報編集</h1>
    </div>

    <div class="row">
            <div class="form-group">
                <input type="text" name="id" value="{{ $product->id }}"  placeholder="商品情報ID">
            </div>

    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="product_name" value="{{ $product->product_name }}" placeholder="商品名">
            </div>
        </div>

            <div class="form-group">
                <select name="company_name" class="form-select">
                
                @foreach ($companies as $company)
                
                <option>{{ $company->company_name }}</option>

                @endforeach

                </select>
            </div>
     </div>

            <div class="form-group">
                <input type="text" name="price" value="{{ $product->price }}" placeholder="価格">
            </div>

            <div class="form-group">
                <input type="text" name="stock" value="{{ $product->stock }}" placeholder="在庫数">
            </div>
 
            <div class="form-group">
                <textarea class="form-control" style="height:100px" name="comment" value="{{ $product->comment }}" placeholder="コメント">{{ $product->comment }}</textarea>
            </div>
 
            <div class="form-group">
                <input type="text" name="img" value="{{ $product->img_path }}" class="imgform">
                <input type="file" name="img_path" class="imgform">
            </div>
       

    </div>
</form>


    <div class="text-right">
        <button type="submit" class="btn btn-primary" onclick="location('index')">{{ __('更新') }}</button>
    
    </div>
</div>

    <div class="text-right">
            <button type="button" onclick="history.back()">{{ __('戻る') }}</button>
    </div>
</form>
@endsection

    