<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'stock',
        'image',
        'total_sold'

    ];



    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'product_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function recalculateTotalSold()
    {
        $totalSold = $this->orderItems()
            ->whereHas('order', function ($query) {
                $query->where('status', 'completed');
            })
            ->sum('quantity');

        $this->update(['total_sold' => $totalSold]);
    }

    // Tambahkan static method jika memang diperlukan
    public static function recalculateAllTotalSold()
    {
        $products = self::all();
        foreach ($products as $product) {
            $product->recalculateTotalSold();
        }
    }

    // get image name 
    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }



}
