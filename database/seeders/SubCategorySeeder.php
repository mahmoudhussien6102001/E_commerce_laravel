<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                // إضافة بيانات إلى الجدول
                SubCategory::create([
                    'title' => 'Scarfs',
                    'category_id' => 1,
                ]);
        
                SubCategory::create([
                    'title' => 'Bags',
                    'category_id' => 1,
                ]);
        
                SubCategory::create([
                    'title' => 'Shoes',
                    'category_id' => 2,
                ]);
        
                SubCategory::create([
                    'title' => 'Accessories',
                    'category_id' => 3,
                ]);
        
                SubCategory::create([
                    'title' => 'Hats',
                    'category_id' => 3,
                ]);
    }
}















