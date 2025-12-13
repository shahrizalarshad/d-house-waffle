@extends('layouts.app')

@section('title', 'Seller Application Status')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Seller Application Status</h1>

    @if($application)
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-center mb-6">
            @if($application->status === 'pending')
            <div class="bg-yellow-100 p-4 rounded-full inline-block mb-4">
                <i class="fas fa-clock text-yellow-600 text-4xl"></i>
            </div>
            <h2 class="text-xl font-bold text-yellow-600 mb-2">Application Pending</h2>
            <p class="text-gray-600">Your application is being reviewed by apartment management</p>
            @elseif($application->status === 'approved')
            <div class="bg-green-100 p-4 rounded-full inline-block mb-4">
                <i class="fas fa-check-circle text-green-600 text-4xl"></i>
            </div>
            <h2 class="text-xl font-bold text-green-600 mb-2">Application Approved!</h2>
            <p class="text-gray-600">Congratulations! You can now start selling</p>
            @else
            <div class="bg-red-100 p-4 rounded-full inline-block mb-4">
                <i class="fas fa-times-circle text-red-600 text-4xl"></i>
            </div>
            <h2 class="text-xl font-bold text-red-600 mb-2">Application Rejected</h2>
            <p class="text-gray-600">Unfortunately, your application was not approved</p>
            @endif
        </div>

        <div class="border-t pt-4 space-y-2 text-sm">
            <p><span class="font-semibold">Submitted:</span> {{ $application->created_at->format('d M Y, h:i A') }}</p>
            @if($application->approved_at)
            <p><span class="font-semibold">Decision Date:</span> {{ $application->approved_at->format('d M Y, h:i A') }}</p>
            @endif
            @if($application->remarks)
            <div class="bg-gray-50 p-3 rounded mt-3">
                <p class="font-semibold mb-1">Remarks:</p>
                <p class="text-gray-700">{{ $application->remarks }}</p>
            </div>
            @endif
        </div>

        @if($application->status === 'approved')
        <div class="mt-6">
            <a href="{{ route('seller.dashboard') }}" 
                class="block w-full bg-blue-600 text-white text-center py-3 rounded-lg hover:bg-blue-700">
                Go to Seller Dashboard
            </a>
        </div>
        @endif
    </div>
    @else
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <i class="fas fa-file-alt text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-600 mb-4">You haven't submitted any seller application yet</p>
        <a href="{{ route('seller-application.form') }}" 
            class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            Apply Now
        </a>
    </div>
    @endif
</div>
@endsection

