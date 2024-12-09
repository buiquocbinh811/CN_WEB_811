<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Giả sử có từ 1 đến 10 lớp trong bảng classes
        $classIds = DB::table('classes')->pluck('id')->toArray();

        // Tạo dữ liệu cho bảng students
        for ($i = 0; $i < 100; $i++) { 
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date,
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $faker->randomElement($classIds), // Chọn ngẫu nhiên một lớp từ bảng classes
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}