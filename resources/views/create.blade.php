@extends('productsapp')




@section('content')

    <div class="main">
        <h1>商品新規登録画面</h1>
    </div>

<div>
    <form action="{{ route('products.store') }}" method="POST">

    @csrf

    <div class = "row">
        <input type="text" name="product_name" class="form-control" placeholder="商品名">
        
        <div class="col-12 mb-2 mt-2">
            <select class="form-select" name="company_id" id="company_id" value="{{ old('company_id') }}">
            <option>メーカー名を選択してください</option>

            @foreach ($companies as $company)
                
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>

            @endforeach
            </select>
        </div>

       
            <div>
                <input type="text" name="price" class="form-control" placeholder="価格">
            </div>

            <div>
                <input type="text" name="stock" class="form-control" placeholder="在庫数">
            </div>

            <div>
                <textarea class="form-control" style="height:100px" name="comment" placeholder="コメント"></textarea>
            </div>

            <div>
                <input type="file" name="img_path" class="imgform">
            </div>


        <div>
            <button type="submit" class="btn btn-primary">{{ __('登録') }}</button>
        </div>

        <div>
            <button type="button" onclick="history.back()">{{ __('戻る') }}</button>
        </div>
</form>
</div>



@endsection