<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- IMPORTAR AQUÍ

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','document_type','document_number',
        'verification_digit','person_type',
        'address','phone','email','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
