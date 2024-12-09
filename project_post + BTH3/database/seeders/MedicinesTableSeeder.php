<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word, // Tên thuốc
                'brand' => $faker->company, // Thương hiệu
                'dosage' => $faker->randomElement(['10mg', '20mg', '50mg', '100mg']), // Liều lượng
                'form' => $faker->randomElement(['viên nén', 'viên nang', 'xi-rô', 'thuốc bột']), // Dạng thuốc
                'price' => $faker->randomFloat(2, 1, 1000), // Giá thuốc (từ 1 đến 1000)
                'stock' => $faker->numberBetween(0, 500), // Số lượng tồn
            ]);
        }
    }
}
