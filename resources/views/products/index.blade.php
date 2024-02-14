@extends('productsapp')

@section('content')

    <div class="container">
        <h2 class="title">商品情報検索</h1>

        <section id="search" class="wrapper">
            <dl>
                <dt>商品名</dt>
                <dd>
                    <form action="{{ route('index') }}" method="GET">
                    <input type="text" name="keyword" id="keyword" value="{{ $keyword }}" placeholder="商品名を入力してください">
                </dd>

                <dt>メーカー名</dt>
                <dd>
                    <select class="form-select" name="company_id" id="company_name">
                        <option value="">{{ __('メーカー名を選択してください') }}</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </dd>

                <dt>価格</dt>
                <dd>
                    <input type="text" name="min_price" id="min_price" placeholder="下限">
                    <input type="text" name="max_price" id="max_price" placeholder="上限">
                </dd>

                <dt>在庫数</dt>
                <dd>
                    <input type="text" name="min_stock" id="min_stock" placeholder="下限">
                    <input type="text" name="max_stock" id="max_stock" placeholder="上限">
                </dd>
                    <button type="submit" class="btn btn-primary" id="search">{{ __('検索') }}</button>
                </form>
            </dl>
        </section>

        <section id="body" class="wrapper">
            <h3 class="section-title">商品情報一覧</h2>
                <button type="button" class="btn btn-primary" onclick="location.href=('create')">{{ __('新規登録') }}</button>

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
                    <th></th>
                    <th></th>
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
                        <td>{{ $product->created_at->format('Y/m/d') }}</td>
                        <td>{{ $product->updated_at->format('Y/m/d') }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('show', $product->id) }}'">{{ __('詳細') }}</button>
                        </td>

                        <form action="{{ route('delete', $product->id) }}" method="POST">
                        @csrf
                            <td>
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="button" class="btn btn-danger" data-id="{{ $product->id }}" onclick='return confirm("削除しますか？");'>{{ __('削除') }}</button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    @endsection

