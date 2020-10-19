@extends('layouts.common')

@section('title', $category_id)



@section('content')
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
    </style>

    <div class="container margin_60">
        <div class="main_title">
            <h2>{{$category_id}}
                {{--  {{ __('localize.blogs')}}--}}
            </h2>
            <p class="pt-4 text-justify">{!! $blog_details->category_details !!}</p>
        </div>


        <div class="row">

            @foreach($blogs as $blog)
                <div class="col-md-4 wow zoomIn" data-wow-delay="0.3s"
                     style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">
                    <div class="tour_container">
                        <div class="img_container">
                            <a href="">
                                <img src="{{'/images/blog/'.$blog->featured_image}}" width="800" height="533"
                                     class="img-fluid" alt="Image" style="height: 325px">
                                <div class="short_info">
                                </div>
                            </a>
                        </div>
                        <div class="tour_title">
                            <center>
                                <h3><strong>{{$blog->blog_title}}</strong></h3>

                                <a href="#" data-toggle="modal"
                                   data-target="#destination{{$blog->blog_id}}"
                                   class="btn_1  mt-3">{{__('localize.read_more')}}</a>
                            </center>


                        </div>
                        <!-- End box tour -->
                    </div>


                    <!--End row -->

                    <!-- Modal Double room-->
                    <div class="modal fade" id="destination{{$blog->blog_id}}" tabindex="-1" role="dialog"
                         aria-labelledby="modal_double_room"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modal_double_room">{{$blog->blog_title}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="img_container ">
                                        <a href="">
                                            <img src="{{'/images/blog/'.$blog->featured_image}}" width="50%" style="display: block; margin-left: auto; margin-right: auto"
                                                 class="img-thumbnail" alt="Image" >

                                        </a>
                                    </div>
                                    <p class="mt-5" style="text-align: left !important;">
                                        {!! $blog->blog_details !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!--End container -->
            @endforeach
        </div>
        <div class="main_title mt-2">
            <h2 class=""> RELATED DESTINATION</h2>

        </div>


        <div class="owl-carousel owl-theme list_carousel add_bottom_30">


            @foreach($categories as $category)
                <div class="item">

                    <div class="tour_container">
                        <div class="img_container">
                            <a href="/blogs/{{$category->blog_category_id}}/{{$category->en_name}}">
                                <img src="/images/category/{{$category->featured_image}}"
                                     width="100%"
                                     class="img-fluid"
                                     alt="image" style="height: 205px;">
                                <div class="short_info">
                                    <h4 class="text-white"
                                        style="font-weight: bold">{{$category->en_name}}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /carousel -->
    </div>

@stop
