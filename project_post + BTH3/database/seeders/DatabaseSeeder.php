<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // Gọi đến PostsTableSeeder
        $this->call([
            PostsTableSeeder::class,
            MedicinesTableSeeder::class,
            SalesTableSeeder::class,
        ]);
    }
} 
