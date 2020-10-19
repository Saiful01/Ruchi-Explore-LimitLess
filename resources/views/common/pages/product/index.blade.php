@extends('layouts.common')

@section('title', 'Product-Ruchi Explore Limitless')



@section('content')

    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>

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
    {{--
        <div id="carouselExampleControls" class="carousel slide container-fluid" data-ride="carousel" >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" style="height: 200px" src="/images/tourist_spot/1589148467.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="height: 200px" src="/images/tourist_spot/1589148579.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="height: 200px" src="/images/tourist_spot/1589148628.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    --}}

    <div class="container margin_60">


        <img src="/images/product_category/{{$category->slider_image}}" style="height: auto;width: 100%;" alt="">


        <div class="row">

            <div class="col-lg-12">
                <div class="shop-section">

                {{-- <div class="items-sorting">
                     <div class="row">
                         <div class="col-6">
                             <div class="results_shop">
                                 --}}{{--  Showing 1–9 of 15 results--}}{{--
                             </div>
                         </div>
                         <div class="col-6">
                             <div class="form-group">
                                 --}}{{--<select name="sort-by">
                                     <option>Sorting by</option>
                                     <option>Order</option>
                                     <option>Price</option>
                                 </select>--}}{{--
                             </div>
                         </div>
                     </div>
                 </div>--}}
                <!--End Sort By-->
                    <br>
                    <div class="row">
                        @if(count($products)<=0)

                            <div class="col-lg-9 mx-auto wow zoomIn" data-wow-delay="0.2s">
                                <div class="box_style_1">
                                    <h6 class="text-danger"> There Are No Product</h6>
                                </div>

                            </div>
                        @endif
                        @foreach($products as $product)
                            <div class="col-md-3 wow zoomIn" data-wow-delay="0.2s">
                                <h6 class="mb-2 text-center" style="text-transform: uppercase">{{$product->product_name}}</h6>

                                <center><img src="/images/product/{{$product->product_image}}"
                                             alt="Image" class="" style=" max-height: 250px"></center>

                                <p class="text-justify text-center "
                                   style="font-size: 13px;font-weight: lighter">{{str_limit($product->product_details,60)}} <span> <a target="_blank" href="#" data-toggle="modal"
                                                                                                                                      data-target="#destination{{$product->product_id}}"
                                                                                                                                      class="" style="color: #FFC500">{{__('localize.read_more')}}</a> </span></p>

                             {{--   <p class="text-center">Available In</p>--}}
                                <P class="text-justify text-center">{{$product->available_in}}</P>

                                <div class="row">
                                   {{-- <div class="col-md-6 pull-right">
                                        <a target="_blank" href="#" data-toggle="modal"
                                           data-target="#destination{{$product->product_id}}"
                                           class="btn_1">{{__('localize.read_more')}}</a>

                                    </div>--}}
                                    <div class="col-md-6  mx-auto">
                                        <a target="_blank" href="{{$product->url_link}}"
                                           class="btn_1" style="background: #FFC500;color: black;text-transform: uppercase">Buy Now</a>

                                    </div>


                                    <!-- Modal Double room-->
                                    <div class="modal fade" id="destination{{$product->product_id}}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="modal_double_room"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"
                                                        id="modal_double_room">{{$product->product_name}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="img_container">
                                                        <a href="#">
                                                            <center>
                                                                <img src="{{'/images/product/'.$product->product_image}}"
                                                                     width="250" class="img-thumbnail" alt="Image">
                                                            </center>
                                                           {{-- <div class="short_info">
                                                            </div>--}}
                                                        </a>
                                                    </div>
                                                    <p class="mt-5" style="text-align: left !important;">
                                                        {{ $product->product_details }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        @endforeach
                    </div>
                    <hr>

                    <center>
                        <a href="/products" style="background-color: #4DB10B;-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px; text-transform: uppercase" class="btn btn-success">Back to
                            Category</a>
                    </center>
                    <!--End Shop Item-->

                </div>
                <!-- End row -->
            </div>
            <!-- End col -->


        </div>
    </div>


@stop

