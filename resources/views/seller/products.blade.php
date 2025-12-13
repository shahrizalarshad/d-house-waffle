@extends('layouts.app')

@section('title', 'My Products')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">My Products</h1>
        <a href="{{ route('seller.products.create') }}" 
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            <i class="fas fa-plus mr-2"></i>Add Product
        </a>
    </div>

    @if($products->isEmpty())
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <i class="fas fa-box text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-600 mb-4">No products yet</p>
        <a href="{{ route('seller.products.create') }}" 
            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
            Create Your First Product
        </a>
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                    <span class="px-2 py-1 rounded text-xs font-semibold
                        {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                
                <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $product->description }}</p>
                
                <p class="text-xl font-bold text-blue-600 mb-4">RM {{ number_format($product->price, 2) }}</p>
                
                <div class="flex gap-2">
                    <a href="{{ route('seller.products.edit', $product->id) }}" 
                        class="flex-1 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700 text-sm">
                        Edit
                    </a>
                    <form method="POST" action="{{ route('seller.products.toggle', $product->id) }}" class="flex-1">
                        @csrf
                        <button type="submit" 
                            class="w-full {{ $product->is_active ? 'bg-gray-600' : 'bg-green-600' }} text-white py-2 rounded hover:opacity-80 text-sm">
                            {{ $product->is_active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
    @endif
</div>
@endsection

