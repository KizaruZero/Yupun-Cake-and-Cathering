<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Kizaru Kaede',
            'role' => 'admin',
            'email' => 'kizarukaede@gmail.com',
            'password' => bcrypt('Ardya021'),
        ]);
        $this->call([
            UsersSeeder::class,
            ProductsSeeder::class,
            OrdersSeeder::class,
            OrderItemsSeeder::class,
        ]);
    }
}
