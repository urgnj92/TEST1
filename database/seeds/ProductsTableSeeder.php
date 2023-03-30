<?php

use Illuminate\Database\Seeder;

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
                'company_name' => '株式会社A' ,
                'product_name' => 'ミネラルウォーター',
                'price' => '110' ,
                'stock' => '25' ,
                'comment' => '南アルプスの天然水です。',
                'img_path' => 'qqqq',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            
            [
                'company_name' => '株式会社B' ,
                'product_name' => '緑茶',
                'price' => '120' ,
                'stock' => '20' ,
                'comment' => '香り豊かな緑茶です。',
                'img_path' => 'qqqq',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            [
                'company_name' => '株式会社C' ,
                'product_name' => '100%オレンジジュース',
                'price' => '140' ,
                'stock' => '15' ,
                'comment' => '果汁100%のオレンジジュースです。',
                'img_path' => 'qqqq',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            [
                'company_name' => '株式会社D' ,
                'product_name' => 'ソーダ',
                'price' => '120' ,
                'stock' => '12' ,
                'comment' => 'すっきりとした甘さのソーダです。',
                'img_path' => 'qqqq',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            [
                'company_name' => '株式会社E' ,
                'product_name' => '紅茶',
                'price' => '120' ,
                'stock' => '10' ,
                'comment' => '無糖のアールグレイです。',
                'img_path' => 'qqqq',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            
        ]);
    }
}
