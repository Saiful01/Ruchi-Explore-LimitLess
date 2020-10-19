<?php

use Illuminate\Database\Seeder;

class ForumCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ForumComment::create([
            'comments' => "For the purpose of this tutorial, we’re going to create a button that, when clicked on, will replace the last quote written by Master Yoda with a quote written by Darth Vadar.",
            'user_id' => 1,
            'topic_id' => 1,
        ]);
    }
}
