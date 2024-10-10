<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Orders;

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
                'payment_method' => 'Cash',
                'status' => 'completed',
                'total_price' => 100000,
                'order_date' => '2024-09-18',
            ],
            [
                'user_id' => 2,
                'payment_method' => 'Credit Card',
                'status' => 'completed',
                'total_price' => 200000,
                'order_date' => '2024-09-18',
            ],
            [
                'user_id' => 3,
                'payment_method' => 'Cash',
                'status' => 'completed',
                'total_price' => 300000,
                'order_date' => '2024-09-18',
            ],
            [
                'user_id' => 4,
                'payment_method' => 'Credit Card',
                'status' => 'completed',
                'total_price' => 400000,
                'order_date' => '2024-09-18',
            ],
            [
                'user_id' => 4,
                'payment_method' => 'Credit Card',
                'status' => 'completed',
                'total_price' => 400000,
                'order_date' => '2024-09-18',
            ],
            [
                'user_id' => 4,
                'payment_method' => 'Credit Card',
                'status' => 'processing',
                'total_price' => 400000,
                'order_date' => '2024-09-18',
            ],
            [
                'user_id' => 4,
                'payment_method' => 'Credit Card',
                'status' => 'processing',
                'total_price' => 400000,
                'order_date' => '2024-09-18',
            ],
            [
                'user_id' => 4,
                'payment_method' => 'Credit Card',
                'status' => 'processing',
                'total_price' => 400000,
                'order_date' => '2024-09-18',
            ],
            [
                'user_id' => 4,
                'payment_method' => 'Credit Card',
                'status' => 'processing',
                'total_price' => 400000,
                'order_date' => '2024-09-18',
            ],
            [
                'user_id' => 4,
                'payment_method' => 'Credit Card',
                'status' => 'processing',
                'total_price' => 400000,
                'order_date' => '2024-09-18',
            ],

            // Add more orders as needed
        ];

        foreach ($orders as $order) {
            Orders::create($order);
        }
    }
}
