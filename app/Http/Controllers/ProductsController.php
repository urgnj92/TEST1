<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Company;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::all();
        $products = Products::oldest()->paginate(5);       
        return view('products.index',compact('products'))
        ->with('companies',$companies, 'products',$products);

        // $keyword = $request->input('keyword');
        // $query = User::query();
        // if(!empty($products))
        // {
        //     $query->where('keyword','like','%'.$keyword.'%');
        // }

        // $data = $query->orderBy('created_at')->pagenate(5);
        // return view('products.index')
        // ->with('data',$data)
        // ->with('keyword', $keyword);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('create')
        ->with('companies',$companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companies = Company::all();
        $input = $request->all();
        Products::create($input);
        return redirect()->route('products.index')
        ->with('success','商品を登録しました');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Products $Products)
    {
        $products = Products::all();
        return view('show',compact('products'))
        ->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $Products)
    {
        $companies = Company::all();
        $products = Products::all();
        return view('edit',compact('products'))
        ->with('companies',$companies)
        ->with('products',$products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $Products)
    {
        $products->product_id = $request->input(["product_id"]);
        $products->company_name = $request->input(["company_name"]);
        $products->product_name = $request->input(["product_name"]);
        $products->price = $request->input(["price"]);
        $products->stock = $request->input(["stock"]);
        $products->comment = $request->input(["comment"]);
        $products->img_path = $request->input(["img_path"]);
        $products->save();

        return redirect()->route('products.index')
        ->with('success','商品情報を変更しました');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $input = $request->all();
        Products::destroy($input["id"]);
        return redirect() -> route('products.index')
        -> with('success','商品を削除しました');
    }
}
