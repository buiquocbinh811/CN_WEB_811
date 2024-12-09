<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Tạo 100 dữ liệu máy tính giả sử
        for ($i = 0; $i < 100; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word . '-' . $faker->randomDigit,
                'model' => $faker->word . ' ' . $faker->word,
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'Linux', 'macOS']),
                'processor' => $faker->word . ' ' . $faker->randomDigit,
                'memory' => $faker->randomElement([4, 8, 16, 32]), // RAM size
                'available' => $faker->boolean, // Trạng thái máy tính
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
