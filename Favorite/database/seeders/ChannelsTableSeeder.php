<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i < 100; $i++) {
            DB::table('channels')->insert([
                'ChannelName' => $faker->company,
                'Description' => $faker->paragraph,
                'SubscribersCount' => $faker->numberBetween(100, 1000000),
                'URL' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
