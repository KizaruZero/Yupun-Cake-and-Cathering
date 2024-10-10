<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function getTotalPriceAttribute()
    {
        return $this->order->total_price;
    }

    public function getDeliveryDateAttribute()
    {
        return $this->order->delivery_date;
    }
    public function getUserNameAttribute()
    {
        return $this->order->user->name; // Accessing user name via order relationship
    }



}
