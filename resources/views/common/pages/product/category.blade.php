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


    <div class="container margin_60">


        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <?php $i = 0;?>
                @if(count($categories)>0)

                    @foreach($categories as $res)
                        <div class="carousel-item @if($i==0) active @endif" >
                            <img src="/images/product_category/{{$res->slider_image}}" alt="">
                        </div>
                        <?php $i++;?>
                    @endforeach
                @endif

            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <br>
        <div class="main_title">
            <h2>Product Category</h2>

        </div>

        <div class="row">
            <?php
                $i=0;
            ?>
            @foreach( $categories as $category)
                <?php $i++?>

                <div class="col-md-3 wow zoomIn" data-wow-delay="0.2s" @if($i%4!=0) style="border-right: 1px solid rgb(228 232 237);
    margin-bottom: 47px;" @endif>
                    <a style="font-weight: bold" href="/product/category/{{$category->product_category_id}}">
                        <center>
                            <img src="/images/product_category/{{$category->featured_image}}" style="width: auto;"
                                 height="230px" alt="image">
                        </center>
                        <p class="text-center mt-2 cat-btn-bg"> {{$category->product_category_name}}</p>
                    </a>
                </div>

            @endforeach


        </div>
    </div>


@stop

