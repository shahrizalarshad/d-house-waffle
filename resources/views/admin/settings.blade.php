@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Apartment Settings</h1>

    <div class="bg-white rounded-lg shadow p-6">
        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            @foreach($errors->all() as $error)
                <p class="text-sm">{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="service_fee_percent">
                    Service Fee (%)
                </label>
                <input type="number" step="0.01" name="service_fee_percent" id="service_fee_percent" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ old('service_fee_percent', $apartment->service_fee_percent) }}">
                <p class="text-xs text-gray-600 mt-1">Platform fee charged on each order</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="pickup_location">
                    Pickup Location
                </label>
                <input type="text" name="pickup_location" id="pickup_location" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    value="{{ old('pickup_location', $apartment->pickup_location) }}">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="pickup_start_time">
                        Pickup Start Time
                    </label>
                    <input type="time" name="pickup_start_time" id="pickup_start_time" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                        value="{{ old('pickup_start_time', $apartment->pickup_start_time) }}">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="pickup_end_time">
                        Pickup End Time
                    </label>
                    <input type="time" name="pickup_end_time" id="pickup_end_time" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                        value="{{ old('pickup_end_time', $apartment->pickup_end_time) }}">
                </div>
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                Update Settings
            </button>
        </form>
    </div>
</div>
@endsection

