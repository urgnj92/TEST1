@extends('productsapp')


@section('content')
<div class="title">
    <h1>商品新規登録画面</h1>
</div>

<div class="body">
    <form action="{{ route('store') }}" method="POST">

    @csrf
        
        <div class="create_products">
            <input type="text" name="product_name" placeholder="商品名">
        </div>   

        <div class="create_products">
            <select class="form-select" name="company_id" id="company_id" value="{{ old('company_id') }}">
            <option>メーカー名を選択してください</option>

            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
            </select>
        </div>

        <div class="create_products">
            <input type="text" name="price" placeholder="価格">
        </div>

        <div class="create_products">
            <input type="text" name="stock" placeholder="在庫数">
        </div>

        <div class="create_products">
            <textarea name="comment" placeholder="コメント"></textarea>
        </div>

        <div class="create_products">
            <input type="file" name="img_path" class="imgform">
        </div>

        <div class="submit-product">
            <button type="submit" class="btn btn-primary">{{ __('登録') }}</button>
        </div>

        <div class="back-to-prev">
            <button type="button" class="btn btn-primary" onclick="history.back()">{{ __('戻る') }}</button>
        </div>

    </form>
</div>



@endsection