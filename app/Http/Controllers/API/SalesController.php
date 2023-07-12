<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use IlluminateSupport\Facades\DB;
use App\Models\Sales;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'product_id' => 'required',
        ]);

        // トランザクション開始
        DB::beginTransaction();
        try {
            // 登録処理呼び出し
            $sales = new Sales();
            $productId = $request->input('product_id');
            // 在庫数取得
            $stock = $sales->getStock($productId);

            if ($stock === 0) {
                return response()->json(['error' => '在庫がありません'], 400);
            }
            // 購入処理
            $ales->buy($productId);
            // データ追加処理
            $sales->add($productID);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        return response()->json(['message' => $stock], 200);
    }

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
