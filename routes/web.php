<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerApplicationController;
use App\Http\Controllers\PaymentWebhookController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/home');
    }
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Payment webhooks (no auth required)
Route::post('/webhook/billplz', [PaymentWebhookController::class, 'billplz'])->name('webhook.billplz');
Route::post('/webhook/toyyibpay', [PaymentWebhookController::class, 'toyyibpay'])->name('webhook.toyyibpay');

// Authenticated routes
Route::middleware('auth')->group(function () {
    
    // Buyer routes (all authenticated users can access)
    Route::get('/home', [BuyerController::class, 'home'])->name('home');
    Route::get('/products', [BuyerController::class, 'products'])->name('products');
    Route::get('/cart', [BuyerController::class, 'cart'])->name('cart');
    Route::get('/orders', [BuyerController::class, 'orders'])->name('buyer.orders');
    Route::get('/orders/{id}', [BuyerController::class, 'orderDetail'])->name('buyer.order.detail');
    
    // Checkout and order placement
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/orders/place', [OrderController::class, 'placeOrder'])->name('orders.place');
    Route::get('/payment/{id}', [OrderController::class, 'showPayment'])->name('payment.show');
    
    // Seller application
    Route::get('/apply-seller', [SellerApplicationController::class, 'showForm'])->name('seller-application.form');
    Route::post('/apply-seller', [SellerApplicationController::class, 'apply'])->name('seller-application.apply');
    Route::get('/seller-application-status', [SellerApplicationController::class, 'status'])->name('seller-application.status');
    
    // Seller routes
    Route::middleware('role:seller')->prefix('seller')->name('seller.')->group(function () {
        Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('dashboard');
        Route::get('/orders', [SellerController::class, 'orders'])->name('orders');
        Route::post('/orders/{id}/status', [SellerController::class, 'updateOrderStatus'])->name('orders.status');
        Route::get('/products', [SellerController::class, 'products'])->name('products');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::post('/products/{id}/toggle', [ProductController::class, 'toggleStatus'])->name('products.toggle');
    });
    
    // Admin routes
    Route::middleware('role:apartment_admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/sellers', [AdminController::class, 'sellers'])->name('sellers');
        Route::post('/sellers/{id}/approve', [AdminController::class, 'approveSeller'])->name('sellers.approve');
        Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::put('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
    });
    
    // Super Admin routes (placeholder for future)
    Route::middleware('role:super_admin')->prefix('super')->name('super.')->group(function () {
        Route::get('/dashboard', function () {
            return view('super.dashboard');
        })->name('dashboard');
    });
});
