<?php

namespace App\Http\Controllers;
use App\Models\Category;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getCategories()
    {
        return response()->json([
            'data' => Category::all()
        ]);
    }

    public function getCategoryDetail($id)
    {
        return response()->json([
            'data' => Category::find($id)
        ]);
    }
}
