<?php

use Illuminate\Database\Seeder;

class TouristSpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TouristSpot::create([
            'spot_name' => "Nilachal",
            'spot_bn_name' => "নীলাচল",
            'spot_details' => "Bandarban, is a district in South-Eastern Bangladesh, and a part of the Chittagong Division. It is one of the three hill districts of Bangladesh and a part of the Chittagong Hill Tracts,",
            'featured_image' => "1.jpg",
            'lat' => "22.1670147",
            'lon' => "92.2100408",
            'is_active' =>true,
            'spot_category_id' =>1,
        ]);
        \App\TouristSpot::create([
            'spot_name' => "Nilgiri",
            'spot_bn_name' => "নীলগিরি",
            'spot_details' => "Bandarban, is a district in South-Eastern Bangladesh, and a part of the Chittagong Division. It is one of the three hill districts of Bangladesh and a part of the Chittagong Hill Tracts,",
            'featured_image' => "2.jpg",
            'lat' => "22.1670137",
            'lon' => "92.1947199",
            'is_active' =>true,
            'spot_category_id' =>1,
        ]);
        \App\TouristSpot::create([
            'spot_name' => "Sajek",
            'spot_bn_name' => "সাজেক",
            'spot_details' => "Bandarban, is a district in South-Eastern Bangladesh, and a part of the Chittagong Division. It is one of the three hill districts of Bangladesh and a part of the Chittagong Hill Tracts,",
            'featured_image' => "3.jpg",
            'lat' => "23.3813964",
            'lon' => "92.2861862",
            'is_active' =>true,
            'spot_category_id' =>1,
        ]);
        \App\TouristSpot::create([
            'spot_name' => "Cox'sBazar",
            'spot_bn_name' => "কক্সবাজার",
            'spot_details' => "Bandarban, is a district in South-Eastern Bangladesh, and a part of the Chittagong Division. It is one of the three hill districts of Bangladesh and a part of the Chittagong Hill Tracts,",
            'featured_image' => "4.jpg",
            'lat' => "21.415935",
            'lon' => "91.978803",
            'is_active' =>true,
            'spot_category_id' =>2,
        ]);
        \App\TouristSpot::create([
            'spot_name' => "Kuakata",
            'spot_bn_name' => "কুয়াকাটা",
            'spot_details' => "Bandarban, is a district in South-Eastern Bangladesh, and a part of the Chittagong Division. It is one of the three hill districts of Bangladesh and a part of the Chittagong Hill Tracts,",
            'featured_image' => "5.jpg",
            'lat' => "21.835306",
            'lon' => "90.1053974",
            'is_active' =>true,
            'spot_category_id' =>2,
        ]);
    }
}
