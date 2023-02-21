<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
        [
            'company_id' => '1' ,
            'product_name' => 'ミネラルウォーター',
            'price' => '110' ,
            'stock' => '20' ,
            'comment' => 'aaa',
            'img_path' => 'qqqq',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        
        [
            'company_id' => '2' ,
            'product_name' => '緑茶',
            'price' => '120' ,
            'stock' => '10' ,
            'comment' => 'eee',
            'img_path' => 'qqqq',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        
    ]);
    }
}
