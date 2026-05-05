<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- IMPORTAR AQUÍ

class InventoryMovement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id','variant_id','type','quantity','notes'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}