<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Áo thun Unisex',
                'price' => 199000,
                'description' => 'Chất liệu cotton 100%, thoáng mát.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Quần jean nam',
                'price' => 349000,
                'description' => 'Co giãn nhẹ, bền màu.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Giày sneaker trắng',
                'price' => 499000,
                'description' => 'Thiết kế hiện đại, dễ phối đồ.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
