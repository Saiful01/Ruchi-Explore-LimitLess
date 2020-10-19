<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Slider::create([
            'en_title' => "Back Packing",
            'bn_title' => "Back Packing",
            'en_sub_title' => "",
            'bn_sub_title' => "",
            'slider_name' => "slide_home_1.jpg",
        ]);

        \App\Slider::create([
            'en_title' => "Romantic Destination",
            'bn_title' => "Romantic Destination",
            'en_sub_title' => "",
            'bn_sub_title' => "",
            'slider_name' => "slide_home_2.jpg",
        ]);

        \App\Slider::create([
            'en_title' => "Family Destination",
            'bn_title' => "Bangla  Title Three",
            'en_sub_title' => "",
            'bn_sub_title' => "",
            'slider_name' => "slide_home_3.jpg",
        ]);
    }
}
