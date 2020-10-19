<?php

namespace App\Http\Controllers;

use App\Blog;
use App\ForumTopic;
use App\LoginHistory;
use App\Place;
use App\Video;

class HomeController extends Controller
{


    public function adminHome()
    {
        $blog= Blog::all();
        $forum= ForumTopic::all();
        $place=Place::all();
        $video=Video::all();

         $login_histories = LoginHistory::
        join('users', 'users.id', '=', 'login_histories.user_id')
            ->orderBy('login_histories.created_at', 'DESC')
            ->limit(10)
            ->get([
                'login_histories.ip_address',
                'login_histories.created_at',
                'users.full_name',
            ]);
        return view('admin.home.index')
            ->with('blogs',$blog)
            ->with('forum',$forum)
            ->with('place',$place)
            ->with('video',$video)
            ->with('histories', $login_histories)
            ->with('unseen_notifications', null);

    }


}
