@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <a href="{{ route('buyer.orders') }}" class="text-blue-600 mb-4 inline-block">
        <i class="fas fa-arrow-left mr-2"></i>Back to Orders
    </a>

    <div class="bg-white rounded-lg shadow p-6 mb-4">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h1 class="text-2xl font-bold">{{ $order->order_no }}</h1>
                <p class="text-gray-600">{{ $order->created_at->format('d M Y, h:i A') }}</p>
            </div>
            <span class="px-3 py-1 rounded-full text-sm font-semibold
                @if($order->status === 'completed') bg-green-100 text-green-800
                @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                @elseif($order->status === 'ready') bg-blue-100 text-blue-800
                @else bg-yellow-100 text-yellow-800
                @endif">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <div class="border-t border-b py-4 mb-4">
            <h3 class="font-bold mb-2">Items</h3>
            @foreach($order->items as $item)
            <div class="flex justify-between mb-2">
                <span>{{ $item->quantity }}x {{ $item->product_name }}</span>
                <span class="font-semibold">RM {{ number_format($item->subtotal, 2) }}</span>
            </div>
            @endforeach
        </div>

        <div class="space-y-2 mb-4">
            <div class="flex justify-between">
                <span>Subtotal:</span>
                <span>RM {{ number_format($order->total_amount - $order->platform_fee, 2) }}</span>
            </div>
            <div class="flex justify-between">
                <span>Platform Fee:</span>
                <span>RM {{ number_format($order->platform_fee, 2) }}</span>
            </div>
            <div class="flex justify-between text-lg font-bold border-t pt-2">
                <span>Total:</span>
                <span>RM {{ number_format($order->total_amount, 2) }}</span>
            </div>
        </div>

        <div class="bg-gray-50 p-4 rounded">
            <h3 class="font-bold mb-2">Seller Information</h3>
            <p class="text-gray-700">{{ $order->seller->name }}</p>
            <p class="text-sm text-gray-600">{{ $order->seller->phone }}</p>
        </div>

        <div class="bg-gray-50 p-4 rounded mt-4">
            <h3 class="font-bold mb-2">Pickup Details</h3>
            <p class="text-gray-700">{{ $order->pickup_time->format('d M Y, h:i A') }}</p>
            <p class="text-sm text-gray-600">{{ $order->pickup_location }}</p>
        </div>

        <div class="mt-4">
            <h3 class="font-bold mb-2">Payment Status</h3>
            <span class="px-3 py-1 rounded-full text-sm font-semibold
                @if($order->payment_status === 'paid') bg-green-100 text-green-800
                @elseif($order->payment_status === 'failed') bg-red-100 text-red-800
                @else bg-yellow-100 text-yellow-800
                @endif">
                {{ ucfirst($order->payment_status) }}
            </span>
        </div>
    </div>
</div>
@endsection

