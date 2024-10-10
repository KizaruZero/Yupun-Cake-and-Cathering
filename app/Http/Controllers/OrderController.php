<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'payment_method' => 'required|string',
            'cart_items' => 'required|array', // Mengandung array item keranjang
            'cart_items.*.product_id' => 'required|exists:products,id',
            'cart_items.*.quantity' => 'required|integer|min:1',
            'cart_items.*.price' => 'required|numeric|min:0',
        ]);

        // Hitung total harga
        $total_price = collect($request->cart_items)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Buat order baru
        $order = Orders::create([
            'user_id' => Auth::id(), // Mengambil id user yang sedang login
            'payment_method' => $request->payment_method,
            'status' => 'new', // Misal order pertama kali di-pending
            'total_price' => $total_price,
            'order_date' => now(),
        ]);

        // Masukkan tiap item ke dalam OrderItems
        foreach ($request->cart_items as $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');

        // Mengembalikan respons sukses atau bisa diarahkan ke halaman lain
        return response()->json([
            'message' => 'Order successfully created',
            'order_id' => $order->id,
        ], 201);
    }
}
