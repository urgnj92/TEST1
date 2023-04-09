<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Products extends Model
{
    // protected $table = 'products';
    // protected $primaryKey = 'id';
    // protected $guarded = array('id');
    
    protected $fillable = [
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
        'created_at',
        'updated_at'
    ];
}
