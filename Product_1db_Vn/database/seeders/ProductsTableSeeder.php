<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        //sd tieng viet
        $faker = Faker::create('vi_VN'); 

        $categories = ['Điện thoại', 'Laptop', 'Máy tính bảng', 'Phụ kiện'];

        for ($i = 0; $i < 100; $i++) {
            DB::table('products')->insert([
                'product_name' => $faker->words(3, true),
                'description' => $faker->paragraph,
                'price' => $faker->numberBetween(100000, 50000000),
                'image' => $faker->imageUrl(640, 480, 'product', true),
                'category_name' => $faker->randomElement($categories),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}