<style>
    main {
        background-color: #f9f9f9;
        z-index: inherit;
        position: relative;
    }

    .modal-open .modal {
        overflow-x: hidden;
        overflow-y: auto;
        max-height: 100%;
    }

    footer {
        position: inherit !important;
    }

    .modal {
        left: 15px;
    }

    @media (max-width: 480px) {
        .modal {
            left: 0px;
        }
    }

    .modal {
        margin-top: -79px;
        z-index: 9999999;
    }

    .modal {
        background-color: rgba(0, 0, 0, 0.5) !important;
        color: white;
    }

    #no_data {
        padding-top: 67px;
        padding-bottom: 97px;
        text-align: center;
    }

    .modal-dialog-centered.modal-dialog-scrollable .modal-content {
        width: 100%;
        height: 100%;
        border-bottom: 10px solid #FDA625;
    }

    tr {
        border: 2px solid #dfdad3
    }


    .modal-header {
        border: none;
    }

</style>
<div id="tourController" ng-controller="tourController">
    <div id="desktop"
         style="background: #4d536d url(./template/img/background_image/1.jpg);width:100%; padding: 45px 0px ;margin: 0px; background-repeat: round;">
        <div class="container-fluid nopadding">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-7 mx-auto">
                        <div class="main_title ">
                            <img src="/template/img/main-logo.png" width="25%"/>
                            <h2 class="text-center text-white">{{__('localize.travel')}} <span
                                    style="color: #01652F">{{__('localize.calculator')}}</span>
                            </h2>
                            {{--  <p class="text-center" style="padding-top: 5px">Expolore Travel spots</p>--}}
                        </div>


                        <div class="box_style_1 wow zoomIn" data-wow-delay="0.2s"
                             style="background-color:rgba(0, 0, 0, 0.5); color: white; font-weight: bold; font-size: 16px" {{--style=" background: rgb(91, 90, 85); /* The Fallback */
   background: rgba(0,0,0,0.53); "--}}>

                            <form action="/tour-manager" method="get">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="select-label">{{__('localize.from')}}</label>
                                            <select class="form-control" name="from_id" ng-model="from_id">
                                                <option value="1">Dhaka</option>
                                                <option value="2">Rajshahi</option>
                                                <option value="3">Barisal</option>
                                                <option value="4">Chittagong</option>
                                                <option value="5">Khulna</option>
                                                <option value="6">Mymensingh</option>
                                                <option value="7">Sylhet</option>
                                                <option value="8">Rangpur</option>

                                                <option value="orly_airport">Dhaka</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="select-label">{{__('localize.drop_off_location')}}</label>

                                            <select class="form-control" name="to" ng-model="to">
                                                @foreach($places as $place)
                                                    <option value="{{$place->place_id}}">{{$place->place_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="select-label">{{__('localize.transport_type')}}</label>
                                            <select class="form-control" name="transport_type"
                                                    ng-model="transport_type">
                                                <option value="1">Bus</option>
                                                <option value="2">Train</option>
                                                <option value="3">Air</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="select-label">{{__('localize.vehicle_type')}}</label>
                                            <select class="form-control" name="vehicle_type" ng-model="vehicle_type">
                                                <option value="1">Economy</option>
                                                <option value="2">Business</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="select-label">{{__('localize.hotel_type')}}</label>
                                            <select class="form-control" name="hotel_type" ng-model="hotel_type">
                                                <option value="1">Economy</option>
                                                <option value="2">Mid-Range</option>
                                                <option value="3">Business</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-6">
                                        <div class="form-group">
                                            <label class="select-label">{{__('localize.person')}}</label>
                                            <div class="numbers-row">
                                                <input type="number" id="adults" class="qty2 form-control"
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
                                                <input type="number" value="1" id="adults" class="qty2 form-control"
                                                       name="day" ng-model="day">
                                                <div class="inc button_inc" ng-click="dayPlus()">+</div>
                                                <div class="dec button_inc" ng-click="dayMinus()">-</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <a href="#" data-toggle="modal"
                                   data-target="#modal1"
                                   class="btn_1  mt-3" ng-click="getSearchData()">{{__('localize.search_now')}}</a>
                            </form>
                        </div>
                    {{--   <button  class="btn_1"><i class="icon-search"></i>{{__('localize.search_now')}}</button>--}}
                    <!-- Modal Double room-->
                        <div class="modal fade" id="modal1" tabindex="-1" role="dialog"
                             aria-labelledby="modal_double_room"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="" style="background: #4d536d url(./images/trip_calculator_final_02.png); background-repeat: no-repeat;
                                             background-size: 100% 100%; width: 100%; height: 100%;">
                                    <div class="modal-header " style="height: 70px">
                                        {{--<h4 class="modal-title" id="modal_double_room"--}}
                                            {{--style="text-align: center !important;">{{__('localize.summary')}}</h4>--}}
                                        <button  type="button" class="close float-right" data-dismiss="modal"
                                                aria-label="Close"><span style="    background-color: #4d4a4a;
    color: #000000;
    padding: 0px 8px;"
                                                aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mt-2">

                                            <div class="row" id="travel_data" >

                                                <div class="col-md-6 mx-auto">
                                                    <div class="row" >
                                                        <div class="col-md-8 col-6">
                                                            <h6 style="text-align: left"  id="trip">
                                                                <img  src="/images/bus.png" alt="icon" id="img" class="float-left" > <span style="text-align: left;padding-left: 15px;color: #000000"> Transport Cost</span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-4 col-6" >
                                                            <h6 id="trip" >
                                                                @{{transport_cost*person}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8 col-6">
                                                            <h6 style="text-align: left"  id="trip">
                                                                <img  src="/images/hotel.png" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 15px;color: #000000">   Hotel Cost</span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-4 col-6" >
                                                            <h6 id="trip" >
                                                                @{{hotel_cost*person*day}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8 col-6">
                                                            <h6 style="text-align: left"  id="trip">
                                                                <img  src="/images/food.jpg" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 15px;color: #000000">  Food Cost</span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-4 col-6" >
                                                            <h6 id="trip" >
                                                                @{{food_cost*person*day}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8 col-6">
                                                            <h6 style="text-align: left"  id="trip">
                                                                <img  src="/images/other.png" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 15px;color: #000000">  Other Cost</span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-4 col-6" >
                                                            <h6 id="trip" >
                                                                @{{other_cost*person*day}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8 col-6">
                                                            <h6 style="text-align: left"  id="trip">
                                                                <img  src="/images/person.jpg" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 15px;color: #000000">    Person</span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-4 col-6" >
                                                            <h6 id="trip" >
                                                                @{{person}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8 col-6">
                                                            <h6 style="text-align: left"  id="trip">
                                                                <img   src="/images/calender.png" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 15px;color: #000000">      Day</span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-4 col-6" >
                                                            <h6 id="trip" >
                                                                @{{day}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8 col-6">
                                                            <h6 style="text-align: left;
    padding-left: 18px;
}"  id="trip">
                                                                <strong>Total</strong>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-4 col-6" >
                                                            <h6 id="trip" >
                                                                <strong>
                                                                    @{{
                                                                    (transport_cost*person)+(hotel_cost*person*day)+(food_cost*person*day)+(other_cost*person*day)}}
                                                                    BDT
                                                                </strong>
                                                            </h6>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                                {{--  @if($is_route_available)--}}




                                                {{--  @else
                                                      <h4>Route is not available</h4>
                                                  @endif--}}

                                            </div>
                                            <div class="col-md-12" id="no_data">

                                                <h4>Route is not available</h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div id="mobile"
             style="background: #4d536d url(./template/img/background_image/mobile.jpg);background-size: cover">
            <div class="container-fluid nopadding">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-7 mx-auto">
                            <div class="main_title ">
                                <img src="/template/img/main-logo.png" width="25%"/>ph
                                <h2 class="text-center text-white">{{__('localize.travel')}} <span
                                        style="color: #01652F">{{__('localize.calculator')}}</span>
                                </h2>
                                {{--  <p class="text-center" style="padding-top: 5px">Expolore Travel spots</p>--}}
                            </div>


                            <div class="box_style_1 wow zoomIn" data-wow-delay="0.2s"
                                 style="background-color:rgba(0, 0, 0, 0.5); color: white; font-weight: bold; font-size: 16px" {{--style=" background: rgb(91, 90, 85); /* The Fallback */
   background: rgba(0,0,0,0.53); "--}}>

                                <form action="/tour-manager" method="get">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="select-label">{{__('localize.from')}}</label>
                                                <select class="form-control" name="from_id" ng-model="from_id">
                                                    <option value="1">Dhaka</option>
                                                    <option value="2">Rajshahi</option>
                                                    <option value="3">Barisal</option>
                                                    <option value="4">Chittagong</option>
                                                    <option value="5">Khulna</option>
                                                    <option value="6">Mymensingh</option>
                                                    <option value="7">Sylhet</option>
                                                    <option value="8">Rangpur</option>

                                                    <option value="orly_airport">Dhaka</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="select-label">{{__('localize.drop_off_location')}}</label>

                                                <select class="form-control" name="to" ng-model="to">
                                                    @foreach($places as $place)
                                                        <option
                                                            value="{{$place->place_id}}">{{$place->place_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="select-label">{{__('localize.transport_type')}}</label>
                                                <select class="form-control" name="transport_type"
                                                        ng-model="transport_type">
                                                    <option value="1">Bus</option>
                                                    <option value="2">Train</option>
                                                    <option value="3">Air</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="select-label">{{__('localize.vehicle_type')}}</label>
                                                <select class="form-control" name="vehicle_type"
                                                        ng-model="vehicle_type">
                                                    <option value="1">Economy</option>
                                                    <option value="2">Business</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="select-label">{{__('localize.hotel_type')}}</label>
                                                <select class="form-control" name="hotel_type" ng-model="hotel_type">
                                                    <option value="1">Economy</option>
                                                    <option value="2">Mid-Range</option>
                                                    <option value="3">Business</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-6">
                                            <div class="form-group">
                                                <label class="select-label">{{__('localize.person')}}</label>
                                                <div class="numbers-row">
                                                    <input type="number" id="adults" class="qty2 form-control"
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
                                                    <input type="number" value="1" id="adults" class="qty2 form-control"
                                                           name="day" ng-model="day">
                                                    <div class="inc button_inc" ng-click="dayPlus()">+</div>
                                                    <div class="dec button_inc" ng-click="dayMinus()">-</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="#" data-toggle="modal"
                                       data-target="#modal2"
                                       class="btn_1  mt-3" ng-click="getSearchData()">{{__('localize.search_now')}}</a>
                                </form>
                            </div>
                        {{--   <button  class="btn_1"><i class="icon-search"></i>{{__('localize.search_now')}}</button>--}}
                        <!-- Modal Double room-->
                            <div class="modal fade" id="modal2" tabindex="-1" role="dialog"
                                 aria-labelledby="modal_double_room"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="" style="background: #4d536d url(./images/trip_calculator_final_02.png); background-repeat: no-repeat;
                                             background-size: 100% 100%; width: 100%; height: 100%;">
                                            <div class="modal-header " style="height: 70px">
                                                {{--<h4 class="modal-title" id="modal_double_room"--}}
                                                {{--style="text-align: center !important;">{{__('localize.summary')}}</h4>--}}
                                                <button  type="button" class="close float-right" data-dismiss="modal"
                                                         aria-label="Close"><span style="    background-color: #4d4a4a;
    color: #000000;
    padding: 0px 8px;"
                                                                                  aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mt-2">

                                                <div class="row" id="travel_data" >

                                                    <div class="col-md-6 mx-auto">
                                                        <div class="row" >
                                                            <div class="col-md-8 col-6">
                                                                <h6 style=""  id="trip">
                                                                    <img  src="/images/bus.png" alt="icon" id="img" class="float-left" >  Transport Cost
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 col-6" >
                                                                <h6 id="trip" >
                                                                    @{{transport_cost*person}}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col-md-8 col-6">
                                                                <h6 style=""  id="trip">
                                                                    <img  src="/images/hotel.png" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 15px;color: #000000">   Hotel Cost</span>
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 col-6" >
                                                                <h6 id="trip" >
                                                                    @{{hotel_cost*person*day}}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col-md-8 col-6">
                                                                <h6 style=""  id="trip">
                                                                    <img  src="/images/food.jpg" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 15px;color: #000000">  Food Cost</span>
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 col-6" >
                                                                <h6 id="trip" >
                                                                    @{{food_cost*person*day}}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col-md-8 col-6">
                                                                <h6 style=""  id="trip">
                                                                    <img  src="/images/other.png" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 15px;color: #000000">  Other Cost</span>
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 col-6" >
                                                                <h6 id="trip" >
                                                                    @{{other_cost*person*day}}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col-md-8 col-6">
                                                                <h6 style=""  id="trip">
                                                                    <img  src="/images/person.jpg" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 15px;color: #000000">    Person</span>
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 col-6" >
                                                                <h6 id="trip" >
                                                                    @{{person}}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col-md-8 col-6">
                                                                <h6 style=""  id="trip">
                                                                    <img   src="/images/calender.png" alt="icon" id="img" class="float-left"><span style="text-align: left;padding-left: 13px;color: #000000">   Day</span>
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 col-6" >
                                                                <h6 id="trip" >
                                                                    @{{day}}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="row" >
                                                            <div class="col-md-8 col-6">
                                                                <h6 style="text-align: left;
    padding-left: 18px;
}"  id="trip">
                                                                    <strong style="text-align: left">Total</strong>
                                                                </h6>
                                                            </div>
                                                            <div class="col-md-4 col-6" >
                                                                <h6 id="trip" >
                                                                    <strong>
                                                                        @{{
                                                                        (transport_cost*person)+(hotel_cost*person*day)+(food_cost*person*day)+(other_cost*person*day)}}
                                                                        BDT
                                                                    </strong>
                                                                </h6>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                {{--  @if($is_route_available)--}}




                                                {{--  @else
                                                      <h4>Route is not available</h4>
                                                  @endif--}}

                                            </div>
                                         {{--   <div class="col-md-12" id="no_data">

                                                <h4>Route is not available</h4>

                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
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

                //console.log($scope.person + "----------------ppp");
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

                    console.log(response.data);

                    $scope.is_route_available = response.data.is_route_available;

                    if ($scope.is_route_available == false) {

                        document.getElementById("travel_data").style.display = "none";
                        document.getElementById("no_data").style.display = "block";

                        document.getElementById("travel_data2").style.display = "none";
                        document.getElementById("no_data2").style.display = "block";

                    } else {
                        $scope.transport_cost = response.data.transport_cost;
                        $scope.hotel_cost = response.data.hotel_cost;
                        $scope.food_cost = response.data.food_cost;
                        $scope.other_cost = response.data.other_cost;

                        console.log("true");
                        document.getElementById("travel_data").style.display = "block";
                        document.getElementById("no_data").style.display = "none";
                        document.getElementById("travel_data2").style.display = "block";
                        document.getElementById("no_data2").style.display = "none";

                    }


                    // $scope.status_code = response.data.status_code;
                });
            };
        });
    </script>
