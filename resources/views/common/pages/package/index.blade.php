@extends('layouts.common')

@section('title', 'Tour Package')



@section('content')

    <div class="common-bg">
        <div class="container margin_60">
            <div class="main_title ">
                <h4 class="mt-2" id="font">{{$companies->company_title}}</h4>

            </div>
            <div class="main_title ">
                <h3 class="mt-2" id="font">Tour Package</h3>

            </div>
            <div class="row">
                @foreach($results as $company)

                    <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s">
                        <a href="/travel-company/package/{{$company->package_id}}">
                            <div class="">
                                <img src="/images/package/{{$company->package_image}}" class="card-img-top"
                                     alt="..." height="250px">
                                <span class="badge p-2 " id="taka"> ৳ {{$company->price}} </span>


                                <h3 class="">{{$company->title}}</h3>
                                <p>{{$company->location}}</p>
                                <p><i id="clock" class="fa fa-clock-o"></i> <span class=" mt-3 ml-3">{{$company->duration}} Days </span>
                                </p>
                                {{--   <a target="" href=""
                                      class="btn btn-danger ">View Package</a>--}}
                            </div>
                        </a>
                    </div>



                @endforeach

            </div>
        </div>

    </div>


@stop
