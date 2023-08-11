@extends('productsapp')

@section('content')


<div class="title">
    <h1>商品情報検索</h1>
</div>

<div class="search">
    
    <div class="search_product">
        <form action="{{ route('index') }}" method="GET">
        <input type="text" name="keyword" id="keyword" value="{{ $keyword }}" placeholder="商品名を入力してください">
    </div>

    <div class="search_company">
        <select class="form-select" name="company_id" id="company_name">
            <option value="">{{ __('メーカー名を選択してください') }}</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="company_name">メーカー</label>
        <select class="form-control" id="company_name" name="company_id">
            <option value="">{{"メーカーを選択してください"}}</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="search_price">
        <input type="text" name="min_price" id="min_price" placeholder="下限価格">
        <input type="text" name="max_price" id="max_price" placeholder="上限価格">
    </div>

    <div class="search_stock">
        <input type="text" name="min_stock" id="min_stock" placeholder="下限在庫数">
        <input type="text" name="max_stock" id="max_stock" placeholder="上限在庫数">
    </div>
    
        <button type="submit" class="btn btn-primary" id="search">{{ __('検索') }}</button>
        </form>

    <div id="text"></div>
</div>

    <div class="body"> 
        <h2>商品情報一覧</h2>
        <button type="button" class="btn btn-primary" onclick="location.href=('create')">{{ __('新規登録') }}</button>
    </div>

    <table id="sortable-table" class="products-table">
        <thread>
        <tr>
            <th>@sortablelink('id','ID')</th>
            <th>商品画像</th>
            <th>@sortablelink('product_name', '商品名')</th>
            <th>@sortablelink('price','価格')</th>
            <th>@sortablelink('stock','在庫数')</th>
            <th>@sortablelink('company_name','メーカー名')</th>
            <th>@sortablelink('created_at','作成日')</th>
            <th>@sortablelink('updated_at','更新日')</th>
            <th>詳細</th>
            <th>削除</th>
        </tr>
        </thread>

        <tbody class="product_table">
            @foreach ($products as $product)
            <tr name="table" id="data_table">
                
                <td>{{ $product->id }}</td>
                <td>
                    @if ($product->img_path)
                        <img src="{{ asset('storage/public/'. $product->img_path) }}" alt="Product Image" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company_name }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td><button type="button" class="btn btn-primary" onclick="location.href='{{ route('show', $product->id) }}'">
                {{ __('詳細') }}</button></td>
            
            <form action="{{ route('delete', $product->id) }}" method="POST">
            @csrf
                <td>
                <input type="hidden" name="id" value="{{ $product->id }}">
                <button type="button" class="btn btn-danger" data-id="{{ $product->id }}" onclick='return confirm("削除しますか？");'>{{ __('削除') }}</button></td>
            </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection

