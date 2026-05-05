<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- IMPORTAR AQUÍ

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id','invoice_number','amount','issued_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
