<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'date_of_birth' => '2000-01-01',
                'parent_phone' => '+123456789',
                'class_id' => 1, // Giả sử lớp 1 tồn tại
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'date_of_birth' => '2002-03-14',
                'parent_phone' => '+987654321',
                'class_id' => 2, // Giả sử lớp 2 tồn tại
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Thêm nhiều bản ghi khác nếu cần
        ]);
    }
}
