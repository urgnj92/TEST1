@extends('productsapp')
@section('content')
<form action="{{ route('update',$products->id) }}" method="POST">
    @csrf
    <h2 class="title">商品情報編集</h2>

    <main>
        <div id="body" class="wrapper">
            <section id="products_detail">
                    <p><input type="text" name="id" value="{{ $products->id }}"  placeholder="商品情報ID"></p>
                    <p><input type="text" name="product_name" value="{{ $products->product_name }}" placeholder="商品名"></p>
                    <p>
                        <select name="company_id" class="form-select">
                            <option>{{ $products->company_name }}</option>
                        </select>
                    </p>
                    <p><input type="text" name="price" value="{{ $products->price }}" placeholder="価格"></p>
                    <p><input type="text" name="stock" value="{{ $products->stock }}" placeholder="在庫数"></p>
                    <p><textarea name="comment" value="{{ $products->comment }}" placeholder="コメント">{{ $products->comment }}</textarea></p>
                    <p><input type="text" name="img" value="{{ $products->img_path }}" class="img"></p>
                    <p><input type="file" name="img_path" class="imgform"></p>

                <button type="submit" class="btn btn-primary">{{ __('更新') }}</button>
                <button type="button" class="btn btn-primary" onclick="history.back()">{{ __('戻る') }}</button>
            </section>
        </div>
    </main>
</form>
@endsection
