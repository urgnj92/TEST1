<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Company;


class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = array('id');
    
    
    protected $fillable = [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
        'created_at',
        'updated_at'
    ];

    // 詳細表示
    public function getDetail($id) {
        $product = DB::table('products')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('products.*', 'companies.company_name')
            ->where('products.id', '=', $id)
            ->first();
        return $product;
    }

    // 登録処理
    public function registProduct($data) {
        DB::table('products') -> insert([
            'company_id' => $data -> company_id,
            'product_name' => $data -> product_name,
            'price' => $data -> price,
            'stock' => $data -> stock,
            'comment' => $data -> comment,
            'img_path' => $data -> img_path,
            'created_at' => $data -> NOW(),
            'updated_at' => $data -> NOW(),
        ]);        
    }


    // 更新処理
    public function updateProduct($request, $products) {
        $result = $products -> fill([
            'product_name' => $request -> product_name,
            'price' => $request -> price,
            'stock' => $request -> stock,
            'comment' => $request -> comment,
            'img_path' => $request -> img_path,
            'updated_at' => NOW(),
        ])->save();  
        return $result;
    }

    // メーカー名の取得
    public function getCompanyNameById() {
        $companies = DB::table('companies')
        ->get();
        return $companies;
    }

}