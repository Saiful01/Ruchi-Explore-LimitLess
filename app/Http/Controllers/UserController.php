<?php

namespace App\Http\Controllers;

use App\Accomodation;
use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\ForumComment;
use App\ForumLike;
use App\ForumTopic;
use App\LoginHistory;
use App\Place;
use App\Score;
use App\Transport;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function login()
    {
        /* if (Auth::check()) {
             return \redirect('/user/profile');
         }*/
        return view('common.pages.auth.login');
    }

    public function registration()
    {

        return view('common.pages.auth.registration');
    }

    public function doRegistration(Request $request)
    {

        unset($request['_token']);
        $request['user_login'] = $request['phone'];
        $request['password'] = Hash::make($request['password']);

        try {
            $email = $request['email'];

            //return $request->all();
            //TODO::send email with confirmation url to user
            $id = User::insertGetId($request->all());
            $url = URL::to('/user/activate-account/' . $this->encryptId($id));
            $to_email = $request['email'];

            $data = array(
                'name' => $request->full_name,
                'body' => "Congtas! You are succesfully Registerd to Ruch Explore Limitless Banladesh
                  To Active your Account please Click the Link below
                   . $url"
            );

            Mail::send('mail', $data, function ($message) use ($to_email) {

                $message->from('ruchiexplore@gmail.com', 'Ruchi Explore Limitless');
                $message->to($to_email);
                $message->subject('Registration mail');

            });
            $admin = array(
                'body' => "Username: '$request->full_name' UserEmail: '$request->email'  has requested ."
            );

            Mail::send('mail', $admin, function ($message) use ($to_email) {

                $message->from('ruchiexplore@gmail.com', 'Ruchi Explore Limitless');
                $message->to('ruchiexplore@gmail.com');
                $message->subject('New user registr on Your site');

            });

            $msg = "To activate your account. click on this link " . $url;
            //TODO::send email to user
            //mail($email, "Mail From Explore Limiless ", $msg);
            return back()->with('success', "Successfully Registered. Check your email to confirm.");


            return back()->with('success', "Successfully Registered. Check your email to confirm");
            $user = User::where('id', $id)->first();
            Auth::login($user, true);

            return Redirect::to('/user/login');
        } catch (\Exception $exception) {

            if ($exception->getCode() == 23000) {
                $message = "Email or Phone number is used";
            } else {
                $message = "There is a problem. Try Again";
                $message = $exception->getMessage();
            }
            return back()->with('failed', $message);
        }

    }

    public function doActive($id)
    {
        try {
            $id = $this->decryptId($id);

            User::where('id', $id)->update([
                'is_active' => true
            ]);
            return Redirect::to('/login')->with('success', "Successfully Active Your Account");
        } catch (\Exception $exception) {

            return back()->with('success', $exception->getMessage());
        }
    }

    public function loginCheck(Request $request)
    {

        $email = $request['email'];
        $password = $request['password'];
        $remember = true;

        // attempt to do the login
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {


            try {
                LoginHistory::create([
                    'ip_address' => request()->ip(),
                    'user_id' => Auth::id()
                ]);
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
            return Redirect::to('/user/profile');
        } else {
            return back()->with('failed', "Username or password does not match");
        }

        try {
            User::create($request->all());
            return back()->with('success', "User successfully Logged in");
        } catch (\Exception $exception) {

            return $exception->getMessage();
            return back()->with('failed', "There is a problem. Try Again");
        }

    }

    public function commentStore(Request $request)
    {

        $request['author_id'] = Auth::user()->id;
        unset($request['_token']);
        try {
            BlogComment::create($request->all());
            return back()->with('success', "Successfully Comment Saved");
        } catch (\Exception $exception) {

            return $exception->getMessage();
            return back()->with('failed', "There is a problem. Try Again");
        }
    }

    public function profile()
    {
        $blogs = Blog::where('author_id', Auth::user()->id)->paginate(5);
        $user = User::where('id', Auth::user()->id)->first();
        $forums = ForumTopic::where('user_id', Auth::user()->id)->paginate(5);
        $game1 = Score::orderBy('scores.score', 'DESC')
            ->where('scores.game_id', 1)
            ->limit(10)->get();
        $user_game1 = Score::orderBy('scores.score', 'DESC')
            ->join('users', 'users.id', '=', 'scores.gamer_id')
            ->where('scores.game_id', 1)
            ->where('scores.gamer_id', Auth::user()->id)
            ->limit(10)
            ->get();
        $game2 = Score::orderBy('scores.score', 'DESC')
            ->where('scores.game_id', 2)
            ->limit(10)->get();
        $user_game2 = Score::orderBy('scores.score', 'DESC')
            ->join('users', 'users.id', '=', 'scores.gamer_id')
            ->where('scores.game_id', 2)
            ->where('scores.gamer_id', Auth::user()->id)
            ->limit(10)
            ->get();
        return view('common.pages.profile.index')
            ->with('user', $user)
            ->with('blogs', $blogs)
            ->with('game1', $game1)
            ->with('game2', $game2)
            ->with('user_game1', $user_game1)
            ->with('user_game2', $user_game2)
            ->with('forums', $forums);
    }

    public function profileupdate(Request $request)
    {


        if ($request->hasFile('profile_pic')) {

            $image = $request->file('profile_pic');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user');
            $image->move($destinationPath, $image_name);
            $array = [

                'full_name' => $request['full_name'],
                'phone' => $request['phone'],
                'profile_pic' => $image_name,
                'email' => $request['email'],
            ];

        } else {
            $array = [
                'full_name' => $request['full_name'],
                'phone' => $request['phone'],
                'email' => $request['email'],
            ];
        }
        if ($request['password'] != null) {
            $array['password'] = Hash::make($request['password']);
        }

        // return $array;

        try {
            User::where('id', $request['id'])->update($array);
            return back()->with('success', "Successfully Updated");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }

    }


    public function newBlog()
    {
        return view('common.pages.profile.new_blog')->with('categories', BlogCategory::where('home_nav_id', 2)->get());

    }


    public function blogStore(Request $request)
    {
        libxml_use_internal_errors(true);

        //return $request->all();

        $blog_details = $this->getSummernoteValue($request['blog_details']);

        $request['blog_details'] = $blog_details;
        $request->validate([
            'category_id' => 'required',
            'image' => 'required',


        ]);
        $request['author_id'] = Auth::user()->id;
        unset($request['_token']);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/blog');
            $image->move($directory, $image_name);


        } else {
            $image_name = null;
        }
        $request['featured_image'] = $image_name;
        $request['publish_status'] = false;
        $request['category_id'] = json_encode($request['category_id']);

        $data = $request->except(['image', 'files', '_token']);


        try {
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $id = Blog::insertGetId($data);


            $blog_url = URL::to('/') . "/blog/" . $id . "/" . getTitleToUrl($request['blog_title']);
            //TODO mail for admin
            $author = Auth::user()->full_name;
            $msg = array(
                /*'name' => Session::user()->full_name,*/
                'body' => " New Post '$request->blog_title' has been created.
     Here is the details
     Post Title:'$request->blog_title'
     Author:'$author'
     Post url:'$blog_url
      "
            );
            Mail::send('admin_mail', $msg, function ($message) {
                $message->from(getAdminEmail(), 'Ruchi Explore Limitless');
                $message->to(getAdminEmail());
                $message->subject(' A post has been created');

            });


            return back()->with('success', "Successfully Post Saved");
        } catch (\Exception $exception) {

            //return $exception->getMessage();
            return back()->with('failed', $exception->getMessage());
        }

    }

    public function blogedit($id)
    {
        $blogs = Blog::where('author_id', Auth::user()->id)
            ->where('blog_id', $id)
            ->first();

        return view('common.pages.profile.edit_blog')
            ->with('categories', BlogCategory::get())
            ->with('blog', $blogs);


    }

    private function getSummernoteValue($input_value)
    {

        $detail = $input_value;

        $dom = new \domdocument();
        //$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $dom->loadHTML(mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'));

        $images = $dom->getelementsbytagname('img');

        try {
            foreach ($images as $k => $img) {
                $data = $img->getattribute('src');

                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                $data = base64_decode($data);
                $image_name = time() . $k . '.png';
                $path = public_path() . '/images/blog/post/' . $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', '/images/blog/post/' . $image_name);
            }
        } catch (\Exception $e) {

        }

        $detail = $dom->savehtml();
        return $detail;
    }


    public function blogupdate(Request $request, $id)
    {
        $blog_details = $this->getSummernoteValue($request['blog_details']);

        $request['blog_details'] = $blog_details;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/blog');
            $image->move($directory, $image_name);
            $request['featured_image'] = $image_name;

        }


        unset($request['_token']);
        $request['category_id'] = json_encode($request['category_id']);


        try {
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            Blog::where('blog_id', $id)->update($request->except('image', 'files'));
            $blog_url = URL::to('/') . "/blog/" . $id . "/" . getTitleToUrl($request['blog_title']);

            //TODO mail for admin
            $author = Auth::user()->full_name;
            $msg = array(
                /*'name' => Session::user()->full_name,*/
                'body' => " This Post '$request->blog_title' has been updated.
     Here is the details
     Post Title:'$request->blog_title'
     Author:'$author'
     Post url:'$blog_url
      "
            );
            Mail::send('admin_mail', $msg, function ($message) {
                $message->from('ruchiexplore@gmail.com', 'Ruchi Explore Limitless');
                $message->to(getAdminEmail());
                $message->subject(' A post has been updated');

            });
            return back()->with('success', "Successfully Post Updated");
        } catch (\Exception $exception) {


            return back()->with('failed', $exception->getMessage());
        }

    }

    public function destroy($id)
    {
        try {
            Blog::where('blog_id', $id)->delete();
            return back()->with('success', "Successfully Post Deleted");

        } catch (\Exception $exception) {


            return back()->with('failed', $exception->getMessage());
        }


    }

    public function tourManager(Request $request)
    {

        /*
           $is_route_available = true;
           $transport_type = $request['transport_type'];
           $vehicle_type = $request['vehicle_type'];
           $hotel_type = $request['hotel_type'];
           $person = $request['person'];
           $day = $request['day'];
           $from_id = $request['from_id'];
           $transport_cost = null;

           if ($transport_type == 3) {
               $transport_data = Transport::where('from_id', $from_id)
                   ->where('transport_type', $transport_type)
                   ->where('from_id', $from_id)
                   ->first();
               if (is_null($transport_data)) {
                   $is_route_available = false;
               } else {
                   if ($transport_data->regular_price < 100) {
                       $is_route_available = false;
                   }
               }


           }


           $transport_data = Transport::where('from_id', $from_id)
               ->where('place_id', $request['to'])
               ->where('transport_type', $transport_type)
               ->first();
           if (is_null($transport_data)) {
               $is_route_available = false;
           } else {
               if ($vehicle_type == 1) {
                   $transport_cost = $transport_data->regular_price;  //Vehicle Type Good
               } else {
                   $transport_cost = $transport_data->luxury_price;   //Vehicle Type Luxury
               }
           }

           if ($transport_cost <= 0) {
               $is_route_available = false;
           }


           //Hotel Cost
           $hotel_data = Accomodation::where('place_id', $request['to'])->first();
           if ($hotel_type == 1) {
               //Standard Hotel
               $hotel_cost = $hotel_data->standard;  //Vehicle Type Good
           } else if ($hotel_type == 2) {
               //Good Hotel
               $hotel_cost = $hotel_data->good;  //Vehicle Type Good
           } else {
               //excellent Hotel
               $hotel_cost = $hotel_data->excellent;  //Vehicle Type Good
           }

           $data = Place::where('places.place_id', $request['to'])->first();*/


        return view('common.pages.travel_calculator.index')
            ->with('places', Place::get());
        /*  ->with('transport_type', $transport_type)
          ->with('vehicle_type', $vehicle_type)
          ->with('hotel_type', $hotel_type)
          ->with('person', $person)
          ->with('transport_cost', $transport_cost)
          ->with('hotel_cost', $hotel_cost)
          ->with('place_id', $request['to'])
          ->with('is_route_available', $is_route_available)
          ->with('day', $day)
          ->with('from_id', $from_id)
          ->with('data', $data);*/


    }

    public function tourManager2(Request $request)
    {


        $is_route_available = true;
        $transport_type = $request['transport_type'];
        $vehicle_type = $request['vehicle_type'];
        $hotel_type = $request['hotel_type'];
        $person = $request['person'];
        $day = $request['day'];
        $from_id = $request['from_id'];
        $transport_cost = null;

        if ($transport_type == 3) {
            $transport_data = Transport::where('from_id', $from_id)
                ->where('transport_type', $transport_type)
                ->where('from_id', $from_id)
                ->first();
            if (is_null($transport_data)) {
                $is_route_available = false;
            } else {
                if ($transport_data->regular_price < 100) {
                    $is_route_available = false;
                }
            }


        }


        $transport_data = Transport::where('from_id', $from_id)
            ->where('place_id', $request['to'])
            ->where('transport_type', $transport_type)
            ->first();
        if (is_null($transport_data)) {
            $is_route_available = false;
        } else {
            if ($vehicle_type == 1) {
                $transport_cost = $transport_data->regular_price;  //Vehicle Type Good
            } else {
                $transport_cost = $transport_data->luxury_price;   //Vehicle Type Luxury
            }
        }



        if ($transport_cost <= 0) {
            $is_route_available = false;
        }


        //Hotel Cost
        $hotel_data = Accomodation::where('place_id', $request['to'])->first();
        if ($hotel_type == 1) {
            //Standard Hotel
            $hotel_cost = $hotel_data->standard;  //Vehicle Type Good
        } else if ($hotel_type == 2) {
            //Good Hotel
            $hotel_cost = $hotel_data->good;  //Vehicle Type Good
        } else {
            //excellent Hotel
            $hotel_cost = $hotel_data->excellent;  //Vehicle Type Good
        }

        $data = Place::where('places.place_id', $request['to'])->first();


        return view('common.pages.travel_calculator.old')
            ->with('places', Place::get())
            ->with('transport_type', $transport_type)
            ->with('vehicle_type', $vehicle_type)
            ->with('hotel_type', $hotel_type)
            ->with('person', $person)
            ->with('transport_cost', $transport_cost)
            ->with('hotel_cost', $hotel_cost)
            ->with('place_id', $request['to'])
            ->with('is_route_available', $is_route_available)
            ->with('day', $day)
            ->with('from_id', $from_id)
            ->with('data', $data);


    }


    public function catgoryresult($id)
    {
        $blog = Blog::orderBy('blogs.created_at', 'DESC')->join('blog_categories', 'blog_category_id', '=', 'blogs.category_id')->where('blogs.category_id', $id)->get();
        return view('common.pages.blog.category_blog_result')->with('blogs', $blog)->with('category_id', $id);
    }

    public function uploadIndex()
    {
        return view('common.pages.home.test');
    }


    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('/assets/images1'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = ('/assets/images1/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;

        }
    }

    public function newForum()
    {
        return view('common.pages.forum.create_forum');

    }


    public function forumStore(Request $request)
    {


        $forum = new ForumTopic();
        $forum['title'] = $request['title'];
        $forum['details'] = $request['details'];
        $forum['user_id'] = Auth::id();


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/forum');
            $image->move($directory, $image_name);
            $forum['image'] = $image_name;
        }

        try {
            $forum->save();
            $topics = ForumTopic::
            join('users', 'users.id', '=', 'forum_topics.user_id')
                ->orderBy('forum_topics.created_at', 'DESC')->get();
            return Redirect::to('/user/forums')->with('success', "Successfully Post Saved");
        } catch (\Exception $exception) {

            // return $exception->getMessage();
            return back()->with('failed', "There is a problem. Try Again");
        }

    }

    public function forum()
    {
        return view('common.pages.profile.new_forum');

    }

    public function userForums(ForumTopic $forumTopic)
    {
        $topics = ForumTopic::
        join('users', 'users.id', '=', 'forum_topics.user_id')
            ->orderBy('forum_topics.created_at', 'DESC')
            ->select('forum_topics.*', 'users.full_name', 'users.phone', 'users.email')
            ->paginate(10);
        return view('common.pages.forum.index')->with('results', $topics);
    }
    public function search(Request $request)
    {

        $search= $request['search'];
        $topics = ForumTopic::
        join('users', 'users.id', '=', 'forum_topics.user_id')
            ->orderBy('forum_topics.created_at', 'DESC')
            ->select('forum_topics.*', 'users.full_name', 'users.phone', 'users.email')
            ->where('forum_topics.title', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('common.pages.forum.index')->with('results', $topics);
    }


    public function forumedit($topic_id)
    {
        $result = ForumTopic::where('topic_id', $topic_id)->first();
        return view('common.pages.profile.forum_edit')->with('result', $result);

    }

    public function forumupdate(Request $request)
    {
        unset($request['_token']);
        try {
            ForumTopic::where('topic_id', $request['topic_id'])->update($request->all());
            return back()->with('success', "Successfully forum Updated");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }

    }

    public function destroyforum($id)
    {
        try {
            ForumLike::where('topic_id', $id)->delete();
            ForumComment::where('topic_id', $id)->delete();
            ForumTopic::where('topic_id', $id)->delete();
            return back()->with('success', "Successfully Forum Deleted");

        } catch (\Exception $exception) {


            return back()->with('failed', $exception->getMessage());
        }


    }

    function encryptId($input)
    {
        return strtr(base64_encode($input), '+/=', '._-');
    }

    function decryptId($input)
    {
        return base64_decode(strtr($input, '._-', '+/='));
    }

}
