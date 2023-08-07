<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



class Products extends Model
{
    use HasFactory;
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
        // companiesテーブルからデータを取得
        $products = DB::table('companies')->get();
        return $products;
    }


    // 検索処理
    public function searchProducts($keyword, $company_name, $min_price, $max_price, $min_stock, $max_stock) {
        $products = Products::sortable('products')
                ->join('companies', 'company_id', '=', 'companies.id')
                ->select('products.*','companies.company_name')

                ->where(function ($query) use ($keyword) {
                    $query->where('products.product_name', 'LIKE', "%$keyword%");
                        // ->orWhere('companies.company_name', 'LIKE', "%$keyword%");
                })
                ->when($company_name, function ($query, $company_name) {
                    return $query->where('products.company_id', $company_name);
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
    public function getProduct($request) {
        // 画像の保存
        $dir = 'img';
        $img_path = null;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $extension = $image->getClientOriginalExtension();
            $originalFileName = $image->getClientOriginalName();
            $filename = $originalFileName. '.' . $extension;
            $image->storeAs('public/' . $dir, $filename);

            $img_path = $dir . '/' . $filename;

        }
        
        DB::table('products') -> insert([
            'company_id' => $request -> input('company_id'),
            'product_name' => $request -> input('product_name'),
            'price' => $request -> input('price'),
            'stock' => $request -> input('stock'),
            'comment' => $request -> input('comment'),
            'img_path' => $img_path,
            'created_at' => now(),
            'updated_at' => now(),
        ]); 

    }


    // 詳細表示
    public function getDetail($id) {
        $products = DB::table('products')
            ->join('companies', 'products.company_id', '=', 'companies.id')
            ->select('products.*', 'companies.company_name')
            ->where('products.id', '=', $id)
            ->first();
        return $products;
    }

    // 更新処理
    public function updateProduct($request) {
        $products = Products::find($request->id);
        $products -> fill([
            'product_name' => $request -> product_name,
            'price' => $request -> price,
            'stock' => $request -> stock,
            'comment' => $request -> comment,
            'img_path' => $request -> img_path,
            'updated_at' => now(),
        ])->save();  
        return $products;
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

}

class Company extends Model
{

    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'id',
        'company_name',
        'street_address',
        'representative_name',
        'created_at',
        'updated_at',
    ];
}