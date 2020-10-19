<?php

namespace App\Http\Controllers;

use App\TripAlbaum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripAlbaumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.trip_album.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        unset($request['_token']);
        //$request['author_id'] = Auth::user()->id;

        if ($request->hasFile('image')) {


            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/blog');
            $image->move($destinationPath, $image_name);

            $request['trip_album_image'] = $image_name;


        }

        //return $request->except(['image']);

        try {
            TripAlbaum::create($request->except(['image']));
            return back()->with('success', "Successfully Trip Album Saved");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TripAlbaum $tripAlbaum
     * @return \Illuminate\Http\Response
     */
    public function show(TripAlbaum $tripAlbaum)
    {
        $result = TripAlbaum::orderBy('created_at', 'DESC')->get();
        return view('admin.trip_album.show')->with('result', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TripAlbaum $tripAlbaum
     * @return \Illuminate\Http\Response
     */
    public function edit($trip_album_id)
    {
        $result = TripAlbaum::where('trip_album_id', $trip_album_id)->first();
        return view('admin.trip_album.edit')->with('result', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\TripAlbaum $tripAlbaum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TripAlbaum $tripAlbaum)
    {
        unset($request['_token']);
        $request['author_id'] = Auth::user()->id;

        if ($request->hasFile('image')) {


            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/blog');
            $image->move($destinationPath, $image_name);
            $request['trip_album_image'] = $image_name;
        }


        try {
            TripAlbaum::where('trip_album_id', $request['trip_album_id'])->update($request->except(['image']));
            return back()->with('success', "Successfully Trip Album Updated");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TripAlbaum $tripAlbaum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            TripAlbaum::where('trip_album_id', $id)->delete();
            return back()->with('success', "Successfully Deleted");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }
}
