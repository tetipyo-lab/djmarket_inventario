<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'document_type',
        'document_number',
        'verification_digit',
        'person_type',
        'address',
        'phone',
        'email',
        'contact_info',
    ];

    // =========================
    // RELACIONES
    // =========================

    public function users()
    {
        return $this->hasMany(User::class);
    }
}