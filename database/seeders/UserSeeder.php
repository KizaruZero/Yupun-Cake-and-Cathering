<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'name' => 'John Doe',
            'email' => 'ardyapusaka@gmail.com',
            'password' => Hash::make('Ardya021'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'uharvey@example.org',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::factory()->count(10)->create([
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

    }
}
