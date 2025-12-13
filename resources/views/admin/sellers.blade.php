@extends('layouts.app')

@section('title', 'Manage Sellers')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Seller Applications</h1>

    @if($applications->isEmpty())
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-600">No seller applications yet</p>
    </div>
    @else
    <div class="space-y-4">
        @foreach($applications as $application)
        <div class="bg-white rounded-lg shadow">
            <div class="p-4">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <p class="font-bold text-lg">{{ $application->user->name }}</p>
                        <p class="text-sm text-gray-600">{{ $application->user->email }}</p>
                        <p class="text-sm text-gray-600">Phone: {{ $application->user->phone }}</p>
                        <p class="text-sm text-gray-600">Unit: {{ $application->user->block }} - {{ $application->user->unit_no }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        @if($application->status === 'approved') bg-green-100 text-green-800
                        @elseif($application->status === 'rejected') bg-red-100 text-red-800
                        @else bg-yellow-100 text-yellow-800
                        @endif">
                        {{ ucfirst($application->status) }}
                    </span>
                </div>

                <p class="text-xs text-gray-500 mb-3">Applied: {{ $application->created_at->format('d M Y, h:i A') }}</p>

                @if($application->status === 'pending')
                <form method="POST" action="{{ route('admin.sellers.approve', $application->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-sm font-bold mb-2">Remarks (Optional)</label>
                        <textarea name="remarks" rows="2" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"></textarea>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" name="status" value="approved"
                            class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                            <i class="fas fa-check mr-2"></i>Approve
                        </button>
                        <button type="submit" name="status" value="rejected"
                            class="flex-1 bg-red-600 text-white py-2 rounded-lg hover:bg-red-700">
                            <i class="fas fa-times mr-2"></i>Reject
                        </button>
                    </div>
                </form>
                @else
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm">
                        <span class="font-semibold">Decision by:</span> {{ $application->approver->name ?? 'N/A' }}
                    </p>
                    <p class="text-sm">
                        <span class="font-semibold">Date:</span> {{ $application->approved_at?->format('d M Y, h:i A') }}
                    </p>
                    @if($application->remarks)
                    <p class="text-sm mt-2">
                        <span class="font-semibold">Remarks:</span> {{ $application->remarks }}
                    </p>
                    @endif
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $applications->links() }}
    </div>
    @endif
</div>
@endsection

