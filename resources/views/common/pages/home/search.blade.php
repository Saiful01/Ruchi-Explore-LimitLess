<div style="background: #4d536d url(./template/img/background_image/1.jpg);width:100%; padding: 45px 0px ;margin: 0px; background-repeat: round;">
    <div class="container-fluid nopadding">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-7 mx-auto">
                    <div class="main_title ">
                        <img src="/template/img/main-logo.png" width="25%"/>
                        <h2 class="text-center">{{__('localize.travel')}} <span>{{__('localize.calculator')}}</span>
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
                                        <select class="form-control">
                                            <option value="orly_airport">Dhaka</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="select-label">{{__('localize.drop_off_location')}}</label>

                                        <select class="form-control" name="to">
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
                                        <select class="form-control" name="transport_type">
                                            <option value="1">Bus</option>
                                            <option value="2">Train</option>
                                            <option value="3">Air</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="select-label">{{__('localize.vehicle_type')}}</label>
                                        <select class="form-control" name="vehicle_type">
                                            <option value="1">Economy</option>
                                            <option value="2">Luxury</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="select-label">{{__('localize.hotel_type')}}</label>
                                        <select class="form-control" name="hotel_type">
                                            <option value="1">Economy</option>
                                            <option value="2">Mid-Range</option>
                                            <option value="3">Luxury</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label class="select-label">{{__('localize.person')}}</label>
                                        <div class="numbers-row">
                                            <input type="number" value="1" id="adults" class="qty2 form-control"
                                                   name="person">
                                            <div class="inc button_inc">+</div>
                                            <div class="dec button_inc">-</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label class="select-label">{{__('localize.day')}}</label>
                                        <div class="numbers-row">
                                            <input type="number" value="1" id="adults" class="qty2 form-control"
                                                   name="day">
                                            <div class="inc button_inc">+</div>
                                            <div class="dec button_inc">-</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn_1"><i class="icon-search"></i>{{__('localize.search_now')}}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
