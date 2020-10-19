<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/template/img/slides');
            $image->move($destinationPath, $image_name);
            $request['slider_name'] = $image_name;

        }

        try {
            Slider::where('slider_id', $request['slider_id'])->create($request->except(['image', 'image_name']));;
            return back()->with('success', "Successfully  Create");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        $result = Slider::get();
        return view('admin.slider.view')->with('result', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($slider_id)
    {
        $result = Slider::where('slider_id', $slider_id)->first();
        return view('admin.slider.edit')->with('result', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {

        unset($request['_token']);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/template/img/slides');
            $image->move($destinationPath, $image_name);
            $request['slider_name'] = $image_name;

        }


        try {
            Slider::where('slider_id', $request['slider_id'])->update($request->except(['image', 'image_name']));;
            return back()->with('success', "Successfully  Update");
        } catch (\Exception $exception) {

            return back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
