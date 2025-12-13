@extends('layouts.app')

@section('title', 'Seller Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Seller Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-gray-600 text-sm">Total Orders</p>
            <p class="text-2xl font-bold text-blue-600">{{ $totalOrders }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-gray-600 text-sm">Pending</p>
            <p class="text-2xl font-bold text-yellow-600">{{ $pendingOrders }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-gray-600 text-sm">Total Earnings</p>
            <p class="text-2xl font-bold text-green-600">RM {{ number_format($totalEarnings, 2) }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <p class="text-gray-600 text-sm">Active Products</p>
            <p class="text-2xl font-bold text-purple-600">{{ $activeProducts }}</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-2 gap-4 mb-6">
        <a href="{{ route('seller.products.create') }}" 
            class="bg-blue-600 text-white p-4 rounded-lg text-center hover:bg-blue-700 transition">
            <i class="fas fa-plus-circle text-2xl mb-2"></i>
            <p class="font-semibold">Add Product</p>
        </a>
        <a href="{{ route('seller.products') }}" 
            class="bg-purple-600 text-white p-4 rounded-lg text-center hover:bg-purple-700 transition">
            <i class="fas fa-box text-2xl mb-2"></i>
            <p class="font-semibold">My Products</p>
        </a>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 border-b flex justify-between items-center">
            <h2 class="font-bold text-lg">Recent Orders</h2>
            <a href="{{ route('seller.orders') }}" class="text-blue-600 text-sm hover:underline">View All</a>
        </div>
        
        @if($recentOrders->isEmpty())
        <div class="p-8 text-center text-gray-600">
            <i class="fas fa-inbox text-4xl mb-2"></i>
            <p>No orders yet</p>
        </div>
        @else
        <div class="divide-y">
            @foreach($recentOrders as $order)
            <div class="p-4 hover:bg-gray-50">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="font-semibold">{{ $order->order_no }}</p>
                        <p class="text-sm text-gray-600">{{ $order->buyer->name }}</p>
                    </div>
                    <span class="px-2 py-1 rounded-full text-xs font-semibold
                        @if($order->status === 'completed') bg-green-100 text-green-800
                        @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                        @elseif($order->status === 'ready') bg-blue-100 text-blue-800
                        @else bg-yellow-100 text-yellow-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">{{ $order->items->count() }} item(s)</span>
                    <span class="font-bold text-green-600">RM {{ number_format($order->seller_amount, 2) }}</span>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection

