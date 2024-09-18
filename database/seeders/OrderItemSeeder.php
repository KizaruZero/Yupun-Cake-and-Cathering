<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $order = Orders::all();
        $products = Products::all();

        $orderItems = [
            [
                'order_id' => $order[0]->id,
                'product_id' => $products[0]->id,
                'quantity' => 1,
                'price' => $products[0]->price,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => $order[1]->id,
                'product_id' => $products[1]->id,
                'quantity' => 2,
                'price' => $products[1]->price,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => $order[2]->id,
                'product_id' => $products[2]->id,
                'quantity' => 3,
                'price' => $products[2]->price,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => $order[3]->id,
                'product_id' => $products[3]->id,
                'quantity' => 4,
                'price' => $products[3]->price,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => $order[4]->id,
                'product_id' => $products[4]->id,
                'quantity' => 5,
                'price' => $products[4]->price,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        foreach ($orderItems as $orderItem) {
            OrderItem::create($orderItem);
        }
        

    }
}
