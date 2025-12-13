<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::where('seller_id', auth()->id())->count();
        $pendingOrders = Order::where('seller_id', auth()->id())
            ->where('status', 'pending')
            ->count();
        $totalEarnings = Order::where('seller_id', auth()->id())
            ->where('payment_status', 'paid')
            ->sum('seller_amount');
        $activeProducts = Product::where('seller_id', auth()->id())
            ->where('is_active', true)
            ->count();

        $recentOrders = Order::with(['buyer', 'items'])
            ->where('seller_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        return view('seller.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'totalEarnings',
            'activeProducts',
            'recentOrders'
        ));
    }

    public function orders()
    {
        $orders = Order::with(['buyer', 'items.product'])
            ->where('seller_id', auth()->id())
            ->latest()
            ->paginate(15);

        return view('seller.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,preparing,ready,completed,cancelled',
        ]);

        $order = Order::where('seller_id', auth()->id())->findOrFail($id);
        $order->update(['status' => $request->status]);

        return back()->with('success', 'Order status updated successfully');
    }

    public function products()
    {
        $products = Product::where('seller_id', auth()->id())
            ->latest()
            ->paginate(15);

        return view('seller.products', compact('products'));
    }
}
