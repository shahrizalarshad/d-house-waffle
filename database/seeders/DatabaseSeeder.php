<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default apartment
        $apartment = Apartment::create([
            'name' => 'Apartment Community 1',
            'address' => 'Jalan Apartment 1, Kuala Lumpur',
            'service_fee_percent' => 5.00,
            'pickup_location' => 'Lobby Main Entrance',
            'pickup_start_time' => '10:00:00',
            'pickup_end_time' => '20:00:00',
            'status' => 'active',
        ]);

        // Create super admin
        User::create([
            'apartment_id' => $apartment->id,
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => Hash::make('password'),
            'phone' => '0123456789',
            'role' => 'super_admin',
            'unit_no' => '01-01',
            'block' => 'A',
            'status' => 'active',
        ]);

        // Create apartment admin
        User::create([
            'apartment_id' => $apartment->id,
            'name' => 'Apartment Admin',
            'email' => 'admin@apartment.com',
            'password' => Hash::make('password'),
            'phone' => '0123456788',
            'role' => 'apartment_admin',
            'unit_no' => '01-02',
            'block' => 'A',
            'status' => 'active',
        ]);

        // Create sample seller
        $seller = User::create([
            'apartment_id' => $apartment->id,
            'name' => 'John Seller',
            'email' => 'seller@test.com',
            'password' => Hash::make('password'),
            'phone' => '0123456787',
            'role' => 'seller',
            'unit_no' => '02-05',
            'block' => 'B',
            'status' => 'active',
        ]);

        // Create sample buyer
        User::create([
            'apartment_id' => $apartment->id,
            'name' => 'Jane Buyer',
            'email' => 'buyer@test.com',
            'password' => Hash::make('password'),
            'phone' => '0123456786',
            'role' => 'buyer',
            'unit_no' => '03-10',
            'block' => 'C',
            'status' => 'active',
        ]);

        // Create sample products
        \App\Models\Product::create([
            'apartment_id' => $apartment->id,
            'seller_id' => $seller->id,
            'name' => 'Nasi Lemak',
            'description' => 'Traditional Malaysian breakfast with sambal, ikan bilis, and egg',
            'price' => 5.50,
            'is_active' => true,
        ]);

        \App\Models\Product::create([
            'apartment_id' => $apartment->id,
            'seller_id' => $seller->id,
            'name' => 'Mee Goreng',
            'description' => 'Spicy fried noodles with vegetables and chicken',
            'price' => 6.00,
            'is_active' => true,
        ]);

        \App\Models\Product::create([
            'apartment_id' => $apartment->id,
            'seller_id' => $seller->id,
            'name' => 'Homemade Cookies (10pcs)',
            'description' => 'Freshly baked chocolate chip cookies',
            'price' => 8.00,
            'is_active' => true,
        ]);
    }
}
