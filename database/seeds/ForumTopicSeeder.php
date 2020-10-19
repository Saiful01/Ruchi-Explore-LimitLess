<?php

use Illuminate\Database\Seeder;

class ForumTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\ForumTopic::create([
            'title' => "Building a Simple CRUD Application with Express and MongoDB",
            'details' => "I remember when I eventually picked up the courage to try, I had such a hard time understanding the documentations for Express, MongDB and Node that I gave up.",
            'user_id' => 1,
            'category_id' => 1,
        ]);

        \App\ForumTopic::create([
            'title' => "This article is the second part on creating a CRUD",
            'details' => "The UPDATE operation is used when you want to change something. It can only be triggered by browsers through a PUT request. Like the POST request, the PUT request can either be triggered through JavaScript",
            'user_id' => 1,
            'category_id' => 1,
        ]);


        \App\ForumTopic::create([
            'title' => "This article is the second part on creating a CRUD",
            'details' => "The UPDATE operation is used when you want to change something. It can only be triggered by browsers through a PUT request. Like the POST request, the PUT request can either be triggered through JavaScript",
            'user_id' => 1,
            'category_id' => 1,
        ]);
    }
}
