<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Apartment POS') }} - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    @auth
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">ApartmentPOS</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-800">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mx-4 mt-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mx-4 mt-4 rounded">
        {{ session('error') }}
    </div>
    @endif

    @if(session('info'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 mx-4 mt-4 rounded">
        {{ session('info') }}
    </div>
    @endif

    <!-- Main Content -->
    <main class="min-h-screen pb-20">
        @yield('content')
    </main>

    <!-- Bottom Navigation (Mobile) -->
    @auth
    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 md:hidden">
        <div class="flex justify-around py-2">
            @if(auth()->user()->role === 'buyer' || auth()->user()->role === 'seller')
            <a href="{{ route('home') }}" class="flex flex-col items-center {{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-600' }}">
                <i class="fas fa-home text-xl"></i>
                <span class="text-xs mt-1">Home</span>
            </a>
            <a href="{{ route('cart') }}" class="flex flex-col items-center {{ request()->routeIs('cart') ? 'text-blue-600' : 'text-gray-600' }}">
                <i class="fas fa-shopping-cart text-xl"></i>
                <span class="text-xs mt-1">Cart</span>
            </a>
            <a href="{{ route('buyer.orders') }}" class="flex flex-col items-center {{ request()->routeIs('buyer.orders') ? 'text-blue-600' : 'text-gray-600' }}">
                <i class="fas fa-receipt text-xl"></i>
                <span class="text-xs mt-1">Orders</span>
            </a>
            @endif

            @if(auth()->user()->role === 'seller')
            <a href="{{ route('seller.dashboard') }}" class="flex flex-col items-center {{ request()->routeIs('seller.dashboard') ? 'text-blue-600' : 'text-gray-600' }}">
                <i class="fas fa-store text-xl"></i>
                <span class="text-xs mt-1">Dashboard</span>
            </a>
            @endif

            @if(auth()->user()->role === 'apartment_admin')
            <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center {{ request()->routeIs('admin.dashboard') ? 'text-blue-600' : 'text-gray-600' }}">
                <i class="fas fa-tachometer-alt text-xl"></i>
                <span class="text-xs mt-1">Dashboard</span>
            </a>
            <a href="{{ route('admin.sellers') }}" class="flex flex-col items-center {{ request()->routeIs('admin.sellers') ? 'text-blue-600' : 'text-gray-600' }}">
                <i class="fas fa-users text-xl"></i>
                <span class="text-xs mt-1">Sellers</span>
            </a>
            <a href="{{ route('admin.orders') }}" class="flex flex-col items-center {{ request()->routeIs('admin.orders') ? 'text-blue-600' : 'text-gray-600' }}">
                <i class="fas fa-box text-xl"></i>
                <span class="text-xs mt-1">Orders</span>
            </a>
            @endif
        </div>
    </nav>
    @endauth

    @stack('scripts')
</body>
</html>

