<a href="/user/forum/create" class="btn btn-outline-success btn-xs">new_forum</a>
@if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{session('success')}}!</strong>
    </div>
@endif
@if(session('failed'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{session('failed')}}!</strong>
    </div>
@endif


@foreach($forums as $forum)
    <div class="strip_booking">

        <div class="row">
            <div class="col-lg-10 col-md-10">
                <h3 class="hotel_booking">{{$forum->title}}</h3>
            </div>

            <div class="col-lg-2 col-md-2">
                <div class="booking_buttons">
                    <a href="/user/forum/edit/{{$forum->topic_id}}" class="btn_2">{{__('localize.edit')}}</a>
                    <a href="/user/forum/delete/{{$forum->topic_id}}" class="btn_3" class="delete" onclick="return confirm('Are you sure you want to delete this item')">{{__('localize.delete')}}</a>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End strip booking -->
@endforeach
