<?php

namespace App\Http\Controllers;

use App\Accomodation;
use App\Place;
use App\Transport;
use Illuminate\Http\Request;

class PlaceController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {

        return view('admin.place.create');
    }

    public function store(Request $request)
    {
        unset($request['_token']);


        //return $request->all();

        if ($request->hasFile('image')) {


            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/place/image');
            $image->move($destinationPath, $image_name);
            $place_array = [

                'place_name' => $request['place_name'],
                'specialities' => $request['specialities'],
                'food_cost' => $request['food_cost'],
                'other_cost' => $request['other_cost'],
                'image' => $image_name,
            ];
        } else {
            $place_array = [
                'place_name' => $request['place_name'],
                'specialities' => $request['specialities'],
                'food_cost' => $request['food_cost'],
                'other_cost' => $request['other_cost'],
            ];

        }
        $place_id = Place::insertGetId($place_array);

        //
        $i = 0;
        foreach ($request['from_id'] as $from_id) {

            $bus_array = [
                'transport_type' => 1,
                'from_id' => $from_id,
                'regular_price' => $request['bus_regular_price'][$i],
                'luxury_price' => $request['bus_luxury_price'][$i],
                'place_id' => $place_id,
            ];
            Transport::create($bus_array);

            $train_array = [
                'transport_type' => 2,
                'from_id' => $from_id,
                'regular_price' => $request['train_regular_price'][$i],
                'luxury_price' => $request['train_luxury_price'][$i],
                'place_id' => $place_id,
            ];
            Transport::create($train_array);
            $air_array = [
                'transport_type' => 3,
                'from_id' => $from_id,
                'regular_price' => $request['air_regular_price'][$i],
                'luxury_price' => $request['air_luxury_price'][$i],
                'place_id' => $place_id,
            ];
            Transport::create($air_array);
            $i++;
        }

        $accomodation_array = [
            'standard' => $request['standard'],
            'good' => $request['good'],
            'excellent' => $request['excellent'],
            'place_id' => $place_id,
        ];

        try {
            Accomodation::create($accomodation_array);
            return back()->with('success', "Successfully saved");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }

    }


    public function show(Place $place)
    {
        $result = Place::leftJoin('accomodations', 'accomodations.place_id', '=', 'places.place_id')
            ->get();
        return view('admin.place.show')->with('result', $result);
    }


    public function edit($place_id)
    {

        $result = Place::leftJoin('accomodations', 'accomodations.place_id', '=', 'places.place_id')
            ->where('places.place_id', $place_id)
            ->first();
        $data = Transport::where('place_id', $place_id)->get();
        return view('admin.place.edit')
            ->with('result', $result)
            ->with('data', $data);

    }


    public function update(Request $request, Place $place)
    {
        unset($request['_token']);

        //return $request->all();

        if ($request->hasFile('image')) {


            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/place/image');
            $image->move($destinationPath, $image_name);
            $place_array = [

                'place_name' => $request['place_name'],
                'specialities' => $request['specialities'],
                'food_cost' => $request['food_cost'],
                'other_cost' => $request['other_cost'],
                'image' => $image_name,
            ];
        } else {
            $place_array = [

                'place_name' => $request['place_name'],
                'specialities' => $request['specialities'],
                'food_cost' => $request['food_cost'],
                'other_cost' => $request['other_cost'],
            ];

        }
        Place::where('place_id', $request['place_id'])->update($place_array);


        //return $request->all();
        $i = 0;
        foreach ($request['from_id'] as $from_id) {

            //return $request['bus_transport_id'][$i];
            //return $request['bus_transport_id'][$i];
            //return Transport::where('transport_id', $request['bus_transport_id'][$i])->get();
             $bus_array = [
                'transport_type' => 1,
                'regular_price' => $request['bus_regular_price'][$i],
                'luxury_price' => $request['bus_luxury_price'][$i],
            ];
            try {
                Transport::where('transport_id', $request['bus_transport_id'][$i])->update($bus_array);
                Transport::where('transport_id', $request['bus_transport_id'][$i])->get();
            } catch (\Exception $exception) {

                return $exception->getMessage();
            }


            // return ;
            $train_array = [

                'transport_type' => 2,
                'regular_price' => $request['train_regular_price'][$i],
                'luxury_price' => $request['train_luxury_price'][$i],

            ];
            Transport::where('transport_id', $request['train_transport_id'][$i])->update($train_array);
            $air_array = [
                'transport_type' => 3,
                'regular_price' => $request['air_regular_price'][$i],
                'luxury_price' => $request['air_luxury_price'][$i],
            ];
            Transport::where('transport_id', $request['air_transport_id'][$i])->update($air_array);


            $i++;
        }

        $accomodation_array = [
            'standard' => $request['standard'],
            'good' => $request['good'],
            'excellent' => $request['excellent'],
            'place_id' => $request['place_id'],
        ];
        try {
            Accomodation::where('id', $request['accommodation_id'])->update($accomodation_array);
            return back()->with('success', "Successfully saved");


        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Transport::where('place_id', $id)->delete();
            Accomodation::where('place_id', $id)->delete();

            Place::where('place_id', $id)->delete();
            return back()->with('success', "Successfully Deleted");

        } catch (\Exception $exception) {
            return back()->with('failed', $exception->getMessage());
        }

    }
}
