<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- IMPORTAR AQUÍ

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','image_url'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
