<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

Route::get('/user/registration', 'LoginController2@registration');
Route::post('/user/registration/save', 'LoginController2@registrationSave');
Route::get('/user/confirm/{id}', 'LoginController2@confirmMail');

Route::get('/user/forget-pass', 'LoginController2@forgetPass');
Route::post('/user/forget-pass/reset', 'LoginController2@forgetPassReset');
Route::any('/user/confirm/reset/{id}', 'LoginController2@resetPassword');

//Common Page for All
Route::get('/', 'Controller@home');


Route::get('/home', 'LoginController2@index');
Route::get('/admin/login', 'LoginController2@login');
Route::post('/login-check', 'LoginController2@doLogin');
Route::get('/logout', 'LoginController2@doLogout');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/dashboard', 'HomeController@adminHome');
    Route::get('/profile', 'SettingController@profile');
    Route::get('/profile/edit', 'SettingController@editProfile');
    Route::post('/profile/update', 'SettingController@updateProfile');

    //Manage Place

    Route::get('/place/create', 'PlaceController@create');
    Route::post('/place/store', 'PlaceController@store');
    Route::get('/places', 'PlaceController@show');
    Route::get('/place/edit/{id}', 'PlaceController@edit');
    Route::post('/place/update', 'PlaceController@update');
    Route::get('/place/delete/{id}', 'PlaceController@destroy');

    //Manage Trip Album
    Route::get('/tripalbum/create', 'TripAlbaumController@index');
    Route::post('/tripalbum/store', 'TripAlbaumController@store');
    Route::get('/tripalbum/show', 'TripAlbaumController@show');
    Route::get('/tripalbum/edit/{id}', 'TripAlbaumController@edit');
    Route::post('/tripalbum/update', 'TripAlbaumController@update');
    Route::get('/tripalbum/delete/{id}', 'TripAlbaumController@destroy');
    //Manage video
    Route::get('/video/create', 'VideoController@index');
    Route::post('/video/store', 'VideoController@store');
    Route::get('/video/show', 'VideoController@show');
    Route::get('/video/edit/{id}', 'VideoController@edit');
    Route::post('/video/update', 'VideoController@update');
    Route::get('/video/delete/{id}', 'VideoController@destroy');


    //Manage product
    Route::get('/product/create', 'ProductController@index');
    Route::post('/product/store', 'ProductController@store');
    Route::get('/product/show', 'ProductController@show');
    Route::get('/product/edit/{id}', 'ProductController@edit');
    Route::post('/product/update', 'ProductController@update');
    Route::get('/product/delete/{id}', 'ProductController@destroy');

    // Manage Event
    Route::get('/event/create', 'EventController@index');
    Route::post('/event/store', 'EventController@store');
    Route::get('/event/show', 'EventController@show');
    Route::get('/event/edit/{id}', 'EventController@edit');
    Route::post('/event/update', 'EventController@update');
    Route::get('/event/delete/{id}', 'EventController@destroy');
    Route::get('/event/details/{id}', 'EventController@details');


    //Manage Event Post
    Route::get('/event-post/create', 'EventPostController@index');
    Route::post('/event-post/store', 'EventPostController@store');
    Route::get('/event-post/show', 'EventPostController@show');
    Route::get('/event-post/edit/{id}', 'EventPostController@edit');
    Route::post('/event-post/update', 'EventPostController@update');
    Route::get('/event-post/delete/{id}', 'EventPostController@destroy');


    //Manage Tourist Spot
    Route::get('/tourist-spot/index', 'TouristSpotController@index');
    Route::post('/tourist-spot/store', 'TouristSpotController@store');
    Route::get('/tourist-spot/show', 'TouristSpotController@show');
    Route::get('/tourist-spot/edit/{id}', 'TouristSpotController@edit');
    Route::post('/tourist-spot/update', 'TouristSpotController@update');
    Route::get('/tourist-spot/delete/{id}', 'TouristSpotController@destroy');
    //Manage Tourist Spot Category
    Route::get('/tourist-spot-category/index', 'TouristSpotCategoryController@index');
    Route::post('/tourist-spot-category/store', 'TouristSpotCategoryController@store');
    Route::get('/tourist-spot-category/show', 'TouristSpotCategoryController@show');
    Route::get('/tourist-spot-category/edit/{id}', 'TouristSpotCategoryController@edit');
    Route::post('/tourist-spot-category/update', 'TouristSpotCategoryController@update');
    Route::get('/tourist-spot-category/delete/{id}', 'TouristSpotCategoryController@destroy');


    //Manage product Category
    Route::get('/product/category/create', 'ProductCategoryController@index');
    Route::post('/product/category/store', 'ProductCategoryController@store');
    Route::get('/product/category/show', 'ProductCategoryController@show');
    Route::get('/product/category/edit/{id}', 'ProductCategoryController@edit');
    Route::post('/product/category/update', 'ProductCategoryController@update');
    Route::get('/product/category/delete/{id}', 'ProductCategoryController@destroy');

    //Manage Advertise image
    Route::get('/advertise/create', 'AdvertiseController@index');
    Route::post('/advertise/store', 'AdvertiseController@store');
    Route::get('/advertise/view', 'AdvertiseController@show');
    Route::get('/advertise/edit/{id}', 'AdvertiseController@edit');
    Route::post('/advertise/update', 'AdvertiseController@update');
    Route::get('/advertise/delete/{id}', 'AdvertiseController@destroy');

    //Manage Category
    Route::get('/blog_category/show', 'BlogCategoryController@show');
    Route::get('/blog_category/create', 'BlogCategoryController@createCategory');
    Route::post('/blog_category/store', 'BlogCategoryController@storeCategory');

    Route::get('/blog_category/edit/{id}', 'BlogCategoryController@editCategory');
    Route::post('/blog_category/update/{id}', 'BlogCategoryController@updateCategory');
    Route::get('/blog_category/delete/{id}', 'BlogCategoryController@deleteCategory');

    //Manage slider
    Route::get('/slider/create', 'SliderController@create');
    Route::post('/slider/store', 'SliderController@store');
    Route::get('/slider/show', 'SliderController@show');
    Route::get('/slider/edit/{id}', 'SliderController@edit');
    Route::post('/slider/update', 'SliderController@update');

    //Manage Catagories

    Route::get('/manage-category', 'BlogCategoryController@show');

    //Manage Packeg
    Route::get('/package/create', 'PackageController@create');
    Route::post('/package/store', 'PackageController@store');
    Route::get('/package/show', 'PackageController@show');
    Route::get('/package/edit/{id}', 'PackageController@edit');
    Route::post('/package/update', 'PackageController@update');
    Route::get('/package/delete/{id}', 'PackageController@destroy');

    //Manage company
    Route::get('/company/create', 'CompanyController@create');
    Route::post('/company/store', 'CompanyController@store');
    Route::get('/company/show', 'CompanyController@show');
    Route::get('/company/edit/{id}', 'CompanyController@edit');
    Route::get('/company/delete/{id}', 'CompanyController@delete');
    Route::post('/company/update', 'CompanyController@update');

});


Route::group(['middleware' => 'admin'], function () {

//Manage Forum
    Route::get('/forum/post', 'ForumTopicController@show');
    Route::get('/forums', 'ForumTopicController@getForumList');
    Route::get('/forums/inactive/{id}', 'ForumTopicController@forumInactive');
    Route::get('/forums/active/{id}', 'ForumTopicController@forumActive');
    //Manage Comments
    Route::get('/comments/show', 'ForumCommentController@show');
    Route::get('/comments/notspam/{id}', 'ForumCommentController@commentnotspam');
    Route::get('/comments/spam/{id}', 'ForumCommentController@commentspam');
    //Manage Blog post
    Route::any('/blog/post', 'BlogController@show');
    Route::get('/blog/unpublished/{id}', 'BlogController@blogunpublished');
    Route::get('/blog/published/{id}', 'BlogController@blogpublished');

    //Manage Blog Comments
    Route::get('/blogcomments/show', 'BlogCommentController@show');
    Route::get('/blogcomments/notspam/{id}', 'BlogCommentController@commentnotspam');
    Route::get('/blogcomments/spam/{id}', 'BlogCommentController@commentspam');
    //Manage post
    Route::get('/post/create', 'BlogController@index');
    Route::post('/post/store', 'BlogController@store');
    Route::get('/post/show', 'BlogController@postshow');
    Route::get('/post/edit/{id}', 'BlogController@edit');
    Route::post('/post/update', 'BlogController@update');
    Route::get('/post/delete/{id}', 'BlogController@destroy');

    //admin and use manage
    Route::get('/admin/user/create', 'AdminController@AdminUserCreate');
    Route::get('/admin/show', 'AdminController@AdminShow');
    Route::get('/admin/users/show', 'AdminController@UserShow');
    Route::post('/admin/user/store', 'AdminController@AdminUserstore');
    Route::any('/admin/user/status-update/{id}/{status}', 'AdminController@AdminUserUpdate');

});


Route::get('/forum', 'ForumTopicController@show');
Route::get('/forums', 'ForumTopicController@getForumList');
Route::any('/forum-details/{id}/{name}', 'ForumTopicController@details');
Route::any('/forum/create', 'ForumTopicController@create');
Route::any('/forum/upvote', 'ForumTopicController@upvote');
Route::group(['middleware' => 'user'], function () {

    Route::any('/forum/store', 'ForumTopicController@store');

    Route::any('/forum/comment/{id}', 'ForumTopicController@commentDetails');
    Route::any('/forum/comments/store', 'ForumTopicController@commentStore');
    Route::any('/forum/comments/delete', 'ForumTopicController@commentDelete');


    Route::get('/user/profile', 'UserController@profile');
    Route::post('/user/profile/update', 'UserController@profileupdate');

    //Blog Comment
    Route::get('/user/blog', 'UserController@newBlog');
    Route::post('/user/blog/store', 'UserController@blogStore');
    Route::get('/user/blog/edit/{id}', 'UserController@blogedit');
    Route::post('/user/blog/update/{id}', 'UserController@blogupdate');
    Route::get('/user/blog/delete/{id}', 'UserController@destroy');
    Route::post('/blog/comment/store', 'UserController@commentStore');
    //Forum manage for user profile
    Route::get('/user/forum/create', 'UserController@forum');
    Route::post('/user/forum/store', 'UserController@forumStore');
    Route::get('/user/forum/edit/{id}', 'UserController@forumedit');
    Route::post('/user/forum/update', 'UserController@forumupdate');
    Route::get('/user/forum/delete/{id}', 'UserController@destroyforum');

});


/*Page For All Started*/
Route::get('/explore-bangladesh', 'Controller@exploreBangladesh');
Route::get('/explore-bangladesh-map', 'Controller@exploreBangladeshMap');
Route::get('/explore-bangladesh-svg', 'Controller@exploreBangladeshSvg');
Route::get('/explore-bangladesh/{spot_id}/{spot_name}', 'Controller@exploreBangladeshSpotDetails');


Route::get('/moon-calendar', 'Controller@moonCalendar');
Route::get('/beauty-gram', 'Controller@beautyGram');
Route::get('/beautigram/season-1', 'Controller@season1');
Route::get('/beautigram/season-2', 'Controller@season2');
Route::get('/beauty-gram/image', 'Controller@beautyGramimage');
Route::get('/beauty-gram/image/season1', 'Controller@beautyGramimageSeason1');

Route::get('/beauti-gram-album/{id}/{name}', 'Controller@beautyGramSingleImage');
Route::get('/beauti-gram-videos', 'Controller@beautigramVideos');


Route::get('/beauty-gram/video', 'Controller@beautyGramvideo');
Route::get('/beauty-gram/blogs', 'Controller@beautyGramblogs');
Route::get('/beauty-gram/blog/{id}/{name}', 'Controller@beautiGramBlog');
Route::get('/beauty-gram/video-details/{id}/{name}', 'Controller@beautyGramvideodetails');


Route::get('/blogs', 'Controller@blogs');
Route::get('/blog/{id}/{name}', 'Controller@blog');
Route::get('/adventure-trips', 'Controller@adventureTrip');


Route::get('/video/details/{id}', 'Controller@videoDetails');

Route::get('/blogs/{id}/{title}', 'Controller@categorizeBlogs');
Route::get('/blogs/hawor/{id}/{title}', 'Controller@hawor');
Route::get('/blogs/author/{id}', 'Controller@authorsBlog');

Route::get('/video/details/{id}/{name}', 'Controller@videoDetails');
Route::get('/video/all', 'Controller@allvideo');
Route::get('/trip-album', 'Controller@allTripAlbum');
Route::get('/trip-album/{id}/{name}', 'Controller@singleTrip');

//shopphp
Route::get('/products', 'Controller@shop');
Route::get('/product/category/{id}', 'Controller@categoriesProduct');

Route::get('/about', 'Controller@about');
Route::get('/contact', 'Controller@contact');
Route::get('/travel-company', 'Controller@travelCompany');
Route::get('/travel-company/{id}', 'Controller@company');
Route::get('/travel-company/package/{id}', 'Controller@package');


//Categorize Blog Post

//Manage Game
Route::get('/game', 'Controller@game');
Route::get('/game/image-compare', 'GameController@imageCompare');
Route::any('/game/image-select', 'GameController@selectImageGame');
Route::any('/game/image-select/leaderdboard/{id}', 'GameController@leaderboard');
Route::any('/game/image-select/result', 'GameController@selectImageResult');
Route::any('/game/image-select/result/save', 'GameController@selectImageResultSave');
Route::any('/admin/result/game-1', 'GameController@gameResult1');
Route::any('/admin/result/game-2', 'GameController@gameResult2');

//Manage Game
Route::get('/game', 'Controller@game');
Route::get('/game/spot-the-difference', 'GameController@spotGame');
Route::get('/game/spot-the-difference/leaderdboard/{id}', 'GameController@leader');
Route::get('/game-1/instruction', 'GameController@selectGameInstruction');
Route::get('/game-2/instruction', 'GameController@spotGameInstruction');
Route::get('/game/stp/result', 'GameController@spotGameResult');
Route::any('/game/image-select', 'GameController@selectImageGame');
Route::any('/game-score/two/{score}/{time}', 'GameController@selectScoreSave');


Route::get('/login', 'UserController@login');
Route::get('/user/login', 'UserController@login');
Route::post('/user/login-check', 'UserController@loginCheck');
Route::get('/user/registration', 'UserController@registration');
Route::post('/user/do-registration', 'UserController@doRegistration');
Route::get('/user/activate-account/{id}', 'UserController@doActive');


Route::get('/search', 'Controller@search');
Route::get('/beauty-search', 'Controller@beautySearch');
Route::get('/web-search', 'Controller@search');


//Tour Suggestion
Route::get('/tour-manager', 'UserController@tourManager');
Route::get('/tour-manager2', 'UserController@tourManager2');
Route::any('/api/tour-manager', 'ApiController@tourManager');


/*Page For All Started*/


/*Localization start*/
Route::get('locale/{locale}', function ($locale) {

    Session::put('locale', $locale);
    return $locale;
});

/*Localization end*/


//Manage Users

Route::get('/user/list', 'UserController@show');


Route::get('/test', function () {
    return view('temporary.test');
});

/////test/////
Route::post('/upload/image', 'UserController@uploadImage')->name('uploadImage');
////////forum create////////
Route::get('/user/forums', 'UserController@userForums');
Route::post('/user/forums/search', 'UserController@search');
/*Route::get('/user/forum', 'UserController@newForum');
Route::post('/user/forum/store', 'UserController@forumStore');*/


/////socialite login google//
Route::get('/user/login/google', 'LoginController2@redirectToProvider');
Route::get('login/google/callback', 'LoginController2@handleProviderCallback');
/////socialite login facebook//
Route::get('/user/login/facebook', 'LoginController2@redirectToProviderFacebook');
Route::get('login/facebook/callback', 'LoginController2@handleProviderCallbackFacebook');


//Public API
Route::any('/get-spot', 'ApiController@gettingSpots');

Route::get('/reset', function () {
    Artisan::call('migrate:fresh'); // = php artisan migrate:fresh
    Artisan::call('db:seed'); // = php artisan db:seed

// OR
    Artisan::call('migrate:fresh', ['--seed' => true]);
});


//data Migrate
Route::get('/user-migrate', 'DataMigrateController@userMigrate');
Route::get('/data-migrate', 'DataMigrateController@dataMigrate');


Route::get('/beauti-gram-user-migrate', 'DataMigrateController@bUserDataMigrate');
//Route::get('/beauti-gram-post-migrate', 'DataMigrateController@bPostDataMigrate');


Route::get('/product/{id}', 'Controller@productDetails');


Route::get('/modal', 'DataMigrateController@modal');
Route::get('/test', 'Controller@test');


