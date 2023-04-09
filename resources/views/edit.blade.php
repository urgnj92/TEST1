@extends('productsapp')




@section('content')

<form action="{{ route('products.update') }}" mathod="POST">
<div class = "row">
    <div class="col-log-12">
        <h1>商品情報編集</h1>
    </div>

    <div class = "row">
        <div class = "col-12 mb-2 mt-2">
            <div class="form-group">
                <input type = "text" name = "name" class = "form-control" placeholder = "商品名">
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="companies" class="form-select">
                    <option>メーカー名を選択してください</option>

            @foreach ($companies as $company)

                <option value="company_name">{{ $company->company_name }}</option>

            @endforeach
                </select>
            </div>

    </div>

        </div>
        <div class = "col-12 mb-2 mt-2">
            <div class = "form-group">
                <input type = "text" name = "price" class = "form-control" placeholder = "価格">
            </div>
        </div>

        <div class = "col-12 mb-2 mt-2">
            <div class = "form-group">
                <input type = "text" name = "stock" class = "form-control" placeholder = "在庫数">
            </div>
        </div>

        <div class = "col-12 mb-2 mt-2">
            <div class = "form-group">
                <textarea class = "form-control" style = "height:100px" name = "comment" placeholder = "コメント"></textarea>
            </div>
        </div>

        <div class = "col-12 mb-2 mt-2">
            <div class = "form-group">
                <input type = "file" name = "img" class = "imgform">
            </div>
        </div>

    </div>
</form>


    <div class="text-right">
        <button type = "submit" class = "btn btn-primary w-100" onclick = "location.reload()">{{ __('更新') }}</button>
    
    </div>
</div>

    <div class="text-right">
            <button type = "button" onclick = "history.back()">{{ __('戻る') }}</button>
    </div>
</form>
@endsection

    