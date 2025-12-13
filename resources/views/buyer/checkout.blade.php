@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Checkout</h1>

    <div id="checkout-items" class="space-y-4 mb-6">
        <!-- Items will be loaded by JavaScript -->
    </div>

    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <h3 class="font-bold mb-3">Order Summary</h3>
        <div class="space-y-2 text-sm">
            <div class="flex justify-between">
                <span>Subtotal:</span>
                <span id="subtotal">RM 0.00</span>
            </div>
            <div class="flex justify-between">
                <span>Platform Fee (5%):</span>
                <span id="platform-fee">RM 0.00</span>
            </div>
            <div class="flex justify-between text-lg font-bold mt-4 pt-4 border-t">
                <span>Total:</span>
                <span id="total">RM 0.00</span>
            </div>
        </div>
    </div>

    <button onclick="placeOrder()" 
        class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">
        Place Order
    </button>
</div>

@push('scripts')
<script>
let cart = JSON.parse(localStorage.getItem('cart') || '[]');

function renderCheckout() {
    const container = document.getElementById('checkout-items');
    
    if (cart.length === 0) {
        window.location.href = '{{ route("cart") }}';
        return;
    }

    container.innerHTML = cart.map(item => `
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="font-semibold">${item.name}</h3>
                    <p class="text-sm text-gray-600">Quantity: ${item.quantity}</p>
                </div>
                <span class="font-bold text-blue-600">RM ${(item.price * item.quantity).toFixed(2)}</span>
            </div>
        </div>
    `).join('');

    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const platformFee = subtotal * 0.05;
    const total = subtotal + platformFee;

    document.getElementById('subtotal').textContent = `RM ${subtotal.toFixed(2)}`;
    document.getElementById('platform-fee').textContent = `RM ${platformFee.toFixed(2)}`;
    document.getElementById('total').textContent = `RM ${total.toFixed(2)}`;
}

async function placeOrder() {
    const orderData = {
        cart: cart.map(item => ({
            product_id: item.product_id,
            quantity: item.quantity
        }))
    };

    try {
        const response = await fetch('{{ route("orders.place") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(orderData)
        });

        if (response.ok) {
            localStorage.removeItem('cart');
            const data = await response.json();
            window.location.href = data.redirect || '{{ route("buyer.orders") }}';
        } else {
            alert('Failed to place order. Please try again.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
}

renderCheckout();
</script>
@endpush
@endsection

