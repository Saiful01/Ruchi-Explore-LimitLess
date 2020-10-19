<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);

        \App\User::create([
            'full_name' => "Motiur",
            'user_login' => "memotiur",
            'email' => "memotiur@gmail.com",
            'phone' => "01825136985",
            'password' => Hash::make('123456'),
            'is_admin' => true,
            'is_active' => true,
        ]);
        \App\User::create([
            'full_name' => "Saiful",
            'user_login' => "saiful",
            'email' => "saiful@gmail.com",
            'phone' => "01825369857",
            'password' => Hash::make('123456'),
            'is_admin' => true,
            'is_active' => true,
        ]);
        \App\User::create([
            'full_name' => "RUCHI",
            'user_login' => "suchi",
            'email' => "ruchi@gmail.com",
            'phone' => "01776107995",
            'password' => Hash::make('123456'),
            'is_admin' => true,
            'is_active' => true,
        ]);


        $this->call(ForumCategorySeeder::class);
        $this->call(ForumTopicSeeder::class);
        $this->call(ForumCommentSeeder::class);
        $this->call(SliderSeeder::class);

        $this->call(BlogSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(TripAlbumSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TouristSpotCategorySeeder::class);
        $this->call(TouristSpotSeeder::class);


        \App\ForumLike::create([
            'topic_id' => 1,
            'user_id' => 1,
        ]);


        \App\BlogCategory::create([
            'en_name' => "Adventure Trips",
            'bn_name' => "অ্যাডভেঞ্চার ট্রিপস",
            'home_nav_id' => "1",
        ]);

        \App\BlogCategory::create([
            'en_name' => "Budget Trips",
            'bn_name' => "বাজেট ট্রিপস",
            'home_nav_id' => "1",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Weekend Trips",
            'bn_name' => "উইকেন্ড ট্রিপস",
            'home_nav_id' => "1",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Romantic Destination",
            'bn_name' => "রোমান্টিক গন্তব্য",
            'home_nav_id' => "1",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Family Destination",
            'bn_name' => "পারিবারিক গন্তব্য",
            'home_nav_id' => "1",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Kids Destination",
            'bn_name' => "বাচ্চাদের গন্তব্য",
            'home_nav_id' => "1",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Foods Destination",
            'bn_name' => "খাবারের গন্তব্য",
            'home_nav_id' => "1",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Historic Destination",
            'bn_name' => "ঐতিহাসিক গন্তব্য",
            'home_nav_id' => "1",
        ]);
        /* \App\BlogCategory::create([
             'en_name' => "Explore Bangladesh",
             'bn_name' => "বাংলাদেশ অন্বেষণ করুন",
             'home_nav_id' => "1",
         ]);*/
        //second nav
        \App\BlogCategory::create([
            'en_name' => "Adventure Travel",
            'bn_name' => "রোমাঞ্চ ভ্রমণ",
            'home_nav_id' => "2",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Road Trips",
            'bn_name' => "রাস্তা যাত্রা",
            'home_nav_id' => "2",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Backpacking",
            'bn_name' => "ব্যকপ্যাকিং",
            'home_nav_id' => "2",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Travel On Budget",
            'bn_name' => "বাজেট ভ্রমণ",
            'home_nav_id' => "2",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Food and Drink",
            'bn_name' => "খাদ্য ও পানীয়",
            'home_nav_id' => "2",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Art and Culture",
            'bn_name' => "শিল্প ও সংস্কৃতি",
            'home_nav_id' => "2",
        ]);
        \App\BlogCategory::create([
            'en_name' => "Honeymoon and romance",
            'bn_name' => "হানিমুন এবং রোম্যান্স",
            'home_nav_id' => "2",
        ]);


        //Third nav
        \App\BlogCategory::create([
            'en_name' => "Tips",
            'bn_name' => "পরামর্শ",
            'home_nav_id' => "3",
        ]);
        /* \App\BlogCategory::create([
             'en_name' => "Moon Calender",
             'bn_name' => "মুন ক্যালেন্ডার",
             'home_nav_id' => "0",
         ]);*/


    }
}
