@extends('layouts.app')

@section('title', 'All Orders')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">All Orders</h1>

    @if($orders->isEmpty())
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <i class="fas fa-box text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-600">No orders yet</p>
    </div>
    @else
    <div class="space-y-4">
        @foreach($orders as $order)
        <div class="bg-white rounded-lg shadow">
            <div class="p-4">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <p class="font-bold">{{ $order->order_no }}</p>
                        <p class="text-sm text-gray-600">Buyer: {{ $order->buyer->name }}</p>
                        <p class="text-sm text-gray-600">Seller: {{ $order->seller->name }}</p>
                        <p class="text-xs text-gray-500">{{ $order->created_at->format('d M Y, h:i A') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        @if($order->status === 'completed') bg-green-100 text-green-800
                        @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                        @elseif($order->status === 'ready') bg-blue-100 text-blue-800
                        @else bg-yellow-100 text-yellow-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <div class="border-t pt-3 mb-3">
                    @foreach($order->items as $item)
                    <p class="text-sm text-gray-700">{{ $item->quantity }}x {{ $item->product_name }}</p>
                    @endforeach
                </div>

                <div class="grid grid-cols-3 gap-2 text-sm">
                    <div>
                        <p class="text-gray-600">Total</p>
                        <p class="font-bold">RM {{ number_format($order->total_amount, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Platform Fee</p>
                        <p class="font-bold text-green-600">RM {{ number_format($order->platform_fee, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Seller Amount</p>
                        <p class="font-bold">RM {{ number_format($order->seller_amount, 2) }}</p>
                    </div>
                </div>

                <div class="mt-3 text-xs text-gray-500">
                    <p>Pickup: {{ $order->pickup_time->format('d M Y, h:i A') }}</p>
                    <p>Location: {{ $order->pickup_location }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $orders->links() }}
    </div>
    @endif
</div>
@endsection

