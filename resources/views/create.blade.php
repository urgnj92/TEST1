@extends('productsapp')




@section('content')

    <div class="row">
        <div class="col-log-12">
            <div class="pull-left">
                <h1>商品新規登録画面</h1>
            </div>
        </div>
    </div>

<div class="text-left">
<form action="{{ route('products.store') }}" method="POST">

    @csrf

    <div class = "row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="商品名">
            </div>
        </div>
<!-- 選択肢にcompaniesTableのメーカー名を -->

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

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="price" class="form-control" placeholder="価格">
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="stock" class="form-control" placeholder="在庫数">
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <textarea class="form-control" style="height:100px" name="comment" placeholder="コメント"></textarea>
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="file" name="img" class="imgform">
            </div>
        </div>


        <div class="col-12 mb-2 mt-2">
            <button type="submit" class="btn btn-primary">{{ __('登録') }}</button>
        </div>

        <div class="col-12 mb-2 mt-2">
            <button type="button" onclick="history.back()">{{ __('戻る') }}</button>
        </div>
</form>
</div>

@endsection