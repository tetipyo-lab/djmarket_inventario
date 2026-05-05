<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- IMPORTAR AQUÍ


class ProductVariant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id','name','price','stock'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}