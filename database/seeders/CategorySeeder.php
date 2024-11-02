<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $categories = [
            [
                'name' => 'Cake',
                'description' => 'Cake products',
            ],
            [
                'name' => 'Snack',
                'description' => 'Snack products',
            ],
            [
                'name' => 'Catering',
                'description' => 'Makanan Berat products',
            ],
            [
                'name' => 'Gorengan',
                'description' => 'Gorengan products',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }


    }
}
