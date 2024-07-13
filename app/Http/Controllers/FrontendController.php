<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.index');
    }

    public function products()
    {
        return view('frontend.products');
    }

    public function productDetails()
    {
        return view('frontend.product-details');
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

}
