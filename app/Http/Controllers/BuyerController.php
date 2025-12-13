<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function home()
    {
        $products = Product::with('seller')
            ->where('apartment_id', auth()->user()->apartment_id)
            ->active()
            ->latest()
            ->get();

        return view('buyer.home', compact('products'));
    }

    public function products()
    {
        $products = Product::with('seller')
            ->where('apartment_id', auth()->user()->apartment_id)
            ->active()
            ->latest()
            ->paginate(12);

        return view('buyer.products', compact('products'));
    }

    public function cart()
    {
        return view('buyer.cart');
    }

    public function orders()
    {
        $orders = Order::with(['seller', 'items.product'])
            ->where('buyer_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('buyer.orders', compact('orders'));
    }

    public function orderDetail($id)
    {
        $order = Order::with(['seller', 'items.product', 'payment'])
            ->where('buyer_id', auth()->id())
            ->findOrFail($id);

        return view('buyer.order-detail', compact('order'));
    }
}
