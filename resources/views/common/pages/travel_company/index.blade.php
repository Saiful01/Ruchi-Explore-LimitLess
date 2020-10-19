@extends('layouts.common')

@section('title', 'Travel Company')



@section('content')


    <div class="container margin_60">
        <div class="">
            <img class="img-thumbnail" src="/images/company/hotel_bg.png" alt="image" width="100%">
        </div>
        <div class="main_title ">
            <h4 class="mt-2" id="font">TRAVEL MANAGEMENT ORGANISATION</h4>

        </div>
        <div class="row">
            @foreach($companies as $company)
            <div class="col-lg-3 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <img src="/images/company/{{$company->featured_image}}" height="200" class="img-thumbnail card-img-top"
                         alt="..." style="max-height: 250px">


                    <h3 class="">{{$company->company_title}}</h3>
                    {{--    <p>
                            {!!html_entity_decode( getLimitedPostContent($blog->blog_details))!!}
                        </p>--}}
                    <a target="" href="/travel-company/{{$company->company_id}}"
                       class="btn btn-danger ">View Package</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>






@stop
