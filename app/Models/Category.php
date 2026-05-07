<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- IMPORTAR AQUÍ
use Illuminate\Support\Facades\Auth;
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','image_url'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id(); // al crear también se marca como actualizado
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
