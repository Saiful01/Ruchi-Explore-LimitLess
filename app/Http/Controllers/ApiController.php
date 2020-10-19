<?php

namespace App\Http\Controllers;

use App\Accomodation;
use App\Place;
use App\TouristSpot;
use App\Transport;
use Illuminate\Http\Request;

class ApiController extends Controller
{


    public function gettingSpots(Request $request)
    {
        $spot_category_id = $request['id'];

        $datas = TouristSpot::where('spot_category_id', $spot_category_id)->get();
        foreach ($datas as $data) {
            $data->name = $data->spot_name;
            $data->location_latitude = $data->lat;
            $data->location_longitude = $data->lon;
            $data->map_image_url = '/images/tourist_spot/' . $data->featured_image;


            $data->name_point = $data->spot_name;
            $data->description_point = $data->spot_details;

            $data->get_directions_start_address = '';


            $data->phone = '';
            $data->url_point = '/explore-bangladesh/' . $data->spot_id . '/' . getTitleToUrl($data->spot_name);

        }
        return $datas;
    }

    /**
     * @param Request $request
     */
    public function tourManager(Request $request)
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
        if (is_null($hotel_data)) {
            $hotel_cost = 0;
        } else {
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

        }


        $data = Place::where('places.place_id', $request['to'])->first();
        if(is_null($data)){
            $food_cost=0;
            $other_cost=0;
        }else{
            $food_cost=$data->food_cost;
            $other_cost=$data->other_cost;
        }


        return [
            'status_code' => 200,
            'status' => "Successfully Retrieved",
            'transport_type' => $transport_type,
            'vehicle_type' => $vehicle_type,
            'person' => $person,
            'transport_cost' => $transport_cost,
            'hotel_cost' => $hotel_cost,
            'place_id' => $request['to'],
            'is_route_available' => $is_route_available,
            'day' => $day,
            'from_id' => $from_id,
            'other_cost' => $other_cost,
            'food_cost' => $food_cost,
            'data' => $data,
            'motiur' => $request->all(),
        ];


    }
}
