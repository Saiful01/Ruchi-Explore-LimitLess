<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{

    public function profile()
    {

        return view('admin.profile.index')->with('result', User::where('id', Auth::id())->first());


    }

    public function editProfile()
    {

        return view('admin.profile.edit')->with('result', User::where('id', Auth::id())->first());

    }

    public function updateProfile(Request $request)
    {

        unset($request['_token']); //Remove Token
        unset($request['id']); //Remove id


        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            ]);
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user');
            $image->move($destinationPath, $image_name);
            $request->request->add(['profile_pic' => $image_name]);
            $request->request->add(['password' => Hash::make($request['password'])]);
            $data = $request->except('image');
            Session::put('profile_pic', $image_name);
        } else {
            $request->request->add(['password' => Hash::make($request['password'])]);
            $data = $request->all();
        }

        //return $request->all();
        try {
            User::where('id', Auth::id())->update($data);
            return back()->with('success', "Profile Updated");
        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }

    }
}
