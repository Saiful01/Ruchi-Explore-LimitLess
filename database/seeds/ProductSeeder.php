<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Product::create([
            'product_name' => "Ruchi Hot Chanachur",
            'product_details' => "Besides the essential ingredients in their individual savoriness,Ruchi Hot Chanachur has a shocking hot flavor to complete the crunchy snacks,Whice give you a jolt brings your moments to life. ",
            'available_in' => "20gm, 35gm. 100 gm",
            'Product_price' => "100",
            'url_link' => "https://chaldal.com/ruchi-chanachur-350-gm-5",
            'product_image' => "1.jpg",
            'product_category_id' => 1,
        ]);
        \App\Product::create([
            'product_name' => "Ruchi BBQ Chanachur",
            'product_details' => "Besides the essential ingredients in their individual savoriness,Ruchi Hot Chanachur has a shocking hot flavor to complete the crunchy snacks,Whice give you a jolt brings your moments to life. ",
            'available_in' => "20gm, 35gm. 100 gm",
            'Product_price' => "100",
            'url_link' => "https://chaldal.com/ruchi-bbq-chanachur-350-gm",
            'product_image' => "2.jpg",
            'product_category_id' => 1,

        ]);
        \App\Product::create([
            'product_name' => "Ruchi Premium Mix Chanachur",
            'product_details' => "Besides the essential ingredients in their individual savoriness,Ruchi Hot Chanachur has a shocking hot flavor to complete the crunchy snacks,Whice give you a jolt brings your moments to life. ",
            'available_in' => "20gm, 35gm. 100 gm",
            'Product_price' => "100",
            'url_link' => "https://chaldal.com/ruchi-premium-mix-chanachur-100-gm",
            'product_image' => "3.jpg",
            'product_category_id' => 1,

        ]);
    }
}
