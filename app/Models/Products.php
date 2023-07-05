<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Company;



class Products extends Model
{
    use Sortable;

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

    // ソート機能
    public $sortable = [
        'id',
        'company_id',
        'product_name',
        'price',
        'stock',
        'img_path',
        'created_at',
        'updated_at'
    ];

    // メーカー名の取得
    public function getCompanyNameById() {
        $companies = DB::table('products')
            ->join('companies', 'products.company_id', '=', 'companies.id')
            ->get();
        return $companies;
    }

    // 検索処理
    public function searchProducts($keyword, $company_name, $min_price, $max_price, $min_stock, $max_stock) {
        $products = Products::sortable('products')
                ->join('companies', 'company_id', '=', 'companies.id')
                ->select('products.*','companies.company_name', 'products.price', 'products.stock')
        // company nameで検索できるようにする（？）

                ->where(function ($query) use ($keyword) {
                    $query->where('products.product_name', 'LIKE', "%$keyword%")
                        ->orWhere('companies.company_name', 'LIKE', "%$keyword%");
                })
                ->when($company_name, function ($query, $company_name) {
                    return $query->where('companies.company_name');
                })
                ->when($min_price, function ($query, $min_price) {
                    return $query->where('products.price', '>', $min_price);
                })
                ->when($max_price, function ($query, $max_price) {
                    return $query->where('products.price', '<', $max_price);
                })
                ->when($min_stock, function ($query, $min_stock) {
                    return $query->where('products.stock', '>', $min_stock);
                })
                ->when($max_stock, function ($query, $max_stock) {
                    return $query->where('products.stock', '<', $max_stock);
                })
                
                ->get();
        
            return $products;
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
            'created_at' => now(),
            'updated_at' => now(),
        ]); 

    }

    // 詳細表示
    public function getDetail($id) {
        $product = DB::table('products')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('products.*', 'companies.company_name')
            ->where('products.id', '=', $id)
            ->first();
        return $product;
    }

    // 更新処理
    public function updateProduct($request) {
        $product = Products::find($request->id);
        $product -> fill([
            'product_name' => $request -> product_name,
            'price' => $request -> price,
            'stock' => $request -> stock,
            'comment' => $request -> comment,
            'img_path' => $request -> img_path,
            'updated_at' => now(),
        ])->save();  
        return $product;
    }

    // 削除処理
    public function deleteRecord($id) {
        $record = Products::find($id);
        if ($record) {
            $record->delete();
            return true;
        }
        return false;
    }

    // 削除処理
    // public function deleteCompany($id) {
    //     $record = Companies::find($id);
    //     if ($record) {
    //         $record->delete();
    //         return true;
    //     }
    //     return false;
    // }

}