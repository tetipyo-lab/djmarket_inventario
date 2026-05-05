<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'percentage',
        'description',
    ];

    // =========================
    // RELACIONES
    // =========================

    public function users()
    {
        return $this->hasMany(User::class);
    }
}