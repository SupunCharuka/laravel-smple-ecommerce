<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    use AuthorizesRequests;
    
    public function orders(Request $request)
    {
        if ($request->ajax()) {
            $orders = auth()->user()->orders;
            return DataTables::of($orders)
                ->addColumn('total', function ($order) {
                    return '$' . number_format($order->orderItems->sum('price'), 2);
                })
                ->addColumn('status', function ($order) {
                    $badgeClass = 'secondary';
                    switch ($order->status) {
                        case 'pending':
                            $badgeClass = 'warning';
                            break;
                        case 'completed':
                            $badgeClass = 'success';
                            break;
                        case 'cancelled':
                            $badgeClass = 'danger';
                            break;
                    }
                    return '<span class="badge badge-' . $badgeClass . '">' . ucfirst($order->status) . '</span>';
                })
                ->addColumn('actions', function ($order) {
                    return '<a href="' . route('orderItems', $order->id) . '" class="btn btn-info btn-sm">View</a>';
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }
        return view('backend.user.order.index');
    }

    public function orderItems(Request $request, Order $order)
    {
        $this->authorize('view', $order);
        if ($request->ajax()) {
            $orderItems = $order->orderItems;
            return DataTables::of($orderItems)
                ->addColumn('product_details', function ($orderItem) {
                    return '<a href="' . route('productDetails', ['product' => $orderItem->product]) . '" class="btn btn-info btn-sm">View</a>';
                })
                ->addColumn('quantity', function ($orderItem) {
                    return $orderItem->quantity;
                })
                ->addColumn('price', function ($orderItem) {
                    return $orderItem->price;
                })
                ->addColumn('category', function ($orderItem) {
                    return $orderItem->product->category->name;
                })
                ->addColumn('product_name', function ($orderItem) {
                    return $orderItem->product->title;
                })
                ->rawColumns(['product_details'])
                ->make(true);
        }
        return view('backend.user.order.order-items');
    }
}
