<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    //
    public function getProducts()
    {
        return response()->json([
            'data' => Products::where('stock', 'Tersedia')->with('category')->get()
        ]);
    }

    public function getCategoryProducts($id)
    {
        return response()->json([
            'data' => Products::where('category_id', $id, )
                ->where('stock', 'Tersedia')
                ->with('category')
                ->get()
        ]);
    }

    public function getProductDetail($id)
    {
        return response()->json([
            'data' => Products::find($id)
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        // Ambil produk berdasarkan ID
        $product = Products::find($id);
        $quantity = $request->quantity;

        // Jika produk tidak ditemukan
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        // Ambil cart dari session (jika belum ada, buat array kosong)
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di cart, tambahkan quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Jika produk belum ada di cart, tambahkan produk ke cart
            $cart[$id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'quantity' => $quantity,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }

        // Simpan kembali cart ke dalam session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Menampilkan isi keranjang
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return response()->json([
            'data' => $cart
        ]);
    }

    // Menghapus produk dari keranjang
    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    // Mengupdate jumlah produk di keranjang
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Jumlah produk berhasil diperbarui!');
    }

    public function getPopularProducts()
    {
        return response()->json([
            'data' => Products::orderBy('total_sold', 'desc')->limit(4)->get()
        ]);
    }
}
