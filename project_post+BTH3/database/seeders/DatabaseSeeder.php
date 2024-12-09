<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Gọi đến các Seeder
        $this->call([
            PostsTableSeeder::class,
            MedicinesTableSeeder::class,
            SalesTableSeeder::class,
            ClassesTableSeeder::class,
            StudentsTableSeeder::class,
            ComputersTableSeeder::class, 
            IssuesTableSeeder::class,    
        ]);
    }
}