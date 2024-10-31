<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return inertia('Frontend/HomeView', [
        ]);
    }

    public function about()
    {
        return inertia('Frontend/AboutView', [
        ]);
    }

    public function contact()
    {
        return inertia('Frontend/ContactUsView', [
        ]);
    }

    public function cart()
    {
        return inertia('Frontend/CartView', [
        ]);
    }



    public function experiment()
    {
        return inertia('Frontend/ExperimentView', [
        ]);
    }

    public function productDetail($id)
    {
        return inertia('Frontend/ProductDetailView', [
            'id' => $id
        ]);
    }
}
