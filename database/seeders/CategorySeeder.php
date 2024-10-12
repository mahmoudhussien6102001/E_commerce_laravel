<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // Import the Category model



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a main category
        Category::create([
            'title' => 'Man',
        ]);

        // Create subcategories
        Category::create([
            'title' => 'Woman',
        ]);
        
        Category::create([
            'title' => 'Children',
        ]);
    }
}