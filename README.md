# Apartment Community POS (MVP)

A Laravel-based marketplace system for apartment communities where residents can buy and sell food/products internally.

## Features

- **Multi-Role System**: Buyers, Sellers, Apartment Admin, Super Admin
- **Seller Application**: Buyers can apply to become sellers (requires admin approval)
- **Product Management**: Sellers can manage their products
- **Order System**: Complete order flow with cart, checkout, and status tracking
- **Payment Integration Ready**: Webhook support for Billplz and ToyyibPay
- **Mobile-First Design**: Responsive UI optimized for mobile devices
- **Admin Dashboard**: Manage sellers, orders, and apartment settings

## Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Blade Templates with Tailwind CSS
- **Database**: MySQL
- **Payment**: Billplz / ToyyibPay (webhook ready)

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- MySQL
- Node.js & NPM (for assets)

### Setup Steps

1. **Clone the repository**
```bash
git clone <repository-url>
cd pos-apartment
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Update .env file**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pos_apartment
DB_USERNAME=root
DB_PASSWORD=your_password
```

5. **Run migrations and seeders**
```bash
php artisan migrate:fresh --seed
```

6. **Start development server**
```bash
php artisan serve
```

Visit: `http://localhost:8000`

## Default Credentials

### Super Admin
- Email: `super@admin.com`
- Password: `password`

### Apartment Admin
- Email: `admin@apartment.com`
- Password: `password`

### Seller
- Email: `seller@test.com`
- Password: `password`

### Buyer
- Email: `buyer@test.com`
- Password: `password`

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── BuyerController.php
│   │   ├── SellerController.php
│   │   ├── AdminController.php
│   │   ├── OrderController.php
│   │   ├── ProductController.php
│   │   ├── SellerApplicationController.php
│   │   └── PaymentWebhookController.php
│   └── Middleware/
│       └── RoleMiddleware.php
└── Models/
    ├── Apartment.php
    ├── User.php
    ├── SellerApplication.php
    ├── Product.php
    ├── Order.php
    ├── OrderItem.php
    └── Payment.php

database/
├── migrations/
│   ├── *_create_apartments_table.php
│   ├── *_create_users_table.php
│   ├── *_create_seller_applications_table.php
│   ├── *_create_products_table.php
│   ├── *_create_orders_table.php
│   ├── *_create_order_items_table.php
│   └── *_create_payments_table.php
└── seeders/
    └── DatabaseSeeder.php

resources/views/
├── layouts/
│   └── app.blade.php
├── auth/
│   ├── login.blade.php
│   └── register.blade.php
├── buyer/
│   ├── home.blade.php
│   ├── cart.blade.php
│   ├── checkout.blade.php
│   ├── orders.blade.php
│   ├── order-detail.blade.php
│   └── payment.blade.php
├── seller/
│   ├── dashboard.blade.php
│   ├── orders.blade.php
│   ├── products.blade.php
│   ├── product-create.blade.php
│   └── product-edit.blade.php
├── admin/
│   ├── dashboard.blade.php
│   ├── sellers.blade.php
│   ├── orders.blade.php
│   └── settings.blade.php
└── seller-application/
    ├── form.blade.php
    └── status.blade.php
```

## User Flows

### Buyer Flow
1. Register/Login → Redirected to `/home`
2. Browse products
3. Add to cart (stored in localStorage)
4. Checkout → Place order
5. Payment (webhook integration)
6. View order status

### Seller Application Flow
1. Buyer applies to become seller
2. Application goes to "pending" status
3. Apartment Admin reviews and approves/rejects
4. If approved, user role changes to "seller"
5. Seller can now access seller dashboard and manage products

### Seller Flow
1. Login → Redirected to `/seller/dashboard`
2. Create/manage products
3. View orders
4. Update order status: pending → preparing → ready → completed

### Admin Flow
1. Login → Redirected to `/admin/dashboard`
2. Approve/reject seller applications
3. View all orders and transactions
4. Configure apartment settings (service fee, pickup location, pickup times)

## Business Rules

1. **Service Fee**: Default 5% platform fee on each order
2. **Payment**: Direct to seller (platform does not hold money)
3. **Pickup**: Fixed location and time window set by admin
4. **Single Tenant**: One apartment per installation (MVP)
5. **Seller Approval**: Only approved sellers can sell products

## Payment Integration

The system supports webhooks for:
- **Billplz**: `/webhook/billplz`
- **ToyyibPay**: `/webhook/toyyibpay`

To integrate:
1. Configure payment gateway credentials in `.env`
2. Set webhook URL in payment gateway dashboard
3. Payments will automatically update order status

## API Endpoints

### Webhooks
- `POST /webhook/billplz` - Billplz payment callback
- `POST /webhook/toyyibpay` - ToyyibPay payment callback

## Future Enhancements (Not in MVP)

- Multi-tenant support
- Wallet/escrow system
- Chat between buyer and seller
- Product reviews and ratings
- Native mobile apps
- Advanced analytics

## Database Schema

### apartments
- id, name, address, service_fee_percent, pickup_location, pickup_start_time, pickup_end_time, status, timestamps

### users
- id, apartment_id, name, email, password, phone, role, unit_no, block, status, timestamps

### seller_applications
- id, user_id, apartment_id, status, approved_by, approved_at, remarks, timestamps

### products
- id, apartment_id, seller_id, name, description, price, is_active, timestamps

### orders
- id, apartment_id, buyer_id, seller_id, order_no, total_amount, platform_fee, seller_amount, status, pickup_location, pickup_time, payment_status, payment_ref, timestamps

### order_items
- id, order_id, product_id, product_name, price, quantity, subtotal, timestamps

### payments
- id, order_id, gateway, amount, status, reference_no, paid_at, timestamps

## License

Proprietary - All rights reserved

## Support

For issues and questions, please contact the development team.
