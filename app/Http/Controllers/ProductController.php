<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function getProducts()
    {
        return response()->json([
            'data' => Products::all()
        ]);
    }

    public function getProductDetail($id)
    {
        return response()->json([
            'data' => Products::find($id)
        ]);
    }
}
