<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\BlogCategory;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.advertise_image.create')->with('categories', BlogCategory::get());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        return $request;
        unset($request['_token']);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/advertise_image');
            $image->move($directory, $image_name);
            $request['advertise_image'] = $image_name;

        }
        $request['category_id'] = json_encode($request['category_id']);

         //return $request->except(['image', '_token']);
        try {
            Advertise::create($request->except(['image', '_token']));
            return back()->with('success', "Successfully Image Saved");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function show(Advertise $advertise)
    {
        $result = Advertise::orderBy('created_at', "DESC")->paginate(10);
        return view('admin.advertise_image.show')->with('result', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $result = Advertise::where('advertise_id', $id)->first();
        return view('admin.advertise_image.edit')
            ->with('result', $result)
            ->with('categories', BlogCategory::get());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertise $advertise)
    {
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('/images/advertise_image');
            $image->move($directory, $image_name);
            $request['advertise_image'] = $image_name;
        }

        $request['category_id'] = json_encode($request['category_id']);

        try {
            Advertise::where('advertise_id', $request['advertise_id'])->update($request->except(['image', '_token']));
            return back()->with('success', "Successfully Image Updated");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Advertise::where('advertise_id', $id)->delete();
            return back()->with('success', "Successfully Image deleted");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }
}
