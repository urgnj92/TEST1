<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('companies')->insert([
            [
            'company_name' => '株式会社A' ,
            'street_address' => '東京都',
            'representative_name' => 'あああ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],

            [
            'company_name' => '株式会社B' ,
            'street_address' => '神奈川県',
            'representative_name' => 'あああ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],

            [
            'company_name' => '株式会社C' ,
            'street_address' => '埼玉県',
            'representative_name' => 'あああ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],

            [
            'company_name' => '株式会社D' ,
            'street_address' => '茨城県',
            'representative_name' => 'あああ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],

            [
            'company_name' => '株式会社E' ,
            'street_address' => '栃木県',
            'representative_name' => 'あああ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],

        ]);
   
        
    }
}
