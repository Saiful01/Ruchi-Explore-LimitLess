<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ProductCategory::create([
            'product_category_name' => "Ruchi-Chanachur",
            'featured_image' => "1 .jpg",

        ]);
        \App\ProductCategory::create([
            'product_category_name' => "Ruchi-Chips",
            'featured_image' => "2.png",

        ]);
        \App\ProductCategory::create([
            'product_category_name' => "Ruchi-Chutney",
            'featured_image' => "3.jpg",

        ]);



    }
}
