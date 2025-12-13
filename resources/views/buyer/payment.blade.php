@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Payment</h1>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h3 class="font-bold mb-4">Order: {{ $order->order_no }}</h3>
        
        <div class="border-t border-b py-4 mb-4">
            @foreach($order->items as $item)
            <div class="flex justify-between mb-2">
                <span>{{ $item->quantity }}x {{ $item->product_name }}</span>
                <span>RM {{ number_format($item->subtotal, 2) }}</span>
            </div>
            @endforeach
        </div>

        <div class="flex justify-between text-xl font-bold mb-6">
            <span>Total Amount:</span>
            <span class="text-blue-600">RM {{ number_format($order->total_amount, 2) }}</span>
        </div>

        <div class="bg-yellow-50 border border-yellow-200 p-4 rounded mb-6">
            <p class="text-sm text-yellow-800">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Payment Integration Coming Soon</strong><br>
                For MVP, this would integrate with Billplz or ToyyibPay payment gateway.
            </p>
        </div>

        <button onclick="simulatePayment()" 
            class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">
            Proceed to Payment (Demo)
        </button>
    </div>
</div>

@push('scripts')
<script>
function simulatePayment() {
    alert('In production, this would redirect to Billplz/ToyyibPay payment gateway');
    window.location.href = '{{ route("buyer.orders") }}';
}
</script>
@endpush
@endsection

