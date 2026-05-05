<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- IMPORTAR AQUÍ 

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id','customer_id','status','total_amount','operator_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function getClientNameAttribute()
    {
        return $this->user?->name ?? $this->customer?->name;
    }

    public function getTotalItemsAttribute()
    {
        return $this->items->sum('quantity');
    }
}