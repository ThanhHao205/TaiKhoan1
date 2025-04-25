<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderNote;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $products = Product::factory(10)->create(); // tạo 10 sản phẩm

    User::factory(5)->create()->each(function ($user) use ($products) {
        Order::factory(2)->create(['user_id' => $user->id])->each(function ($order) use ($products) {
            OrderNote::factory(rand(1, 2))->create(['order_id' => $order->id]);

            // Gắn 2-3 sản phẩm cho mỗi đơn hàng
            $order->products()->attach(
                $products->random(rand(2, 3))->pluck('id')->toArray(),
                ['quantity' => rand(1, 5)]
            );
        });
    });
}
}
