<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function create()
    {
        abort_if(Gate::denies('product.create'), Response::HTTP_FORBIDDEN);
        return view('backend.admin.product.create');
    }

    public function manage(Request $request)
    {
        abort_if(Gate::denies('product.manage'), Response::HTTP_FORBIDDEN);
        if ($request->ajax()) {
            $products = Product::orderBy('created_at', 'asc')->get();
            return DataTables::of($products)
                ->addColumn('actions', function ($product) {
                    return view('backend.admin.product.includes.actions', compact('product'))->render();
                })
                ->addColumn('id', function ($product) {
                    return $product->id;
                })
                ->addColumn('title', function ($product) {
                    return $product->title;
                })
                ->addColumn('price', function ($product) {
                    return $product->price;
                })
                ->addColumn('quantity', function ($product) {
                    return $product->quantity;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('backend.admin.product.index');
    }



    public function edit(Product $product)
    {
        abort_if(Gate::denies('product.update'), Response::HTTP_FORBIDDEN);
        return view('backend.admin.product.edit', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product.delete'), Response::HTTP_FORBIDDEN);
        if (!$product) {
            $json['status'] = 'error';
            $json['code'] = '404';
            $json['message'] = 'Product not found';
            $json['icon'] = 'error';
            return response()->json($json, 404);
        }
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }
        $product->delete();
        $json['status'] = 'deleted';
        $json['message'] = 'Product record deleted successfully';
        $json['icon'] = 'success';
        $json['data'] = $product;
        return response()->json($json);
    }
}
