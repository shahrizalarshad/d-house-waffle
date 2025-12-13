@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6">
    <a href="{{ route('seller.products') }}" class="text-blue-600 mb-4 inline-block">
        <i class="fas fa-arrow-left mr-2"></i>Back to Products
    </a>

    <h1 class="text-2xl font-bold text-gray-800 mb-6">Add New Product</h1>

    <div class="bg-white rounded-lg shadow p-6">
        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            @foreach($errors->all() as $error)
                <p class="text-sm">{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('seller.products.store') }}">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">
                    Product Name
                </label>
                <input type="text" name="name" id="name" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ old('name') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="description">
                    Description
                </label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="price">
                    Price (RM)
                </label>
                <input type="number" step="0.01" name="price" id="price" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ old('price') }}">
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" checked class="mr-2">
                    <span class="text-gray-700">Active (visible to buyers)</span>
                </label>
            </div>

            <div class="flex gap-3">
                <button type="submit" 
                    class="flex-1 bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                    Create Product
                </button>
                <a href="{{ route('seller.products') }}" 
                    class="flex-1 bg-gray-300 text-gray-700 py-3 rounded-lg hover:bg-gray-400 text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

