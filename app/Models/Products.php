<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'stock',
        'image'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
