<div class="white_bg ">


    <div class="container margin_60" style="padding-top: 35px;padding-bottom: 35px">

        <div class="main_title  ">
            <h2><span></span>Events</h2>

        </div>
        <div class="row">
           @foreach($event as $event)
            <div class="col-sm-3">
                <div class="tour_container">
                    <div class="img_container">
                        <a href="#">
                            <img src="/images/event_image/{{$event->event_image}}"  width="800" height="533" class="img-fluid" alt="Image">
                            <div class="short_info">
                                <i class="icon_set_1_icon-44"></i>{{$event->event_title_en}}
                            </div>
                        </a>
                    </div>
                    <div class="tour_title">
                        <h3><strong>{{$event->event_title_en}}</strong></h3>
                        <h5><strong>{{getonlyDate($event->event_starting_date)}}</strong> <span><strong>{{getonlyMonth($event->event_starting_date)}}</strong></span></h5>

                       <!-- end rating -->
                        <div class="view_on_map">{{$event->event_address}}</div>
                    </div>
                </div><!-- End box tour -->
            </div><!-- End col -->
            @endforeach
        </div>

        <p class="text-center pt-5">
            <a href="#" class="btn_1">View All Events</a>
        </p>
    </div>






</div>

<!-- /container -->

