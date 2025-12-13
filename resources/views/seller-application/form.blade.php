@extends('layouts.app')

@section('title', 'Apply to Become a Seller')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Apply to Become a Seller</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="bg-blue-50 border border-blue-200 p-4 rounded mb-6">
            <h3 class="font-bold mb-2">Requirements:</h3>
            <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                <li>Must be a verified resident of this apartment</li>
                <li>Provide valid contact information</li>
                <li>Agree to platform's terms and conditions</li>
                <li>Application will be reviewed by apartment management (JMB)</li>
            </ul>
        </div>

        <div class="mb-6">
            <h3 class="font-bold mb-2">Your Information:</h3>
            <div class="space-y-2 text-sm">
                <p><span class="font-semibold">Name:</span> {{ auth()->user()->name }}</p>
                <p><span class="font-semibold">Email:</span> {{ auth()->user()->email }}</p>
                <p><span class="font-semibold">Phone:</span> {{ auth()->user()->phone }}</p>
                <p><span class="font-semibold">Unit:</span> {{ auth()->user()->block }} - {{ auth()->user()->unit_no }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('seller-application.apply') }}">
            @csrf
            
            <div class="mb-6">
                <label class="flex items-start">
                    <input type="checkbox" required class="mr-2 mt-1">
                    <span class="text-sm text-gray-700">
                        I agree to the terms and conditions, and I understand that my application will be reviewed by the apartment management.
                    </span>
                </label>
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                Submit Application
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('home') }}" class="text-blue-600 text-sm hover:underline">
                Cancel and go back
            </a>
        </div>
    </div>
</div>
@endsection

