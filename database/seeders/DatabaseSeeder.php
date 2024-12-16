<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed Users
        DB::table('users')->insert(
            collect(range(1, 20))->map(function ($i) {
                return [
                    'username' => 'user' . $i,
                    'email' => "user{$i}@example.com",
                    'password' => bcrypt('password'),
                    'role' => $i % 2 === 0 ? 'admin' : 'customer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray()
        );

        // Seed Categories
        DB::table('categories')->insert(
            collect(range(1, 20))->map(function ($i) {
                return [
                    'name' => 'Category ' . $i,
                    'description' => 'Description for Category ' . $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray()
        );

        // Seed Products
        DB::table('products')->insert(
            collect(range(1, 20))->map(function ($i) {
                return [
                    'name' => 'Product ' . $i,
                    'description' => 'Description for Product ' . $i,
                    'price' => rand(100, 1000) / 10,
                    'stock_quantity' => rand(1, 100),
                    'category_id' => rand(1, 20),
                    'image_url' => 'https://via.placeholder.com/150',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray()
        );

        // Seed Cart
        DB::table('cart')->insert(
            collect(range(1, 20))->map(function ($i) {
                return [
                    'user_id' => rand(1, 20),
                    'product_id' => rand(1, 20),
                    'quantity' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray()
        );

        // Seed Orders
        DB::table('orders')->insert(
            collect(range(1, 20))->map(function ($i) {
                return [
                    'user_id' => rand(1, 20),
                    'order_number' => Str::random(10),
                    'total_amount' => rand(1000, 10000) / 10,
                    'status' => ['pending', 'completed', 'shipped', 'canceled'][array_rand(['pending', 'completed', 'shipped', 'canceled'])],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray()
        );

        // Seed Order Items
        DB::table('order_items')->insert(
            collect(range(1, 20))->map(function ($i) {
                return [
                    'order_id' => rand(1, 20),
                    'product_id' => rand(1, 20),
                    'quantity' => rand(1, 5),
                    'price' => rand(100, 1000) / 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray()
        );

        // Seed Payments
        DB::table('payments')->insert(
            collect(range(1, 20))->map(function ($i) {
                return [
                    'order_id' => rand(1, 20),
                    'payment_method' => ['credit_card', 'paypal', 'bank_transfer'][array_rand(['credit_card', 'paypal', 'bank_transfer'])],
                    'amount' => rand(1000, 10000) / 10,
                    'status' => ['success', 'failed', 'pending'][array_rand(['success', 'failed', 'pending'])],
                    'payment_date' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray()
        );

        // Seed Inventory Adjustments
        DB::table('inventory_adjustments')->insert(
            collect(range(1, 20))->map(function ($i) {
                return [
                    'product_id' => rand(1, 20),
                    'adjustment_type' => ['add', 'remove'][array_rand(['add', 'remove'])],
                    'quantity' => rand(1, 50),
                    'reason' => 'Reason ' . $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray()
        );
    }
}
