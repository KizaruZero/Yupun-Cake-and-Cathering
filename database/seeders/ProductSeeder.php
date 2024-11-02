<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

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
                'stock' => 'Tersedia',
                'image' => 'brownies.jpg'
            ],
            [
                'name' => 'Donat',
                'description' => 'Donat products',
                'category_id' => 1,
                'price' => 5000,
                'stock' => 'Tersedia',
                'image' => 'donat.jpg'
            ],
            [
                'name' => 'Roti',
                'description' => 'Roti products',
                'category_id' => 1,
                'price' => 3000,
                'stock' => 'Tersedia',
                'image' => 'roti.jpg'
            ],
            [
                'name' => 'Keripik',
                'description' => 'Keripik products',
                'category_id' => 2,
                'price' => 5000,
                'stock' => 'Tersedia',
                'image' => 'keripik.jpg'
            ],
            [
                'name' => 'Kerupuk',
                'description' => 'Kerupuk products',
                'category_id' => 2,
                'price' => 2000,
                'stock' => 'Tersedia',
                'image' => 'kerupuk.jpg'
            ],
            [
                'name' => 'Nasi Goreng',
                'description' => 'Nasi Goreng products',
                'category_id' => 3,
                'price' => 15000,
                'stock' => 'Tersedia',
                'image' => 'nasigoreng.jpg'
            ],
            [
                'name' => 'Mie Goreng',
                'description' => 'Mie Goreng products',
                'category_id' => 3,
                'price' => 12000,
                'stock' => 'Tersedia',
                'image' => 'mie.jpg'
            ],
            [
                'name' => 'Tahu Goreng',
                'description' => 'Tahu Goreng products',
                'category_id' => 3,
                'price' => 5000,
                'stock' => 'Tersedia',
                'image' => 'tahu.jpg'
            ],
            [
                'name' => 'Pisang Goreng',
                'description' => 'Pisang Goreng products',
                'category_id' => 4,
                'price' => 3000,
                'stock' => 'Tersedia',
                'image' => 'pisang.jpg'
            ],

        ];

        foreach ($products as $product) {
            Products::create($product);
        }
    }
}
