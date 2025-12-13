@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Marketplace</h1>
        @if(auth()->user()->role === 'buyer')
        <a href="{{ route('seller-application.form') }}" class="text-blue-600 text-sm hover:underline">
            Become a Seller
        </a>
        @endif
    </div>

    @if($products->isEmpty())
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <i class="fas fa-shopping-bag text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-600">No products available yet</p>
    </div>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="p-4">
                <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $product->description }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-xl font-bold text-blue-600">RM {{ number_format($product->price, 2) }}</span>
                    <button onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Add to Cart
                    </button>
                </div>
                <p class="text-xs text-gray-500 mt-2">Sold by: {{ $product->seller->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

@push('scripts')
<script>
let cart = JSON.parse(localStorage.getItem('cart') || '[]');

function addToCart(productId, productName, price) {
    const existingItem = cart.find(item => item.product_id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            product_id: productId,
            name: productName,
            price: price,
            quantity: 1
        });
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
    alert('Added to cart!');
}
</script>
@endpush
@endsection

