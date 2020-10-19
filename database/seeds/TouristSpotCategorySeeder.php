<?php

use Illuminate\Database\Seeder;

class TouristSpotCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TouristSpotCategory::create([
            'en_name' => "Mountains",
            'bn_name' => "পাহাড় ",
        ]);
        \App\TouristSpotCategory::create([
            'en_name' => "Sea beach",
            'bn_name' => "সমুদ্র সৈকত ",
        ]);
    }
}
