<?php

use App\Accomodation;
use App\Place;
use App\Transport;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $place_array = [

            'place_name' => "Potenga",
            'specialities' => "Sea Beach
                                Fried Sea Food 
                                Mejbani",
            'food_cost' => 600,
            'other_cost' => 400,
            'image' => "1588082008.jpg",
        ];

        $place_id = Place::insertGetId($place_array);

        $transport_array = array(
            $bus_array = [
                'transport_type' => 1,
                'from_id' => 1,
                'regular_price' => 1100,
                'luxury_price' => 500,
                'place_id' => $place_id,
            ],
            $train_array = [
                'transport_type' => 2,
                'from_id' => 1,
                'regular_price' => 354,
                'luxury_price' => 1100,
                'place_id' => $place_id,
            ],
            $air_array = [
                'transport_type' => 3,
                'from_id' => 1,
                'regular_price' => 5000,
                'luxury_price' => null,
                'place_id' => $place_id,
            ]
        );
        Transport::insert($transport_array);
        $accomodation_array = [
            'standard' => 800,
            'good' => 3000,
            'excellent' => 7000,
            'place_id' => $place_id,
        ];

        Accomodation::create($accomodation_array);

        //Chandranath Temple
        $place_array = [

            'place_name' => "Chandranath Temple",
            'specialities' => "Shitakundo Eco Park,
Guliakhali Beach
Bashbaria Beach,
Jhorjhori Jarna",
            'food_cost' => 500,
            'other_cost' => 200,
            'image' => "1588082008.jpg",
        ];

        $place_id = Place::insertGetId($place_array);

        $transport_array = array(
            $bus_array = [
                'transport_type' => 1,
                'from_id' => 1,
                'regular_price' => 1100,
                'luxury_price' => 450,
                'place_id' => $place_id,
            ],
            $train_array = [
                'transport_type' => 2,
                'from_id' => 1,
                'regular_price' => 300,
                'luxury_price' => 800,
                'place_id' => $place_id,
            ],
            $air_array = [
                'transport_type' => 3,
                'from_id' => 1,
                'regular_price' => null,
                'luxury_price' => null,
                'place_id' => $place_id,
            ]
        );
        Transport::insert($transport_array);
        $accomodation_array = [
            'standard' => 600,
            'good' => 1500,
            'excellent' => 2500,
            'place_id' => $place_id,
        ];

        Accomodation::create($accomodation_array);

        //Third Place
        $place_array = [

            'place_name' => "Mohamaya Lake ",
            'specialities' => "Kayaking,
Boat, Chandranath Jharna,Shitakundo Eco Park,
Guliakhali Beach
Bashbaria Beach,
Jhorjhori Jarna
",
            'food_cost' => 500,
            'other_cost' => 500,
            'image' => "1588082008.jpg",
        ];

        $place_id = Place::insertGetId($place_array);

        $transport_array = array(
            $bus_array = [
                'transport_type' => 1,
                'from_id' => 1,
                'regular_price' => 1100,
                'luxury_price' => 420,
                'place_id' => $place_id,
            ],
            $train_array = [
                'transport_type' => 2,
                'from_id' => 1,
                'regular_price' => 300,
                'luxury_price' => 800,
                'place_id' => $place_id,
            ],
            $air_array = [
                'transport_type' => 3,
                'from_id' => 1,
                'regular_price' => 5000,
                'luxury_price' => null,
                'place_id' => $place_id,
            ]
        );
        Transport::insert($transport_array);
        $accomodation_array = [
            'standard' => 500,
            'good' => 1000,
            'excellent' => 1600,
            'place_id' => $place_id,
        ];

        Accomodation::create($accomodation_array);

        //Guliakhali Sea Beach
        $place_array = [

            'place_name' => "Guliakhali Sea Beach ",
            'specialities' => "Shitakundo Eco Park,
Bashbaria Beach,
Jhorjhori Jarna",
            'food_cost' => 500,
            'other_cost' => 200,
            'image' => "1588082008.jpg",
        ];

        $place_id = Place::insertGetId($place_array);

        $transport_array = array(
            $bus_array = [
                'transport_type' => 1,
                'from_id' => 1,
                'regular_price' => 1100,
                'luxury_price' => 450,
                'place_id' => $place_id,
            ],
            $train_array = [
                'transport_type' => 2,
                'from_id' => 1,
                'regular_price' => 300,
                'luxury_price' => 800,
                'place_id' => $place_id,
            ],
            $air_array = [
                'transport_type' => 3,
                'from_id' => 1,
                'regular_price' => null,
                'luxury_price' => null,
                'place_id' => $place_id,
            ]
        );
        Transport::insert($transport_array);
        $accomodation_array = [
            'standard' => 600,
            'good' => 1500,
            'excellent' => 2500,
            'place_id' => $place_id,
        ];

        Accomodation::create($accomodation_array);
    }
}
