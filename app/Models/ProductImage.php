<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- IMPORTAR AQUÍ

class ProductImage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id','url','is_main','position'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}