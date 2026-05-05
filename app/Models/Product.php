<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- IMPORTAR AQUÍ

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','description',
        'cost_price','profit_percentage','final_price',
        'stock','category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function movements()
    {
        return $this->hasMany(InventoryMovement::class);
    }

    public function getProfitAmountAttribute()
    {
        return $this->final_price - $this->cost_price;
    }
}