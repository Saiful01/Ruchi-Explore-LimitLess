<?php

namespace App\Http\Controllers;

use App\TouristSpot;
use App\TouristSpotCategory;
use Illuminate\Http\Request;

class TouristSpotController extends Controller
{

    public function index()
    {
        $categories= TouristSpotCategory::get();
        return view('admin.tourist_spot.create')->with('categories',$categories );
    }


    public function store(Request $request)
    {

        unset($request['_token']);
        $request['is_active']= true;

        if ($request->hasFile('featured_image')) {


            $image = $request->file('featured_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/tourist_spot');
            $image->move($destinationPath, $image_name);
            $array = [
                'spot_category_id' => $request['spot_category_id'],
                'spot_name' => $request['spot_name'],
                'spot_bn_name' => $request['spot_bn_name'],
                'spot_details' => $request['spot_details'],
                'address' => $request['address'],
                'lat' => $request['lat'],
                'lon' => $request['lon'],
                'featured_image' => $image_name,
               'is_active'=>true,
            ];
        } else {
            $array = [
                'spot_category_id' => $request['spot_category_id'],
                'spot_name' => $request['spot_name'],
                'spot_bn_name' => $request['spot_bn_name'],
                'spot_details' => $request['spot_details'],
                'address' => $request['address'],
                'lat' => $request['lat'],
                'lon' => $request['lon'],
            ];

        }

        try {
            TouristSpot::create($array);
            return back()->with('success', "Successfully save  ");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());

        }
    }


    public function show(TouristSpot $touristSpot)
    {
        $result= TouristSpot::join('tourist_spot_categories', 'tourist_spot_categories.spot_category_id', '=', 'tourist_spots.spot_category_id')
            ->get();
        return view('admin.tourist_spot.show')->with('result',$result );
    }

    public function edit( $spot_id)
    {
        $result = TouristSpot::where('spot_id', $spot_id)->first();

        return view('admin.tourist_spot.edit')
            ->with('categories', TouristSpotCategory::get())
            ->with('result', $result);
    }

    public function update(Request $request, TouristSpot $touristSpot)
    {
        unset($request['_token']);

        if ($request->hasFile('featured_image')) {


            $image = $request->file('featured_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/tourist_spot');
            $image->move($destinationPath, $image_name);
            $array = [
                'spot_category_id' => $request['spot_category_id'],
                'spot_name' => $request['spot_name'],
                'spot_bn_name' => $request['spot_bn_name'],
                'spot_details' => $request['spot_details'],
                'address' => $request['address'],
                'lat' => $request['lat'],
                'lon' => $request['lon'],
                'featured_image' => $image_name,
            ];
        } else {
            $array = [
                'spot_category_id' => $request['spot_category_id'],
                'spot_name' => $request['spot_name'],
                'spot_bn_name' => $request['spot_bn_name'],
                'spot_details' => $request['spot_details'],
                'address' => $request['address'],
                'lat' => $request['lat'],
                'lon' => $request['lon'],
            ];

        }

        try {
            TouristSpot::where('spot_id', $request['spot_id'])->update($array);
            return back()->with('success', "Successfully Updated  ");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());

        }

    }


    public function destroy( $id)
    {
        try {
            TouristSpot::where('spot_id', $id)->delete();
            return back()->with('success', "Successfully   Deleted ");
        }
        catch (\Exception $exception){
            return back()->with('failed', $exception->getMessage());

        }
    }
}
