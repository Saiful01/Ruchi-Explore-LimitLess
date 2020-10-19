<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataMigrateController extends Controller
{


    public function modal()
    {

        return view('common.pages.destination.index');

    }

    public function userMigrate()
    {

        $datas = DB::table('wp_users')
            ->get();

        $all_user = array();
        $hash_password = Hash::make('123456');
        foreach ($datas as $data) {
            $user_array['user_login'] = $data->user_login;
            $user_array['user_name'] = $data->user_nicename;
            $user_array['email'] = $data->user_email;
            $user_array['user_registered'] = $data->user_registered;
            $user_array['full_name'] = $data->display_name;
            $user_array['old_id'] = $data->ID;

            $user_array['created_at'] = Carbon::now();
            $user_array['updated_at'] = Carbon::now();
            $user_array['password'] = $hash_password;
            try {
                User::create($user_array);
                $all_user[] = $user_array;
            } catch (\Exception $exception) {
                //return $exception->getMessage();
            }

        }
        //return $all_user;


        return "User Migrate Done".count($all_user);
    }


    public function dataMigrate()
    {

        $posts = DB::table('wp_posts')
            ->where('post_status', 'publish')
            /*   ->limit(1000)*/
            ->get();

        //return count($posts);

        //$posts = DB::table('wp_posts')->limit(10)->get();

        $my_posts = [];
        foreach ($posts as $post) {
            //echo $post->post_title;

            //getting Thumbnail

            $data = DB::table('wp_postmeta')
                ->where('wp_postmeta.post_id', $post->ID)
                ->where('wp_postmeta.meta_key', "_thumbnail_id")
                ->first();


            /*    if (!is_null($data)) {*/
            if (!is_null($data)) {

                $featured = DB::table('wp_posts')
                    ->where('ID', $data->meta_value)
                    ->first();

                $temp_image = $featured->guid;
                $featured_image = str_replace("http://ruchiexplorelimitless.com/wp-content/uploads/", "", $temp_image);
                $featured_image = str_replace("https://ruchiexplorelimitless.com/wp-content/uploads/", "", $featured_image);


            } else {
                $featured_image = null;
            }

            //Get Category
            $categories = DB::select('SELECT p.ID, t.term_id FROM wp_posts p 
                                  LEFT JOIN wp_term_relationships rel ON rel.object_id = p.ID 
                                  LEFT JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id 
                                  LEFT JOIN wp_terms t ON t.term_id = tax.term_id 
                                  where p.ID=' . $post->ID);
            $all_category = [];
            foreach ($categories as $cat) {

                $category = DB::table('wp_terms')->where('term_id', $cat->term_id)->first();

                //echo $category->name;
                if (!is_null($category)) {
                    $category_id = $category->name;
                    $category_id = $this->catNameToId($category->name);
                    $all_category[] = $category_id;
                } else {
                    $category_id = $post->post_title;
                    $category_id = $this->catNameToId($post->post_title);
                    $all_category[] = $category_id;
                }

            }
            //

            $details = str_replace("http://ruchiexplorelimitless.com/wp-content/uploads", "/images/blog/", $post->post_content);
            $details = str_replace("https://ruchiexplorelimitless.com/wp-content/uploads", "/images/blog/", $details);


            $is_exist = User::where('old_id', $post->post_author)->first();
            if (is_null($is_exist)) {
                $author_id = 1;
            } else {
                $author_id = $is_exist->id;
            }
            $array = [
                'blog_title' => $post->post_title,
                'blog_details' => $details,
                'author_id' => $author_id,
                'featured_image' => $featured_image,
                'category_id' => json_encode($all_category),
                'created_at' => $post->post_date,
            ];

            //Insert


            if (strpos($featured_image, '.jpg') !== false || strpos($featured_image, '.png') !== false) {

                if ($details != null) {
                    //$my_posts[] = $array;
                    try {
                        Blog::create($array);

                        $my_posts[] = $array;
                    } catch (\Exception $exception) {

                    }
                }

            }
        }

        //return ($my_posts);

        try {
            //Blog::insert($my_posts);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return "Blog Migrated: ".count($my_posts);
    }


    private function catNameToId($name)
    {
        if ($name == "Road Trip") {
            $name = "Road Trips";
        }
        if ($name == "Tips") {
            $name = "Tour Tips";
        }
        $is_exist = BlogCategory::where('en_name', $name)->first();
        if (!is_null($is_exist)) {
            return $is_exist->blog_category_id;
        } else {

            $splitarray = explode(' ', $name);

            $is_exist = BlogCategory::where('en_name', 'LIKE', '%' . $splitarray[0] . '%')->first();
            if (!is_null($is_exist)) {
                return $is_exist->blog_category_id;
            } else {

                return 1;
            }
        }

    }

    public function bUserDataMigrate()
    {

        $client = new Client();
        $results = $client->get('http://127.0.0.1:8080/test');
        $temp = $results->getBody();

        $temp1 = json_decode($temp);
        $hash_password = Hash::make('123456');
        foreach ($temp1 as $data) {

            $user_array['user_login'] = $data->user_login;
            $user_array['user_name'] = $data->user_name;
            $user_array['email'] = $data->email;
            $user_array['user_registered'] = $data->user_registered;
            $user_array['full_name'] = $data->full_name;
            $user_array['old_id'] = "b_".$data->old_id;

            $user_array['created_at'] = Carbon::now();
            $user_array['updated_at'] = Carbon::now();
            $user_array['password'] = $hash_password;

            try {
                User::create($user_array);
                $all_user[] = $user_array;
            } catch (\Exception $exception) {
                //return $exception->getMessage();
            }


        }

        return count($temp1);

        $datas = DB::table('wp_users')
            ->get();

        $all_user = array();
        $hash_password = Hash::make('123456');
        foreach ($datas as $data) {
            $user_array['user_login'] = $data->user_login;
            $user_array['user_name'] = $data->user_nicename;
            $user_array['email'] = $data->user_email;
            $user_array['user_registered'] = $data->user_registered;
            $user_array['full_name'] = $data->display_name;
            $user_array['old_id'] = "b_".$data->ID;

            $user_array['created_at'] = Carbon::now();
            $user_array['updated_at'] = Carbon::now();
            $user_array['password'] = $hash_password;
            try {
                User::create($user_array);
                $all_user[] = $user_array;
            } catch (\Exception $exception) {
                //return $exception->getMessage();
            }

        }
        //return $all_user;


        return count($all_user);

        /*return $datas = DB::table('wp_users')
            ->get();*/

    }

    public function bPostDataMigrate()
    {

        $client = new Client();
        $results = $client->get('http://127.0.0.1:8080/test');
        $temp = $results->getBody();

        $temp1 = json_decode($temp);

        foreach ($temp1 as $data) {


            $is_exist = User::where('email', $data->post_author)->first();
            if (is_null($is_exist)) {
                $author_id = 1;
            } else {
                $author_id = $is_exist->id;
            }


            $blog_array['blog_title'] = $data->post_title;
            $blog_array['blog_details'] = $data->details;
            $blog_array['author_id'] = $author_id;
            $blog_array['featured_image'] = $data->featured_image;
            $blog_array['category_id'] = 420;
            $blog_array['created_at'] = $data->post_date;
            $user_array['updated_at'] = Carbon::now();

            /*
                        try {
                            User::create($user_array);
                            $all_user[] = $user_array;
                        } catch (\Exception $exception) {
                            //return $exception->getMessage();
                        }*/


        }

        return ($blog_array);

        $datas = DB::table('wp_users')
            ->get();

        $all_user = array();
        $hash_password = Hash::make('123456');
        foreach ($datas as $data) {
            $user_array['user_login'] = $data->user_login;
            $user_array['user_name'] = $data->user_nicename;
            $user_array['email'] = $data->user_email;
            $user_array['user_registered'] = $data->user_registered;
            $user_array['full_name'] = $data->display_name;
            $user_array['old_id'] = $data->ID;

            $user_array['created_at'] = Carbon::now();
            $user_array['updated_at'] = Carbon::now();
            $user_array['password'] = $hash_password;
            try {
                User::create($user_array);
                $all_user[] = $user_array;
            } catch (\Exception $exception) {
                //return $exception->getMessage();
            }

        }
        //return $all_user;


        return count($all_user);

        /*return $datas = DB::table('wp_users')
            ->get();*/

    }

}
