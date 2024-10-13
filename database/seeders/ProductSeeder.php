<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // استخدام factory لإنشاء 100 منتج
        Product::factory()->count(50)->create();
    }
}
