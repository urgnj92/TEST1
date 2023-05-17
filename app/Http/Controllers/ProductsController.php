<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Company;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // 商品情報一覧/検索
    public function index(Request $request) {
        $keyword = $request->input('keyword');
        $query = Products::query();

        $query -> join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*','companies.company_name')
        ->where('products.product_name', 'LIKE', "%$keyword%")
        ->orwhere('companies.company_name', 'LIKE', "%$keyword%")
        ->get();
        
        $products = $query->get();
        return view('products.index', compact('products', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // 新規登録
    public function create() {
        $model = new Company();
        $companies = $model -> getCompanyNameById();
        return view('create', compact('companies'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     // 登録処理
    public function store(Request $request) {
        $companies = Company::all();
        $input = $request->all();
        Products::create($input);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // 詳細画面表示
    public function show($id) {
        $model = new Products();
        $products = $model->getDetail($id);
        return view('show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // 編集画面
    public function edit($id) {
        $model = new Products();
        $products = $model->getDetail($id);
        return view('edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // 商品情報更新
    public function update(Request $request, $id) {
        $products = Products::find($id);
        $products->updateProduct($request, $products);
        $companies = $products -> getCompanyNameById();
        return redirect()->route('products.index', compact('products', 'companies'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // 商品削除
    public function destroy(Request $request) {
        $input = $request->all();
        Products::destroy($input["id"]);
        return redirect() -> route('products.index');
    }
}
