<?php

namespace App\Http\Controllers;


use App\LoginHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;

class LoginController2 extends Controller
{

    public function login()
    {

        return view('login');
    }

    public function index()
    {

        return view('admin.home.index');
    }

    public function doLogin(Request $request)
    {


        $email = $request['email'];
        $password = $request['password'];
        $remember = true;

        // attempt to do the login
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {

            if (!Auth::user()->is_active) {
                return Redirect::to('/logout');
            }
            try {
                LoginHistory::create([
                    'ip_address' => request()->ip(),
                    'user_id' => Auth::id()
                ]);
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }

            return Redirect::to('/admin/dashboard');
        } else {
            return back()->with('failed', "Username or password does not match");

        }
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('/');
    }

    public function registration()
    {
        return view('register')->with('users', User::where('designation', 'DC/AC')->get());
    }

    public function confirmMail($id)
    {
        $id = $this->decrypt($id);
        try {
            User::where('id', $id)->update(['active_status' => 0]);
            return Redirect::to('/login')->with('success', "Email Confirmed");
        } catch (\Exception $exception) {
            return Redirect::to('/login')->with('failed', $exception->getMessage());
        }
    }


    public function mailConfirm($email, $id)
    {
        $id = $this->encrypt($id);
        $url = "benapole.pixonlab.com/user/confirm/" . $id;
        $msg = "Please click on given Link:  \n " . $url;

        //echo $this->decrypt($id);
        mail($email, "Mail From Leave APP ", $msg);

    }

    function encrypt($input)
    {
        return strtr(base64_encode($input), '+/=', '._-');
    }

    function decrypt($input)
    {
        return base64_decode(strtr($input, '._-', '+/='));
    }

    public function forgetPass()
    {
        return view('common.pages.auth.reset_password');
    }

    public function forgetPassReset(Request $request)
    {
        $email = $request['email'];
        $user = User::where('email', $email)->first();
        if (is_null($user)) {

            return back()->with('failed', "Email not found");
        } else {
            //Reset Pass
            //$user = User::where('email', $email)->update(['password'], Hash::make($password));
            $url = URL::to('/user/confirm/reset/' . $this->encrypt($user->id));
          /*  $msg = "To reset password, click on this link: " . $url;*/
            //TODO::send email to user

            $data = array(
                'name' => $request->full_name,
                'body' => " To reset password, click on this link:  . $url"
            );

            Mail::send('forgotpassword.mail', $data, function ($message) use ($email) {
                $message->from('ruchiexplore@gmail.com', 'Ruchi Explore Limitless');
                $message->to($email);
                $message->subject('Password Reset mail From Ruchi Explorer Bangladesh');

            });

            return back()->with('success', "Check your email");
        }
    }

    public function resetPassword(Request $request, $id)
    {
        //return $this->decrypt($id);
        if ($request->isMethod('get')) {
            return view('common.pages.auth.confirm_reset')->with('id', $id);
        } else {
            User::where('id', $this->decrypt($id))->update(['password' => Hash::make($request['password'])]);
            return \redirect('/user/login')->with('success', "Successfully password updated");

        }

    }




    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        // dd($googleUser);
        $user = User::where('email', $googleUser->getEmail())->first();
        if (is_null($user)) {
               $user = User::create([
                'full_name' => $googleUser->getName(),
                'user_login' => $googleUser->getId(),
                'email' => $googleUser->getEmail(),
                'phone' => $googleUser->getId(),
                'password' => Hash::make('123456'),
                'is_social_login' => true,
                'is_active' => true,

            ]);
            $user = User::where('email', $googleUser->getEmail())->first();

            Auth::login($user);
        }

        Auth::login($user);
       return  Redirect::to('/user/profile');


    }

    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        ($facebookUser);

        $user = User::where('email', $facebookUser->getEmail())->first();
        if (is_null($user)) {
            $user = User::create([
                'full_name' => $facebookUser->getName(),
                'user_login' => $facebookUser->getId(),
                'email' => $facebookUser->getEmail(),
                'phone' => $facebookUser->getId(),
                'password' => Hash::make('123456'),
                'is_social_login' => true,
                'is_active' => true,

            ]);
            $user = User::where('email', $facebookUser->getEmail())->first();

            Auth::login($user);
        }

        Auth::login($user);
        return Redirect::to('/user/profile');

    }
}
