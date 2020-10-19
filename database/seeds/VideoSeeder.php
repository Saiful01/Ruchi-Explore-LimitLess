<?php

use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Video::create([
            'video_title'=>"Sundarbans",
            'video'=>"sundarbans.mp4",
            'video_image'=>"sundarban.jpg",
            'author_id'=>1
        ]);
        \App\Video::create([
            'video_title'=>"Ratargul",
            'video'=>"ratargul.mp4",
            'video_image'=>"ratargul.jpg",
            'author_id'=>1
        ]);
        \App\Video::create([
            'video_title'=>"lalakhal",
            'video'=>"lalakhal.mp4",
            'video_image'=>"lalakhal.jpg",
            'author_id'=>1
        ]);
        \App\Video::create([
            'video_title'=>"lalakhal",
            'video'=>"lalakhal.mp4",
            'video_image'=>"lalakhal.jpg",
            'author_id'=>1
        ]);

        //For Beauty Gram
        \App\Video::create([
            'video_title'=>"lalakhal",
            'video'=>"lalakhal.mp4",
            'video_image'=>"lalakhal.jpg",
            'author_id'=>1,
            'is_beauty_gram'=>true
        ]);
    }
}
