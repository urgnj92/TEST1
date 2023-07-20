<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Company;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->middleware('auth');
    }
    

     // 商品情報一覧/検索
    public function index(Request $request) {
        // インスタンス生成
        $model = new Products;

        // 入力された情報の取得
        $keyword = $request->input('keyword');
        $company_name = $request->input('company_name');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $min_stock = $request->input('min_stock');
        $max_stock = $request->input('max_stock');
        // productsテーブルから入力された情報をもとにデータを取得
        $products = $model->searchProducts($keyword, $company_name, $min_price, $max_price, $min_stock, $max_stock);
        // companiesテーブルから情報を取得
        $companies = $model->getCompanyNameById();

        return view('products.index', compact('products', 'keyword', 'company_name', 'min_price', 'max_price', 'min_stock', 'max_stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // 新規登録
    public function create() {
        // インスタンス生成
        $model = new Company();
        // companiesテーブルからデータを取得
        $company = $model->getCompanyNameById();
        return view('products.create', ['companies' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // 登録処理
    public function store(Request $request) {
        // トランザクション開始
        DB::beginTransaction();
        
        try {
            // 登録処理呼び出し
            $model = new Products();
            $model->getProduct($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // 詳細画面表示
    public function show($id) {
        // インスタンス生成
        $model = new Products();
        // productテーブルからデータを取得
        $products = $model->getDetail($id);
        return view('products.show', compact('products'));
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
        // companiesテーブルからデータを取得
        $companies = $model->getCompanyNameById();
        // productsテーブルからデータを取得
        $products = $model->getDetail($id);
        return view('products.edit', compact('companies', 'id', 'products'));
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
        // トランザクション開始
        DB::beginTransaction();
        
        try {
             // 更新処理呼び出し
            $model = new Products();
            $model->updateProduct($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        return redirect(route('index', ['id'=>$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    // 商品削除
    public function delete($id) {
        // トランザクション開始
        DB::beginTransaction();
        
        try {
            // 削除処理呼び出し
            $model = new Products();
            $product = $model->deleteRecord($id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        return redirect(route('index'));
    }
}
