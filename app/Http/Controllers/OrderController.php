<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('buyer.checkout');
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'cart' => 'required|array',
            'cart.*.product_id' => 'required|exists:products,id',
            'cart.*.quantity' => 'required|integer|min:1',
        ]);

        // Group cart items by seller
        $cart = collect($validated['cart']);
        $products = Product::whereIn('id', $cart->pluck('product_id'))->get();
        
        $groupedBySeller = $cart->groupBy(function ($item) use ($products) {
            return $products->firstWhere('id', $item['product_id'])->seller_id;
        });

        $orders = [];

        foreach ($groupedBySeller as $sellerId => $items) {
            $totalAmount = 0;
            $orderItems = [];

            foreach ($items as $item) {
                $product = $products->firstWhere('id', $item['product_id']);
                $subtotal = $product->price * $item['quantity'];
                $totalAmount += $subtotal;

                $orderItems[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                    'subtotal' => $subtotal,
                ];
            }

            $apartment = auth()->user()->apartment;
            $platformFee = $totalAmount * ($apartment->service_fee_percent / 100);
            $sellerAmount = $totalAmount - $platformFee;

            $order = Order::create([
                'apartment_id' => auth()->user()->apartment_id,
                'buyer_id' => auth()->id(),
                'seller_id' => $sellerId,
                'order_no' => 'ORD-' . strtoupper(Str::random(10)),
                'total_amount' => $totalAmount,
                'platform_fee' => $platformFee,
                'seller_amount' => $sellerAmount,
                'status' => 'pending',
                'pickup_location' => $apartment->pickup_location,
                'pickup_time' => now()->addDay()->setTime(
                    (int) $apartment->pickup_start_time->format('H'),
                    (int) $apartment->pickup_start_time->format('i')
                ),
                'payment_status' => 'pending',
            ]);

            foreach ($orderItems as $item) {
                OrderItem::create(array_merge(['order_id' => $order->id], $item));
            }

            // Create payment record
            Payment::create([
                'order_id' => $order->id,
                'gateway' => 'billplz', // Default gateway
                'amount' => $totalAmount,
                'status' => 'pending',
            ]);

            $orders[] = $order;
        }

        // Return JSON response for AJAX or redirect
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect' => count($orders) === 1 
                    ? route('payment.show', $orders[0]->id)
                    : route('buyer.orders'),
                'message' => 'Orders placed successfully'
            ]);
        }

        // Redirect to payment page
        if (count($orders) === 1) {
            return redirect()->route('payment.show', $orders[0]->id);
        }

        return redirect()->route('buyer.orders')->with('success', 'Orders placed successfully');
    }

    public function showPayment($id)
    {
        $order = Order::with(['seller', 'items', 'payment'])
            ->where('buyer_id', auth()->id())
            ->findOrFail($id);

        return view('buyer.payment', compact('order'));
    }
}
