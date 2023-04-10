<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $guarded = array('id');

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }
}
