<?php

use Illuminate\Database\Seeder;


class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $param = [
            'company_name' => 'コカコーラ' ,
            'street_address' => '東京都',
            'representative_name' => 'あああ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        DB::table('companies')->insert($param);      
        
    }
}
