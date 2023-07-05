<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Company extends Model
{

    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $guarded = array('id');

    protected $fillable = [
        'company_name',
        'street_address',
        'representative_name',
        'created_at',
        'updated_at'
    ];

    public function getCompanyNameById() {
        $companies = DB::table('companies')
        ->get();
        return $companies;
    }

    public function company() {
        return $this ->belongsTo('App\Models\Company');
    }

    // // 削除処理
    // public function deleteCompany($id) {
    //     $record = Company::find($id);
    //     if ($record) {
    //         $record->delete();
    //         return true;
    //     }
    //     return false;
    // }
}
