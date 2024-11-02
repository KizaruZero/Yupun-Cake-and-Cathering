<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_method',
        'status',
        'total_price',
        'order_date',
        'payment_proof',
        'requested_delivery_date',
        'delivery_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }

    public function scopePemasukan($query)
    {
        return $query->where('status', 'completed');
    }

}
