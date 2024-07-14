<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ManageOrderController extends Controller
{
    public function manageOrder(Request $request)
    {
        abort_if(Gate::denies('orders.manage'), Response::HTTP_FORBIDDEN);
        if ($request->ajax()) {
            $orders = Order::latest()->get();
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
                ->addColumn('user', function ($order) {
                    return $order->user->name;
                })
                ->addColumn('actions', function ($order) {
                    return '
                        <select class="form-control-sm order-status" data-order-id="' . $order->id . '">
                            <option value="">Change Status</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <a href="' . route('orderItems', $order->id) . '" class="btn btn-info btn-sm">View</a>';
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }
        return view('backend.admin.orders.index');
    }

    public function updateStatus(Request $request, Order $order)
    {
        abort_if(Gate::denies('orders.change-status'), Response::HTTP_FORBIDDEN);
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order->status = $request->status;
        $order->save();

        return response()->json(['success' => true]);
    }
}
