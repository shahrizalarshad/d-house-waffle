@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Shopping Cart</h1>

    <div id="cart-items" class="space-y-4 mb-6">
        <!-- Cart items will be loaded by JavaScript -->
    </div>

    <div class="bg-white rounded-lg shadow p-4 mb-6">
        <div class="flex justify-between items-center text-lg font-bold">
            <span>Total:</span>
            <span id="cart-total">RM 0.00</span>
        </div>
    </div>

    <button onclick="proceedToCheckout()" 
        class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
        Proceed to Checkout
    </button>
</div>

@push('scripts')
<script>
let cart = JSON.parse(localStorage.getItem('cart') || '[]');

function renderCart() {
    const container = document.getElementById('cart-items');
    
    if (cart.length === 0) {
        container.innerHTML = `
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-600">Your cart is empty</p>
            </div>
        `;
        document.getElementById('cart-total').textContent = 'RM 0.00';
        return;
    }

    container.innerHTML = cart.map((item, index) => `
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-start mb-2">
                <h3 class="font-semibold">${item.name}</h3>
                <button onclick="removeFromCart(${index})" class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <button onclick="updateQuantity(${index}, -1)" class="bg-gray-200 px-2 py-1 rounded">-</button>
                    <span class="font-semibold">${item.quantity}</span>
                    <button onclick="updateQuantity(${index}, 1)" class="bg-gray-200 px-2 py-1 rounded">+</button>
                </div>
                <span class="font-bold text-blue-600">RM ${(item.price * item.quantity).toFixed(2)}</span>
            </div>
        </div>
    `).join('');

    updateTotal();
}

function updateQuantity(index, change) {
    cart[index].quantity += change;
    if (cart[index].quantity <= 0) {
        cart.splice(index, 1);
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

function removeFromCart(index) {
    if (confirm('Remove this item from cart?')) {
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    }
}

function updateTotal() {
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    document.getElementById('cart-total').textContent = `RM ${total.toFixed(2)}`;
}

function proceedToCheckout() {
    if (cart.length === 0) {
        alert('Your cart is empty');
        return;
    }
    window.location.href = '{{ route("checkout") }}';
}

renderCart();
</script>
@endpush
@endsection

