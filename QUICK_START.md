# ⚡ Quick Start Guide

## 🚀 Get Running in 5 Minutes

### Step 1: Setup (2 minutes)
```bash
# Make setup script executable
chmod +x setup.sh

# Run automated setup
./setup.sh

# When prompted about database, press 'y' and Enter
```

### Step 2: Start Server (30 seconds)
```bash
php artisan serve
```

### Step 3: Open Browser (30 seconds)
```
http://localhost:8000
```

### Step 4: Login & Test (2 minutes)
Use any of these test accounts:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@apartment.com | password |
| Seller | seller@test.com | password |
| Buyer | buyer@test.com | password |

---

## 🎯 Quick Test Scenarios

### Scenario 1: Buy Something (2 mins)
1. Login as: `buyer@test.com`
2. Click on any product
3. Click "Add to Cart"
4. Go to Cart
5. Click Checkout
6. View your order

### Scenario 2: Sell Something (3 mins)
1. Login as: `seller@test.com`
2. Go to "My Products"
3. Click "Add Product"
4. Fill in details
5. Click "Create Product"
6. View it on the marketplace

### Scenario 3: Approve Seller (4 mins)
1. Login as: `buyer@test.com`
2. Click "Become a Seller"
3. Submit application
4. Logout
5. Login as: `admin@apartment.com`
6. Go to "Manage Sellers"
7. Approve the application
8. Login back as buyer (now seller!)

### Scenario 4: Manage Orders (2 mins)
1. Login as: `seller@test.com`
2. Go to "Orders"
3. Change status to "Preparing"
4. Save
5. View on buyer's order list

---

## 📱 Key Features to Explore

### As Buyer
- ✅ Browse products
- ✅ Add to cart
- ✅ Checkout
- ✅ Track orders
- ✅ Apply to become seller

### As Seller
- ✅ Dashboard with stats
- ✅ Manage products
- ✅ View orders
- ✅ Update order status
- ✅ See earnings

### As Admin
- ✅ Approve sellers
- ✅ View all orders
- ✅ Configure settings
- ✅ Monitor revenue

---

## 🐛 Troubleshooting

### Database Error?
```bash
# Check .env file has correct database settings
# Default for local:
DB_HOST=127.0.0.1
DB_DATABASE=pos_apartment
DB_USERNAME=root
DB_PASSWORD=

# Then run:
php artisan migrate:fresh --seed
```

### Can't Login?
```bash
# Reset database with test accounts:
php artisan migrate:fresh --seed
```

### Routes Not Working?
```bash
# Clear all caches:
php artisan optimize:clear
```

### Page Not Found?
```bash
# Make sure server is running:
php artisan serve

# Then visit: http://localhost:8000
```

---

## 📚 Documentation Files

- **README.md** → Complete project documentation
- **SETUP.md** → Detailed setup instructions
- **MVP_CHECKLIST.md** → All features implemented
- **IMPLEMENTATION_SUMMARY.md** → What was built
- **PROJECT_SPEC.md** → Original requirements

---

## 🎨 UI Preview

### Mobile View
- Bottom navigation bar
- Touch-friendly buttons
- Responsive layout
- Works on 320px screens

### Desktop View
- Clean, modern design
- Easy navigation
- Statistics cards
- Full-featured dashboards

---

## 💡 Tips

1. **Test on Mobile**: Open on your phone's browser
2. **Check All Roles**: Login as different users to see different views
3. **Add Products**: Sellers should add products to see them in marketplace
4. **Place Orders**: Test the complete flow from cart to order
5. **Approve Sellers**: Test the seller application workflow

---

## ⚙️ Configuration

### Change Service Fee
1. Login as admin
2. Go to Settings
3. Change "Service Fee (%)"
4. Save

### Change Pickup Location
1. Login as admin
2. Go to Settings
3. Update "Pickup Location"
4. Update pickup times
5. Save

---

## 🔒 Security Notes

- All passwords are hashed (bcrypt)
- CSRF protection enabled
- SQL injection protected (Eloquent)
- XSS protection (Blade)
- Role-based access control
- Session security configured

---

## 📞 Need Help?

1. Check troubleshooting section above
2. Review SETUP.md for detailed instructions
3. Check Laravel docs: https://laravel.com/docs
4. Verify PROJECT_SPEC.md requirements

---

## ✅ What's Ready

✅ Complete database structure
✅ All user roles working
✅ Product management
✅ Order system
✅ Cart functionality
✅ Payment webhooks ready
✅ Mobile-responsive UI
✅ Test data seeded
✅ Documentation complete

## ⏭️ What's Next

1. Configure real payment gateway
2. Set up production database
3. Deploy to server
4. Invite real users
5. Monitor and improve

---

**🎉 Your MVP is ready to use!**

Start the server and login to explore all features!

```bash
php artisan serve
# Visit: http://localhost:8000
```

