<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return inertia('Auth/Login', [
            ]);
        }
        // Validasi input dari form
        $request->validate([
            'payment_method' => 'required|string',
            'requested_delivery_date' => 'required|date|after_or_equal:today',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'user_id' => $user->id, // Mengambil id user yang sedang login
            'payment_method' => $request->payment_method,
            'status' => 'new', // Misal order pertama kali di-pending
            'total_price' => $total_price,
            'order_date' => now(),
            'requested_delivery_date' => $request->requested_delivery_date,
            'payment_proof' => $request->file('payment_proof')->store('payment_proofs', 'public'),
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

    public function getOrderHistory()
    {
        $user = Auth::user();
        if (!$user) {
            return inertia('Auth/Login', [
            ]);
        }

        $orders = Orders::where('user_id', $user->id)
            ->orderBy('order_date', 'desc')
            ->with('orderItems.product')
            ->get();

        return response()->json($orders);
    }
}
