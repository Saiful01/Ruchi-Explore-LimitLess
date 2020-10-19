@extends('layouts.common')

@section('title', 'Tourist Spots')



@section('content')

    <div class="container margin_60">
        @if(session('success'))

            <div class="alert alert-success">{{session('success')}}!</div>

        @endif
        @if($is_route_available==false)
            <div class="alert alert-danger">
                Route is not available
            </div>
        @endif
        <div class="row" ng-controller="tourController">
            <div class="col-md-8">
                <form action="/tour-manager2" method="get" class="box_style_1" id="transfers">
                    <h3>{{__('localize.travel')}}<span> {{__('localize.calculator')}}</span></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="select-label">{{__('localize.from')}}</label>
                                <select class="form-control" name="from_id">
                                    <option value="1" @if($from_id==1) selected @endif>Dhaka</option>
                                    <option value="2" @if($from_id==2) selected @endif>Rajshahi</option>
                                    <option value="3" @if($from_id==3) selected @endif>Barisal</option>
                                    <option value="4" @if($from_id==4) selected @endif>Chittagong</option>
                                    <option value="5" @if($from_id==5) selected @endif>Khulna</option>
                                    <option value="6" @if($from_id==6) selected @endif>Mymensingh</option>
                                    <option value="7" @if($from_id==7) selected @endif>Sylhet</option>
                                    <option value="8" @if($from_id==8) selected @endif>Rangpur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="select-label">{{__('localize.drop_off_location')}}</label>

                                <select class="form-control" name="to">
                                    @foreach(getPlaces() as $place)
                                        <option value="{{$place->place_id}}"
                                                @if($place->place_id==$place_id) selected @endif>{{$place->place_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="select-label">{{__('localize.transport_type')}}</label>
                                <select class="form-control" name="transport_type">
                                    <option value="1" @if($transport_type=="1") selected @endif>Bus</option>
                                    <option value="2" @if($transport_type=="2") selected @endif>Train</option>
                                    <option value="3" @if($transport_type=="3") selected @endif>Air</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="select-label">{{__('localize.vehicle_type')}}</label>
                                <select class="form-control" name="vehicle_type">
                                    <option value="1" @if($vehicle_type==1) selected @endif>Economy</option>
                                    <option value="2" @if($vehicle_type==2) selected @endif>Luxury</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="select-label">{{__('localize.hotel_type')}}</label>
                                <select class="form-control" name="hotel_type">
                                    <option value="1" @if($hotel_type==1) selected @endif>Economy</option>
                                    <option value="2" @if($hotel_type==2) selected @endif>Mid-Range
                                    </option>
                                    <option value="3" @if($hotel_type==3) selected @endif>Luxury
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label class="select-label">{{__('localize.person')}}</label>
                                <div class="numbers-row">
                                    <input type="number" value="{{$person}}" id="adults" class="qty2 form-control"
                                           name="person" ng-model="person">
                                    <div class="inc button_inc" ng-click="personPlus()">+</div>
                                    <div class="dec button_inc" ng-click="personMinus()">-</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label class="select-label">{{__('localize.day')}}</label>
                                <div class="numbers-row">
                                    <input type="number" value="{{$day}}" id="adults" class="qty2 form-control"
                                           name="day" ng-model="day">
                                    <div class="inc button_inc" ng-click="dayPlus()">+</div>
                                    <div class="dec button_inc" ng-click="dayMinus()">-</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <button class="btn_1 rounded"><i class="icon-search"></i>{{__('localize.search_now')}}</button>
                </form>

            </div>

            <div class="col-md-4">
                <div class="box_style_1">
                    <h3 class="inner">- {{__('localize.summary')}} -</h3>
                    @if($is_route_available)
                        <table class="table table_summary">
                            <tbody>
                            <tr>
                                <td>
                                    Transport Cost
                                </td>
                                <td class="text-right">
                                    {{$transport_cost*$person}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hotel Cost
                                </td>
                                <td class="text-right">
                                    {{$hotel_cost*$person*$day}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Food Cost
                                </td>
                                <td class="text-right">
                                    {{$data->food_cost*$person*$day}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Other Cost
                                </td>
                                <td class="text-right">
                                    {{$data->other_cost*$person*$day}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Person
                                </td>
                                <td class="text-right">
                                    {{$person}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Day
                                </td>
                                <td class="text-right">
                                    {{$day}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total
                                </td>
                                <td class="text-right">
                                    {{ ($transport_cost*$person)+($hotel_cost*$person*$day)+($data->food_cost*$person*$day)+($data->other_cost*$person*$day)}}
                                    BDT
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    @else
                        <h4>Route is not available</h4>
                    @endif

                </div>


            </div>
        </div>

        <div class="row">
            @if(!is_null($data))
                <div class="row col-md-8">
                    <div class="col-lg-3">
                        <h3>Specialities</h3>
                    </div>
                    <div class="col-lg-9 mt-4">

                        <p>{!! $data->specialities !!}</p>


                    </div>
                    <!-- End col-md-9  -->
                </div>
                <div class="col-md-4">

                    <img class="img-thumbnail" src="/place/image/{{$data->image}}" width="100%"/>
                </div>
            @endif
        </div>


    </div>


    <script>

        app.controller('tourController', function ($scope, $http) {

            $scope.transport_type = "1"
            $scope.vehicle_type = "1";
            $scope.hotel_type = "1";
            $scope.person = 1;
            $scope.transport_cost = 0;
            $scope.hotel_cost = 0;
            $scope.place_id = 1;
            $scope.is_route_available = 0;
            $scope.day = 1;
            $scope.from_id = 1;
            $scope.food_cost = 0;
            $scope.other_cost = 0;
            $scope.to = "1";
            $scope.from_id = "1";


            $scope.personPlus = function () {
                $scope.person = $scope.person + 1;
                console.log($scope.person);
            };

            $scope.personMinus = function () {
                if ($scope.person > 2) {
                    $scope.person = $scope.person - 1;
                }
            };
            $scope.dayPlus = function () {
                $scope.day = $scope.day + 1;
                console.log($scope.day);
            };

            $scope.dayMinus = function () {
                if ($scope.day > 2) {
                    $scope.day = $scope.day - 1;
                }

            };

            $scope.getSearchData = function () {

                console.log($scope.person + "----------------ppp");
                /*  console.log($scope.vehicle_type);
                  console.log($scope.vehicle_type);
                  console.log($scope.hotel_type);
                  console.log($scope.person);
                  console.log($scope.day);
                  console.log($scope.from_id);*/

                $http.post('/api/tour-manager', {
                    transport_type: $scope.transport_type,
                    vehicle_type: $scope.vehicle_type,
                    hotel_type: $scope.hotel_type,
                    person: $scope.person,
                    day: $scope.day,
                    from_id: $scope.from_id,
                    to: $scope.to,

                }).then(function success(response) {
                    /* console.log(response.data.motiur);
                     console.log(response.data.transport_cost);
                     console.log(response.data.hotel_cost);
                     console.log(response.data.day);
                     console.log(response.data.food_cost);
                     console.log(response.data.other_cost);
                     console.log(response.data.is_route_available);
                     console.log(response.data.person + "person");*/
                    $scope.is_route_available = response.data.is_route_available;

                    if ($scope.is_route_available == false) {

                        document.getElementById("travel_data").style.display = "none";
                        document.getElementById("no_data").style.display = "block";

                        document.getElementById("travel_data2").style.display = "none";
                        document.getElementById("no_data2").style.display = "block";

                    } else {
                        console.log("true");
                        document.getElementById("travel_data").style.display = "block";
                        document.getElementById("no_data").style.display = "none";
                        document.getElementById("travel_data2").style.display = "block";
                        document.getElementById("no_data2").style.display = "none";


                        $scope.transport_cost = response.data.transport_cost;
                        $scope.hotel_cost = response.data.hotel_cost;
                        $scope.food_cost = response.data.food_cost;
                        $scope.other_cost = response.data.other_cost;
                    }


                    // $scope.status_code = response.data.status_code;
                });
            };
        });
    </script>

@stop
