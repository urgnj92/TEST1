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


    public function registProduct($data) {
        // 登録処理
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

    public function getCompanyNameById() {
        $companies = DB::table('companies')
        ->get();

        return $companies;
    }

    
}