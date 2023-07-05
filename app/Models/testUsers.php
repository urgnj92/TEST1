<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testUsers extends Model
{
    protected $table = 'testUsers';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'product_id'];
}
