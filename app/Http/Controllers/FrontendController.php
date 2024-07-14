<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.index');
    }

    public function products(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('title', 'like', '%' . $search . '%');
        }

        $products = $query->latest()->paginate(12);

        if ($request->ajax()) {
            $view = view('frontend.partial.product-item', compact('products'))->render();
            $pagination = view('frontend.partial.pagination', compact('products'))->render();

            return response()->json(['html' => $view, 'pagination' => $pagination]);
        }

        return view('frontend.products', compact('products'));
    }

    public function addCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        if (!$cart) {
            $cart[$productId] = [
                "productId" => $product->id,
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        } elseif (isset($cart[$productId])) {

            $cart[$productId]['quantity']++;
        } else {

            $cart[$productId] = [
                "productId" => $product->id,
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['status' => 'success', 'message' => 'Product added to cart']);
    }


    public function productDetails()
    {
        return view('frontend.product-details');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('frontend.cart', compact('cart'));
    }


    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            $newTotal = $cart[$productId]['price'] * $quantity;
            session()->put('cart', $cart);
            return response()->json(['status' => 'success', 'newTotal' => $newTotal]);
        }

        return response()->json(['status' => 'error', 'message' => 'Product not found in cart'], 404);
    }



    public function removeCart(Request $request)
    {
        $productId = $request->input('product_id');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return response()->json(['status' => 'success', 'message' => 'Product removed from cart']);
        }

        return response()->json(['status' => 'error', 'message' => 'Product not found in cart'], 404);
    }


    public function checkout()
    {
        return view('frontend.checkout');
    }
}
