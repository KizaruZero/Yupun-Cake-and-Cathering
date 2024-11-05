<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'category_id' => 1,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'stock' => 'Tersedia',
            'image' => UploadedFile::fake()->image('product.jpg'), // Simulate file upload
        ];
    }
}
