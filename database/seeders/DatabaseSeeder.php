<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the seeders in an appropriate order
        $this->call([
            CategorySeeder::class,
            SubCategorySeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
