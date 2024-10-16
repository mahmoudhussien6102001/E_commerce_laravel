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
            'products/f3gMdtjvsViZaycTYjLQdN1wJZvFThr09frXiGHu.jpg',
            'products/eIFTD7p2m41SJVjp1TPlYkfmug92pBqgOBenx7uu.jpg',
            'products/oktGQLnz1X5aXLPNiUv4Uv2O2TWoFYXBOAH1ehSU.jpg',
            'products/UliYMV48aue6s776WoTbqRqaxdI0jtVFgu2ilxT3.jpg',

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
