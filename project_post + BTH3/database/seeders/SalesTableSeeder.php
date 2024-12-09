<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->numberBetween(1, 100), // Giả sử medicine_id là từ 1 đến 100
                'quantity' => $faker->numberBetween(1, 50), // Số lượng bán ra
                'sale_date' => $faker->dateTimeBetween('-1 year', 'now'), // Ngày bán
                'customer_phone' => $faker->optional()->numerify('##########'), // Số điện thoại (tùy chọn)
            ]);
        }
    }
}
