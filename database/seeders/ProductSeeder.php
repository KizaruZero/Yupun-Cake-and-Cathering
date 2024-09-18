<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $products = [
            [
                'name' => 'Brownies',
                'description' => 'Brownies products',
                'category_id' => 1,
                'price' => 10000,
                'stock' => 10,
                'image' => 'brownies.jpg'
            ],
            [
                'name' => 'Donat',
                'description' => 'Donat products',
                'category_id' => 1,
                'price' => 5000,
                'stock' => 20,
                'image' => 'donat.jpg'
            ],
            [
                'name' => 'Roti',
                'description' => 'Roti products',
                'category_id' => 1,
                'price' => 3000,
                'stock' => 30,
                'image' => 'roti.jpg'
            ],
            [
                'name' => 'Keripik',
                'description' => 'Keripik products',
                'category_id' => 2,
                'price' => 5000,
                'stock' => 40,
                'image' => 'keripik.jpg'
            ],
            [
                'name' => 'Kerupuk',
                'description' => 'Kerupuk products',
                'category_id' => 2,
                'price' => 2000,
                'stock' => 50,
                'image' => 'kerupuk.jpg'
            ],
            [
                'name' => 'Nasi Goreng',
                'description' => 'Nasi Goreng products',
                'category_id' => 3,
                'price' => 15000,
                'stock' => 60,
                'image' => 'nasigoreng.jpg'
            ],
            [
                'name' => 'Mie Goreng',
                'description' => 'Mie Goreng products',
                'category_id' => 3,
                'price' => 12000,
                'stock' => 70,
                'image' => 'mie.jpg'
            ],
            [
                'name' => 'Tahu Goreng',
                'description' => 'Tahu Goreng products',
                'category_id' => 3,
                'price' => 5000,
                'stock' => 80,
                'image' => 'tahu.jpg'
            ],
            [
                'name' => 'Pisang Goreng',
                'description' => 'Pisang Goreng products',
                'category_id' => 4,
                'price' => 3000,
                'stock' => 90,
                'image' => 'pisang.jpg'
            ],
            [
                'name' => 'Tempe Goreng',
                'description' => 'Tempe Goreng products',
                'category_id' => 4,
                'price' => 4000,
                'stock' => 100,
                'image' => 'tempe.jpg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
