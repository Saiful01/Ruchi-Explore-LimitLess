<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\Company;
use App\Event;
use App\Package;
use App\Place;
use App\Product;
use App\ProductCategory;
use App\Slider;
use App\TouristSpot;
use App\TouristSpotCategory;
use App\TripAlbaum;
use App\User;
use App\Video;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function test()
    {
        $xml = file_get_contents(public_path('sitemap.xml'));
        return response($xml, 200)->header('Content-Type', 'application/xml');

        /* $content = file_get_contents(public_path('sitemap.xml'));
         $xmlObject = simplexml_load_string($content);
         $json = json_encode($xmlObject);

         return $array = json_decode($json, TRUE);*/


    }


    public function home()
    {
        $featured_stories= Blog::where('blog_id', 1)->first();
        $blogs = Blog::orderBy('blogs.created_at', 'DESC')->where('blogs.is_beauty_gram', false)->join('users', 'users.id', '=', 'blogs.author_id')->where('publish_status', true)->limit(4)->get();
        $places = Place::get();
        $videos = Video::where('is_beauty_gram', false)->limit(6)->get();
        $trip = TripAlbaum::orderBy('created_at', 'ASC')->where('is_beauty_gram', false)->limit(6)->get();
        $slider = Slider::get();

        return view('common.pages.home.index2')
            ->with('featured_stories', $featured_stories)
            ->with('places', $places)
            ->with('videos', $videos)
            ->with('blogs', $blogs)
            ->with('slider', $slider)
            ->with('trip', $trip);
    }

    public function about()
    {
        return view('common.pages.about.index');

    }

    public function contact()
    {
        return view('common.pages.contact.index');

    }

    public function exploreBangladesh()
    {
        $categories = TouristSpotCategory::get();
        return view('common.pages.explore_bangladesh.index')->with('categories', $categories);
    }

    public function exploreBangladeshMap()
    {
        $categories = TouristSpotCategory::get();
        return view('common.pages.explore_bangladesh.design2')->with('categories', $categories);
    }
    public function exploreBangladeshSvg()
    {
        $categories = TouristSpotCategory::get();
        return view('common.pages.explore_bangladesh.svg')->with('categories', $categories);
    }

    public function exploreBangladeshSpotDetails($spot_id, $spot_name)
    {
        $spot = TouristSpot::where('spot_id', $spot_id)
            ->join('tourist_spot_categories', 'tourist_spot_categories.spot_category_id', '=', 'tourist_spots.spot_category_id')
            ->first();
        return view('common.pages.explore_bangladesh.details')->with('spot', $spot);
    }

    public function blogs()
    {
        $blogs = Blog::where('publish_status', true)->orderBy('created_at', 'DESC')->paginate(5);
        $categories = BlogCategory::orderBy('created_at', 'DESC')->limit(6)->get();

        return view('common.pages.blog.index')
            ->with('categories', $categories)
            ->with('blogs', $blogs);
    }

    public function blog($id, $name)
    {

        $comments = BlogComment::where('blog_comments.blog_post_id', $id)
            ->join('users', 'users.id', '=', 'blog_comments.author_id')
            ->select('blog_comments.*', 'users.full_name', 'users.id')
            ->where('is_spam', false)
            ->orderBy('created_at', 'DESC')
            ->get();


        $categories = BlogCategory::orderBy('created_at', 'DESC')->where('home_nav_id', 2)->limit(6)->get();
        $blog = Blog::where('blog_id', $id)->where('blogs.publish_status', true)
            ->join('users', 'users.id', '=', 'blogs.author_id')
            ->select('blogs.*', 'users.full_name', 'users.id')
            ->first();
        $posts = Blog::orderBy('blogs.created_at', 'DESC')->where('is_beauty_gram', false)->where('blogs.publish_status', true)->limit(5)->get();


        return view('common.pages.blog.details')
            ->with('comment_count', count($comments))
            ->with('comments', $comments)
            ->with('categories', $categories)
            ->with('blog', $blog)
            ->with('blog_post_id', $id)
            ->with('posts', $posts);
    }

    public function hawor($id, $name)
    {


        $comments = BlogComment::where('blog_comments.blog_post_id', $id)
            ->join('users', 'users.id', '=', 'blog_comments.author_id')
            ->select('blog_comments.*', 'users.full_name', 'users.id')
            ->where('is_spam', false)

            ->orderBy('created_at', 'DESC')
            ->get();


        $categories = BlogCategory::orderBy('created_at', 'DESC')->where('home_nav_id', 2)->limit(6)->get();
        $blog = Blog::where('blog_id', $id)
            ->join('users', 'users.id', '=', 'blogs.author_id')
            ->select('blogs.*', 'users.full_name', 'users.id')
            ->first();
        $posts = Blog::orderBy('blogs.created_at', 'DESC')->where('is_beauty_gram', false)->where('blogs.publish_status', true)->limit(5)->get();


        return view('common.pages.blog.hawor_details')
            ->with('comment_count', count($comments))
            ->with('comments', $comments)
            ->with('categories', $categories)
            ->with('blog', $blog)
            ->with('blog_post_id', $id)
            ->with('posts', $posts);
    }

    public function adventureTrip()
    {
        $blogs = Blog::orderBy('blogs.created_at', 'DESC')
            ->join('blog_categories', 'blog_categories.blog_category_id', '=', 'blogs.category_id')
            ->where('blogs.publish_status', true)
            ->get();
        return view('common.pages.adventure.adventure')
            ->with('blogs', $blogs);

    }

    public function categorizeBlogs($id, $title)
    {

        $view_changer = BlogCategory::where('blog_category_id', $id)->first()->home_nav_id;


        if ($view_changer == 1) {

            $blog = Blog::orderBy('blogs.created_at', 'DESC')
                ->whereJsonContains('blogs.category_id', $id)
                /*  ->whereRaw("JSON_CONTAINS(blogs.category_id, '[$id]' )")*/

                /*  ->where('blogs.category_id','LIKE','%6%')*/
                ->leftJoin('users', 'users.id', '=', 'blogs.author_id')
                ->where('blogs.publish_status', true)
                ->select('blogs.*', 'users.full_name', 'users.id')
                ->get();

            //Modal View
            return view('common.pages.destination.index')->with('blogs', $blog)
                ->with('category_id', getCategoryNameFromId($id))
                ->with('categories', BlogCategory::where('home_nav_id', 1)->get())
                ->with('blog_details', BlogCategory::where('blog_category_id', $id)->first());

        } else {

            $blog = Blog::orderBy('blogs.created_at', 'DESC')
                ->whereJsonContains('blogs.category_id', $id)
                /*  ->whereRaw("JSON_CONTAINS(blogs.category_id, '[$id]' )")*/

                /*  ->where('blogs.category_id','LIKE','%6%')*/
                ->leftJoin('users', 'users.id', '=', 'blogs.author_id')
                ->where('blogs.publish_status', true)
                ->select('blogs.*', 'users.full_name', 'users.id')
                ->get();
            /*
              $blog = Blog::orderBy('blogs.created_at', 'DESC')
                  ->whereRaw("JSON_CONTAINS(blogs.category_id, '[$id]' )")
                  ->leftJoin('users', 'users.id', '=', 'blogs.author_id')
                  ->select('blogs.*', 'users.full_name', 'users.id')
                  ->get();*/


            return view('common.pages.blog.category_blog_result')->with('blogs', $blog)
                ->with('category_id', getCategoryNameFromId($id))
                ->with('advertise', Advertise::limit(3)->get())//TODO::category Serach
                ->with('blog_details', BlogCategory::where('blog_category_id', $id)->first());
        }

    }

    public function authorsBlog($id)
    {
        $blog = Blog::orderBy('blogs.created_at', 'DESC')
            ->join('blog_categories', 'blog_category_id', '=', 'blogs.category_id')
            ->join('users', 'users.id', '=', 'blogs.author_id')
            ->where('blogs.category_id', $id)
            ->where('blogs.publish_status', true)
            ->select('blogs.*', 'users.full_name', 'users.id')
            ->get();
        return view('common.pages.blog.category_blog_result')
            ->with('blogs', $blog)
            ->with('category_id', User::where('id', $id)->first()->full_name . "'s ");
    }

    public function search(Request $request)
    {

        $query = $request['search'];
        $blogs = Blog::where('blog_title', 'like', "%$query%")
            ->where('is_beauty_gram', false)
            ->orderBy('blogs.created_at', 'DESC')
            ->where('blogs.publish_status', true)
            ->get();

        return view('common.pages.blog.blog_search')
            ->with('query', $query)
            ->with('blogs', $blogs);
    }

    public function beautySearch(Request $request)
    {

        $query = $request['search'];
        $blogs = Blog::where('blog_title', 'like', "%$query%")
            ->where('is_beauty_gram', true)
            ->orderBy('blogs.created_at', 'DESC')
            ->where('blogs.publish_status', true)
            ->get();

        return view('common.pages.beauty_gram.beauty_search')
            ->with('query', $query)
            ->with('blogs', $blogs);
    }


    public function videoDetails($id, $name)
    {
        $video = Video::where('video_id', $id)
            ->join('users', 'users.id', '=', 'videos.author_id')
            ->select('videos.*', 'users.full_name', 'users.id')
            ->first();
        $recent = Video::orderBy('created_at', 'DESC')->limit(4)->get();
        return view('common.pages.video.video_details')
            ->with('video', $video)
            ->with('recents', $recent);
    }

    public function allvideo()
    {
        $videos = Video::where('is_beauty_gram', false)->get();
        return view('common.pages.video.index')
            ->with('videos', $videos);

    }

    public function allTripAlbum()
    {
        $videos = Video::where('is_beauty_gram', false)->get();
        $trips = TripAlbaum::where('is_beauty_gram', false)->orderBy('created_at', 'DESC')->get();
        return view('common.pages.trip_album.index')
            ->with('videos', $videos)
            ->with('trips', $trips);

    }

    public function singleTrip($id, $name)
    {
        $trip = TripAlbaum::where('trip_album_id', $id)->first();
        $trips = TripAlbaum::limit(5)->get();
        return view('common.pages.trip_album.details')
            ->with('trip', $trip)
            ->with('trips', $trips);

    }

    public function forums()
    {

        return view('common.pages.forum.index');
    }

    public function game()
    {

        return view('common.pages.game.index');

        if (\Session::has('locale')) {

            if (\Session::get('locale') == "en") {

                //print English name
            } else {

                //print Bangla name
            }
        } else {

            //print English name
        }


    }

    public function shop()
    {
        $products = Product::get();

        return view('common.pages.product.category')
            ->with('products', $products)
            ->with('categories', ProductCategory::get());

    }

    public function productDetails($id)
    {
        $products = Product::where('product_id',$id)->first();

        return view('common.pages.product.details')
            ->with('products', $products);

    }

    public function categoriesProduct($id)
    {
        $products = Product::join('product_categories', 'product_categories.product_category_id', '=', 'products.product_category_id')
            ->where('products.product_category_id', $id)->get();

        $category=ProductCategory::where('product_category_id',$id)->first();
        return view('common.pages.product.index')
            ->with('products', $products)

            ->with('category', $category)
            ->with('categories', ProductCategory::get());
    }

    public function beautyGram()
    {
        $trips = TripAlbaum::where('is_beauty_gram', true)->get();
        $videos = Video::where('is_beauty_gram', true)->get();
        $event = DB::table('events')->limit(4)->orderByDesc('created_at')->get();
        return view('common.pages.beauty_gram.index')
            ->with('trips', $trips)
            ->with('videos', $videos)
            ->with('event', $event);
    }
    public function season1()
    {
        $trips = TripAlbaum::where('is_beauty_gram', true)
            ->where('season_type', 1)
            ->limit(4)->orderByDesc('created_at')->get();
        $videos = Video::where('is_beauty_gram', true)->get();
        $event = DB::table('events')->limit(4)->orderByDesc('created_at')->get();
        return view('common.pages.beauty_gram.season_1')
            ->with('trips', $trips)
            ->with('videos', $videos)
            ->with('event', $event);
    }
    public function season2()
    {
        $trips = TripAlbaum::where('is_beauty_gram', true) ->where('season_type', 2)->limit(6)->orderByDesc('created_at')->get();
        $videos = Video::where('is_beauty_gram', true)->limit(6)->orderByDesc('created_at')->get();
        $blogs = Blog::where('is_beauty_gram', true)->where('blogs.publish_status', true)->limit(6)->orderByDesc('created_at')->get();
        $event = Event::orderByDesc('created_at')->limit(6)->get();
        return view('common.pages.beauty_gram.season_2')
            ->with('trips', $trips)
            ->with('blogs', $blogs)
            ->with('videos', $videos)
            ->with('event', $event);
    }

    public function beautyGramimage()
    {
        $trips = TripAlbaum::where('is_beauty_gram', true)->paginate(9);
        return view('common.pages.beauty_gram.image')
            ->with('trips', $trips);
    }
    public function beautyGramimageSeason1()
    {
        $trips = TripAlbaum::where('is_beauty_gram', true)
            ->where('season_type', 1)
            ->paginate(9);
        return view('common.pages.beauty_gram.season_1_image')
            ->with('trips', $trips);
    }

    public function beautyGramSingleImage($id, $title)
    {
        $trip = TripAlbaum::where('trip_album_id', $id)->first();
        $trips = TripAlbaum::where('is_beauty_gram', true)->limit(5)->get();
        return view('common.pages.beauty_gram.image_details')
            ->with('trip', $trip)
            ->with('trips', $trips);
    }

    public function beautyGramvideo()
    {
        $videos = Video::where('is_beauty_gram', true)->get();
        return view('common.pages.beauty_gram.video')
            ->with('videos', $videos);
    }

    public function beautyGramblogs()
    {
        //    return $blogs = Blog::where('is_beauty_gram', true)->get();
        $blogs = Blog::where('is_beauty_gram', true)->where('blogs.publish_status', true)->paginate(9);
        return view('common.pages.beauty_gram.blogs')
            ->with('blogs', $blogs);
    }

    public function beautiGramBlog($id, $name)
    {

        $comments = BlogComment::where('blog_comments.blog_post_id', $id)
            ->join('users', 'users.id', '=', 'blog_comments.author_id')
            ->select('blog_comments.*', 'users.full_name', 'users.id')
            ->where('is_spam', false)
            ->orderBy('created_at', 'DESC')
            ->get();


        $categories = BlogCategory::orderBy('created_at', 'DESC')->limit(6)->get();
        $blog = Blog::where('blog_id', $id)
            ->join('users', 'users.id', '=', 'blogs.author_id')
            ->select('blogs.*', 'users.full_name', 'users.id')
            ->first();
        $posts = Blog::orderBy('blogs.created_at', 'DESC')
            ->where('is_beauty_gram', true)
            ->where('blogs.publish_status', true)
            ->limit(5)->get();


        return view('common.pages.beauty_gram.blog_details')
            ->with('comment_count', count($comments))
            ->with('comments', $comments)
            ->with('categories', $categories)
            ->with('blog', $blog)
            ->with('blog_post_id', $id)
            ->with('posts', $posts);
    }

    public function beautyGramvideodetails($id, $name)
    {
        $video = Video::where('video_id', $id)
            ->join('users', 'users.id', '=', 'videos.author_id')
            ->select('videos.*', 'users.full_name', 'users.id')
            ->first();
        $recent = Video::where('is_beauty_gram', true)->orderBy('created_at', 'DESC')->limit(4)->get();
        return view('common.pages.beauty_gram.video_details')
            ->with('video', $video)
            ->with('recents', $recent);

    }

    public function moonCalendar()
    {

        return view('common.pages.moon_calendar.index');

    }

    public function travelCompany()
    {
        $companies= Company::OrderBy('created_at', "DESC")->get();

        return view('common.pages.travel_company.index')
            ->with('companies',$companies);

    }
    public function company($id)
    {
        $companies= Company::where('companies.company_id', $id)->first();
        $results = Package::join('companies', 'companies.company_id', '=','packages.company_id')
            ->where('packages.company_id', $id)
            ->get();


        return view('common.pages.package.index')
            ->with('companies',$companies)
            ->with('results',$results);

    }
    public function package($id)
    {
        $result = Package::join('companies', 'companies.company_id', '=','packages.company_id')
            ->where('packages.package_id', $id)
            ->first();


        return view('common.pages.package.details')
            ->with('result',$result);

    }


}
