<div class="container margin_60" style="padding-top: 35px;padding-bottom: 35px">

    <div class="main_title">
        <div class="row">

            <div class="col-md-6">
                <h2 class="float-left ">FEATURED STORIES  </h2>
            </div>

            <div class="col-md-6">
                <img src="/image/powered.png" style="width: 190px;
    float: right;">
            </div>

        </div>


    </div>

    <div class="row">
        <div class="col-md-6 wow zoomIn" data-wow-delay="0.2s" >
            <h2>{{$featured_stories->blog_title}}</h2>
            <h4 class="font-weight-bold">তারেক অণু </h4>
            <p>{!! strip_tags(substr( $featured_stories->blog_details,0,1500)) !!}</p>

            <p class="text-center pt-5">
                <a href="/blogs/hawor/{{$featured_stories->blog_id}}/{{str_replace(" ","-","$featured_stories->blog_title")}}" class="btn_1">Read More</a>
            </p>

        </div>
        <div class="col-md-6 wow zoomIn" data-wow-delay="0.2s" >
            <img class="img-thumbnail" src="{{'/images/blog/'.$featured_stories->featured_image}}">

        </div>

    </div>
</div>
