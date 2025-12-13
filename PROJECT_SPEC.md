# PROJECT_SPEC.md
## Apartment Community POS (MVP)
Single Tenant • SaaS-Ready • Laravel

---

## 1. PROJECT OVERVIEW
This project is a Laravel-based MVP for an Apartment Community POS & Marketplace.

Purpose:
- Allow apartment residents to buy & sell food/products internally
- Sellers manage orders via a simple dashboard
- Apartment management (JMB) approves sellers and controls rules
- Payments are made directly to sellers
- Platform takes a service fee (default 5%)

Scope:
- Single apartment only (single tenant)
- SaaS-ready design
- Focus on simplicity and real usage

---

## 2. TECH STACK
- Backend: Laravel
- Frontend: Blade (mobile-first)
- Database: MySQL
- Payment Gateway: Billplz or ToyyibPay

---

## 3. ROLES
buyer  
seller  
apartment_admin  
super_admin  

---

## 4. CORE BUSINESS RULES
1. Only approved sellers can sell
2. Seller approval by apartment_admin
3. Payment goes directly to seller
4. Platform does not hold money
5. Pickup at lobby, fixed time window
6. Internal apartment use only

---

## 5. DATABASE DESIGN

### apartments
id, name, address, service_fee_percent, pickup_location,
pickup_start_time, pickup_end_time, status, timestamps

### users
id, apartment_id, name, email, password, phone,
role, unit_no, block, status, timestamps

### seller_applications
id, user_id, apartment_id, status, approved_by,
approved_at, remarks, timestamps

### products
id, apartment_id, seller_id, name, description,
price, is_active, timestamps

### orders
id, apartment_id, buyer_id, seller_id, order_no,
total_amount, platform_fee, seller_amount,
status, pickup_location, pickup_time,
payment_status, payment_ref, timestamps

### order_items
id, order_id, product_id, product_name,
price, quantity, subtotal, timestamps

### payments
id, order_id, gateway, amount, status,
reference_no, paid_at, timestamps

---

## 6. AUTH REDIRECT
buyer → /home  
seller → /seller/dashboard  
apartment_admin → /admin/dashboard  
super_admin → /super/dashboard  

---

## 7. SELLER APPLICATION FLOW
Buyer applies → pending → admin approves → role becomes seller

---

## 8. BUYER ORDER FLOW
Browse → cart → checkout → payment → webhook → seller dashboard

---

## 9. SELLER DASHBOARD
- View own orders
- Update status: pending → preparing → ready → completed
- Manage products
- View simple sales summary

---

## 10. ADMIN DASHBOARD
- Approve sellers
- View all orders
- Set pickup rules & service fee

---

## 11. CONTROLLERS
AuthController  
BuyerController  
SellerController  
AdminController  
OrderController  
ProductController  
SellerApplicationController  
PaymentWebhookController  

---

## 12. ROUTES

Public:
/, /login, /register

Buyer:
/home, /products, /cart, /checkout, /orders

Seller:
/seller/dashboard, /seller/orders, /seller/products

Admin:
/admin/dashboard, /admin/sellers, /admin/orders, /admin/settings

---

## 13. STATUS ENUMS
Order: pending, preparing, ready, completed, cancelled  
Payment: pending, paid, failed  

---

## 14. WHAT NOT TO BUILD
- Multi-tenant
- Wallet/escrow
- Chat
- Reviews
- Mobile app

---

## 15. CODING ORDER
1. Migrations
2. Models
3. Auth & middleware
4. Seller application
5. Products
6. Orders
7. Seller dashboard
8. Admin dashboard
9. Payment webhook

---

## 16. CURSOR INSTRUCTION
Read this file fully before coding.
Follow schema and rules strictly.
Keep code simple and clean.
