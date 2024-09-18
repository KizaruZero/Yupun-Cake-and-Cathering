<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $orders = [
            [
                'user_id' => 1,
                'payment_method' => 'credit_card',
                'status' => 'pending',
                'total_price' => 150.000,
                'order_date' => '2023-10-01',
                'delivery_date' => '2023-10-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'payment_method' => 'paypal',
                'status' => 'confirmed',
                'total_price' => 200.000,
                'order_date' => '2023-10-02',
                'delivery_date' => '2023-10-06',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'payment_method' => 'credit_card',
                'status' => 'completed',
                'total_price' => 250.000,
                'order_date' => '2023-10-03',
                'delivery_date' => '2023-10-07',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'payment_method' => 'paypal',
                'status' => 'canceled',
                'total_price' => 300.000,
                'order_date' => '2023-10-04',
                'delivery_date' => '2023-10-08',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'payment_method' => 'credit_card',
                'status' => 'pending',
                'total_price' => 350.000,
                'order_date' => '2023-10-05',
                'delivery_date' => '2023-10-09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6,
                'payment_method' => 'paypal',
                'status' => 'confirmed',
                'total_price' => 400.000,
                'order_date' => '2023-10-06',
                'delivery_date' => '2023-10-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more orders as needed
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
