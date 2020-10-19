<a href="/user/blog" class="btn btn-outline-success btn-xs">{{__('localize.new_blog')}}</a>

@foreach($blogs as $blog)
    <div class="strip_booking">
        <div class="row">
            <div class="col-lg-10 col-md-10">
                <a href="/blog/{{$blog->blog_id}}/{{getTitleToUrl($blog->blog_title)}}">
                    <h3 class="hotel_booking">{{$blog->blog_title}}<span>{{dateFormat($blog->created_at)}}</span></h3>
                </a>
                <p class="small" style="padding-left: 65px; padding-top: 5px"> <span class="text-success">@if($blog->publish_status==true) <span>Published</span> @else <span class="text-danger">Unpublished</span>@endif </span></p>
            </div>

            <div class="col-lg-2 col-md-2">
                <div class="booking_buttons">
                    <a href="/user/blog/edit/{{$blog->blog_id}}" class="btn_2">{{__('localize.edit')}}</a>
                    {{--<a href="/user/blog/delete/{{$blog->blog_id}}" class="btn_3" class="delete" onclick="return confirm('Are you sure you want to delete this item')">{{__('localize.delete')}}</a>--}}
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End strip booking -->
@endforeach

{{$blogs->links()}}
