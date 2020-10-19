<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminUserCreate()
    {
        return view('admin.user.create');
    }

    public function AdminUserstore(Request $request)
    {
        try {
            $request['user_login'] = $request['full_name'];

            $request['password'] = Hash::make('password');
            $result = $request['is_admin'];
            if ($result == "Admin") {
                $request['is_admin'] = true;

            } else {
                $request['is_admin'] = false;

            }

            User::create($request->all());
            return back()->with('success', "Successfully Saved");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());

        }


    }

    public function AdminShow()
    {
        $result = User::where('is_admin', true)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.user.show')->with('result', $result);
    }

    public function UserShow()
    {
        $result = User::where('is_admin', false)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.user.show')->with('result', $result);
    }

    public function AdminUserUpdate($id, $status)
    {
        $result = User::where('id', $id)
            ->update(['is_active'=>$status]);
        return back()->with('success', "Updated");
    }
}
