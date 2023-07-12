<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sales extends Model
{
    protected $table = 'Sales';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'product_id'];


    // 在庫数取得
    public function getStock($id) {
        $stock = DB::table('products')
            ->select('stock')
            ->where('id', $id)
            ->value('stock');

        return $stock;
    }

    // 購入処理
    public function buy($id) {
        DB::table('products')
            ->select('products.stock')
            ->where('id', '=', $id)
            ->decrement('stock',1,['updated_at' => now()]);
    }


    // データ追加処理
    public function add($id) {
        DB:table('sales')->insert([
            'product_id' => $id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    

    }
}