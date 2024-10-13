<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\SubCategory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        // مصفوفة تحتوي على أسماء الصور
        $images = [
            'products/9zBlz27W4BuLcNR17Sf6DVrvzZJoRypIEMIMmq71.jpg',
            'products/JO5r0tNQbNkCuHarIEfIfD2ZR0ViUgvRt9y48Xwp.png',
            'products/3cFg6LP8ACKlUGxsuRNSt87pmfibR0PML1IhGGlk.jpg',
            'products/yRp4ANDtNm0r1WN5xwOEJREKwHYZroMjxONtn32T.jpg',
            'products/6rzcQzxyNcz0IfUKZnwhjW8JfE6LrQJJSUUkk5Im.jpg',
            'products/tgdJ3qhrDr4MIGVZvPs8U37nFbgajyt8LhjF9Fn6.webp',
            'products/X6fIghQCLwLr15wNHewsYxcdwfq9eZmp6dy4qcYz.jpg',
            'products/zWoQyHjZGoAdaWolTWeq9zlSg8Rg5NmruEQTCwrz.jpg',
            'products/JO5r0tNQbNkCuHarIEfIfD2ZR0ViUgvRt9y48Xwp.png',
            // أضف المزيد من الصور حسب الحاجة
        ];
        // اختيار صورة عشوائية من المصفوفة
        $selectedImage = $images[array_rand($images)];

        return [
            'title' => $this->faker->sentence(1),
            'description' => $this->faker->paragraph,
            'image' => $selectedImage, // استخدام المسار الصحيح للصورة
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'available_quantity' => $this->faker->numberBetween(1, 100),
            'category_id' => Category::inRandomOrder()->first()->id,
            'sub_category_id' => SubCategory::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
