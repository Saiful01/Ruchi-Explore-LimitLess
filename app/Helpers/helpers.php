<?php

use App\BlogCategory;
use App\Place;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function statusFormat($status)
{
    return strtoupper(str_replace('_', ' ', $status));;
}

function getTransportType()
{
    return $status_array = array(
        '1' => 'Bus',
        '2' => 'Train',
        '3' => 'Air',
    );
}

function getHomeNav()
{
    return $status_array = array(
        '1' => 'Destination',
        '2' => 'Travel Stories',
        '3' => 'Tour Tips',
    );
}

function getAdminType()
{
    return 1;
}

function getUserType()
{
    return 2;
}

function getTransportData($place_id)
{
    return \App\Transport::where('place_id', $place_id)
        ->get();

}

function getTransportTypeById($id)
{
    foreach (getTransportType() as $key => $value) {
        if ($key == $id) {
            return $value;
        }
    }
}

function dateFormat($date)
{

    $createdAt = Carbon::parse($date);
    return $createdAt->format('d M, Y g:i A');
}

function getonlyDate($date)
{

    $createdAt = Carbon::parse($date);
    return $createdAt->format('d');
}

function getonlyMonth($date)
{

    $createdAt = Carbon::parse($date);
    return $createdAt->format('M');
}

function getPlaces()
{
    return $places = Place::get();
}

function getCategoryNameFromId($id)
{
    $category = \App\BlogCategory::where('blog_category_id', $id)->first();
    /*   foreach (json_decode($category) as $category)
       {
           print_r($category); // this is your area from json response
       }*/
    if (\Session::has('locale')) {

        if (\Session::get('locale') == "bn") {
            $category_name = $category->bn_name;

        } else {
            $category_name = $category->en_name;
        }
    } else {
        $category_name = $category->en_name;
    }

    return $category_name;

}

function getForumLike($forum_id)
{
    return \App\ForumLike::where('topic_id', $forum_id)->count();

}

function getCategory($id)
{
    return $category = BlogCategory::where('blog_category_id', $id)->first();
}

function getTitleToUrl($blog_title)
{
    return str_replace(" ", "-", $blog_title);
}

function getNavbarWithId($id)
{
    return BlogCategory::where('home_nav_id', $id)->get();

}

function getNavbar()
{
    return BlogCategory::whereIn('home_nav_id', [1, 2, 3])->get();

}

function gettingCategoryIdtoValue($id)
{

    return \App\BlogCategory::where('blog_category_id', $id)->first()->en_name;

}

function getNameFromId($id)
{
    $name = \App\User::where('id', $id)->first();
    if (!is_null($name)) {
        return $name->full_name;
    }
    return "";

}

function getDivisionName($id)
{
    $from_array = [
        '1' => "Dhaka",
        '2' => "Rajshahi",
        '3' => "Barisal",
        '4' => "Chittagong",
        '5' => "Khulna",
        '6' => "Mymensingh",
        '7' => "Sylhet",
        '8' => "Rangpur",
    ];
    return $from_array[$id];

}

function getLimitedPostContent($post)
{

    return \Illuminate\Support\Str::words($post, 30, ' ..');
}

function getAdminPostCreatedMsg(\http\Client\Request $request)
{
    $author = Auth::user()->full_name;

    return " New Post '$request->blog_title' has been created.
     Here is the details
     Post Title:'$request->blog_title'
     Post Details:'$request->blog_deails'
     Author:'$author'
      ";
}

function getAdminEmail()
{
    return "ruchiexplore@gmail.com";
}

function getHighestScore($game_id)
{
    return DB::table('scores')->where('game_id', $game_id)->limit(1)->first();
}


//https://stackoverflow.com/questions/28290332/best-practices-for-custom-helpers-in-laravel-5
?>
