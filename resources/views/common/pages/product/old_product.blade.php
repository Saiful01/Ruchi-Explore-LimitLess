@extends('layouts.common')

@section('title', 'Product-Ruchi Explore Limitless')



@section('content')
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

        <div class="row">
            <!--Sidebar-->
            <div class="col-lg-3">
                <aside class="sidebar">
                    <div class="widget">
                        {{--     <div class="input-group">
                                 <input type="text" class="form-control" placeholder="Search...">
                                 <span class="input-group-btn">
                             <button class="btn btn-default" type="button" style="margin-left:0;"><i class="icon-search"></i></button>
                             </span>
                             </div>--}}
                    </div>
                    <!-- End Search -->

                    <div class="widget" id="cat_shop">

                        <div class="box_style_1">
                            <h4>Categories</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a style="font-weight: bold"
                                           href="/product/category/{{$category->product_category_id}}">{{$category->product_category_name}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
            <!--Sidebar-->
            <div class="col-lg-9">
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

                    <div class="row">
                        @if(count($products)<=0)

                            <div class="col-lg-9 mx-auto wow zoomIn" data-wow-delay="0.2s">
                                <div class="box_style_1">
                                    <h6 class="text-danger"> There Are No Product</h6>
                                </div>

                            </div>
                        @endif
                        @foreach($products as $product)
                            <div class="col-lg-12 wow zoomIn" data-wow-delay="0.2s">


                                <div class="strip_all_tour_list wow zoomIn" data-wow-delay="0.2s"
                                     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">

                                            <div class="img_list" style="text-align: center">

                                                <center>
                                                    <img src="/images/product/{{$product->product_image}}"
                                                         alt="Image" style="height: 100%; width:auto; padding-top: 25px;padding-bottom: 25px;text-align: center">
                                                </center>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="tour_list_desc pt-4">
                                                <h3><strong>{{$product->product_name}}</strong></h3>
                                                <p>{{$product->product_details}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="price_list">
                                                <div><sup>Available In</sup>
                                                    <P>{{$product->available_in}}</P>
                                                    <p CLASS="mt-2"><a target="_blank" href="{{$product->url_link}}"
                                                                       class="btn_1">Buy Now</a>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End strip -->

                            </div>

                        @endforeach
                    </div>
                    <!--End Shop Item-->

                </div>
                <!-- End row -->
            </div>
            <!-- End col -->


        </div>
    </div>


@stop

