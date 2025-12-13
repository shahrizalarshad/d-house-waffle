@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="bg-yellow-100 p-3 rounded-full mr-4">
                    <i class="fas fa-user-clock text-yellow-600 text-2xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Pending Applications</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $pendingApplications }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <i class="fas fa-shopping-bag text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Total Orders</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <i class="fas fa-dollar-sign text-green-600 text-2xl"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Platform Revenue</p>
                    <p class="text-3xl font-bold text-gray-800">RM {{ number_format($totalRevenue, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <a href="{{ route('admin.sellers') }}" 
            class="bg-blue-600 text-white p-4 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-users text-2xl mb-2"></i>
            <p class="font-semibold">Manage Sellers</p>
            @if($pendingApplications > 0)
            <span class="inline-block mt-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                {{ $pendingApplications }} pending
            </span>
            @endif
        </a>

        <a href="{{ route('admin.orders') }}" 
            class="bg-purple-600 text-white p-4 rounded-lg hover:bg-purple-700 transition">
            <i class="fas fa-box text-2xl mb-2"></i>
            <p class="font-semibold">View All Orders</p>
        </a>

        <a href="{{ route('admin.settings') }}" 
            class="bg-gray-600 text-white p-4 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-cog text-2xl mb-2"></i>
            <p class="font-semibold">Settings</p>
        </a>
    </div>

    <!-- Apartment Info -->
    @if($apartment)
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="font-bold text-lg mb-4">Apartment Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">Name</p>
                <p class="font-semibold">{{ $apartment->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Service Fee</p>
                <p class="font-semibold">{{ $apartment->service_fee_percent }}%</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Pickup Location</p>
                <p class="font-semibold">{{ $apartment->pickup_location }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Pickup Time</p>
                <p class="font-semibold">{{ $apartment->pickup_start_time }} - {{ $apartment->pickup_end_time }}</p>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

