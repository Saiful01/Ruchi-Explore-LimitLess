<?php

namespace App\Http\Controllers;

use App\TouristSpotCategory;
use Illuminate\Http\Request;

class TouristSpotCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tourist_spot_category.create');
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
        unset($request['_token']);
        try {
            TouristSpotCategory::create($request->all());
            return back()->with('success', "Successfully save  Category name");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TouristSpotCategory  $touristSpotCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TouristSpotCategory $touristSpotCategory)
    {
        $result=TouristSpotCategory::get();
        return view('admin.tourist_spot_category.show')->with('result', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TouristSpotCategory  $touristSpotCategory
     * @return \Illuminate\Http\Response
     */
    public function edit( $spot_category_id)
    {
        $result=TouristSpotCategory::where('spot_category_id', $spot_category_id)->first();
        return view('admin.tourist_spot_category.edit')->with('result', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TouristSpotCategory  $touristSpotCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TouristSpotCategory $touristSpotCategory)
    {
        return 0;
        unset($request['_token']);
        try {
            TouristSpotCategory::where('spot_category_id', $request['spot_category_id'])->update($request->all());
            return back()->with('success', "Successfully Updated  Category name");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TouristSpotCategory  $touristSpotCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {
            TouristSpotCategory::where('spot_category_id', $id)->delete();
            return back()->with('success', "Successfully Deleted  Category name");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());

        }
    }
}
