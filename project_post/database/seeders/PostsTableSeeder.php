<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Dùng Faker để tạo dữ liệu giả
use Illuminate\Support\Facades\DB; // Sử dụng DB Facade

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Tạo đối tượng Faker

        // Xóa tất cả dữ liệu trong bảng posts trước khi thêm dữ liệu mới
        DB::table('posts')->truncate();

        // Vòng lặp để chèn 100 dòng dữ liệu
        for ($i = 0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->sentence, // Tạo câu tiêu đề giả
                'content' => $faker->paragraph, // Tạo đoạn văn nội dung giả
            ]);
        }
    }
}
