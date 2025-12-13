@extends('layouts.app')

@section('title', 'Seller Orders')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Orders</h1>

    @if($orders->isEmpty())
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
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

                <div class="flex justify-between items-center mb-3">
                    <span class="font-bold text-green-600">Your Amount: RM {{ number_format($order->seller_amount, 2) }}</span>
                    <span class="text-sm text-gray-600">Total: RM {{ number_format($order->total_amount, 2) }}</span>
                </div>

                @if($order->status !== 'completed' && $order->status !== 'cancelled')
                <form method="POST" action="{{ route('seller.orders.status', $order->id) }}" class="mt-4">
                    @csrf
                    <div class="flex gap-2">
                        <select name="status" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="preparing" {{ $order->status === 'preparing' ? 'selected' : '' }}>Preparing</option>
                            <option value="ready" {{ $order->status === 'ready' ? 'selected' : '' }}>Ready for Pickup</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                            Update
                        </button>
                    </div>
                </form>
                @endif
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

