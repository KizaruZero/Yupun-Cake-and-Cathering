<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


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
        'delivery_date',
        'custom_order',
    ];


    protected static function boot()
    {
        parent::boot();

        // Listen to Order status changes
        static::updated(function ($order) {
            // Cek apakah status berubah dan berubah menjadi completed
            if ($order->isDirty('status') && $order->status === 'completed') {
                // Update total_sold untuk setiap produk dalam order ini
                $order->orderItems->each(function ($orderItem) {
                    $product = $orderItem->product;
                    if ($product) {
                        // Hitung ulang total_sold
                        $totalSold = $product->orderItems()
                            ->whereHas('order', function ($query) {
                                $query->where('status', 'completed');
                            })
                            ->sum('quantity');

                        // Update total_sold
                        $product->update(['total_sold' => $totalSold]);
                    }
                });
            }

            // Jika status berubah dari completed ke status lain
            // Misalnya order dibatalkan setelah completed
            if (
                $order->isDirty('status') &&
                $order->getOriginal('status') === 'completed' &&
                $order->status !== 'completed'
            ) {

                // Update total_sold untuk setiap produk (mengurangi)
                $order->orderItems->each(function ($orderItem) {
                    $product = $orderItem->product;
                    if ($product) {
                        // Hitung ulang total_sold
                        $totalSold = $product->orderItems()
                            ->whereHas('order', function ($query) {
                                $query->where('status', 'completed');
                            })
                            ->sum('quantity');

                        // Update total_sold
                        $product->update(['total_sold' => $totalSold]);
                    }
                });
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }

    public function scopePemasukan($query)
    {
        return $query->where('status', 'completed');
    }

}
