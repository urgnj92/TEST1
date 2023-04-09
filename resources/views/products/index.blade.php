@extends('productsapp')




@section('content')
<div class="top">
    <div class="col-log-12">
        <div class="text-left">
            <h1>商品情報検索</h1>
        </div>

    <input type="text" name="name" class="form-control" placeholder="商品名">


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

    <div class="text-right">
        <button type="submit" class="btn btn-primary w-100" >検索</button>
    </div>
</div>

    <div class="container">
        <div class="col-log-12">
            <div class="text-left">
                <h2>商品情報一覧</h2>
            </div>

            <div class="text-right">
                <button type="button" class="btn btn-primary w-100" onclick="location.href=('products/create')">
                {{ __('新規登録') }}</button>
            </div>
        </div>
    </div>

    <table class = "table">
    <thread>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
            <th>詳細</th>
            <th>削除</th>
        </tr>
    </thread>
    
        @foreach ($products as $product)

    <tbody>
        <tr>
        <form action="{{route('products.index')}}" method="POST">
        <form action="{{route('products.destroy')}}" method="POST">
            <td>{{ $product->id }}</td>
            <td>{{ $product->img_path }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company_name }}</td>
            <td><button type="button" class="btn btn-primary w-100" onclick="location.href=('products/show') ">
            {{ __('詳細表示') }}</button></td>
            <td>
            
            
            @csrf

            <input type="hidden" name="id" value="{{$product->id}}">

            <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか？");'>{{ __('削除') }}</button></td>
        </form>
        </tr>
    </tbody>
    
        @endforeach

    </table>

@endsection

