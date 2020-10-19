<?php

use Illuminate\Database\Seeder;

class ForumCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ForumCategory::create([
            'category_name' => "Travel"
        ]);

        \App\ForumCategory::create([
            'category_name' => "Food"
        ]);
    }
}
