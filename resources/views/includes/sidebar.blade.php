<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="/images/user/{{Auth::user()->profile_pic}}"
                         width="60px"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                    </a>

                </div>
                <div class="logo-element">
                    UT
                </div>
            </li>
            <li>
                <a href="/admin/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            {{--            <li>--}}
            {{--                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Admin</span><span--}}
            {{--                            class="fa arrow"></span></a>--}}
            {{--                <ul class="nav nav-second-level collapse">--}}
            {{--                    <li><a href="/admin/user/new">New Admin</a></li>--}}
            {{--                    <li><a href="/admin/user/list">Admins List</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}


            <li>
                <a href="#"><i class="fa fa-location-arrow"></i> <span class="nav-label">Manage Place</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/place/create">New Place</a></li>
                    <li><a href="/admin/places">Place List</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span
                            class="nav-label">Manage Forum</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/forum/post">Post</a></li>
                    <li><a href="/comments/show">Comment</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-book"></i> <span
                            class="nav-label">Manage Blog Post</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/post/create"> New Post</a></li>
                    <li><a href="/blog/post"> Blog Post</a></li>
                    <li><a href="/blogcomments/show">Comment</a></li>
                    <li><a href="/admin/blog_category/create"> Create Category</a></li>
                    <li><a href="/admin/blog_category/show">View Category</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-book"></i> <span
                            class="nav-label">Manage Tourist Place</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/tourist-spot/index">Tourist Spot Create</a></li>
                    <li><a href="/admin/tourist-spot/show">Tourist Spot Show</a></li>
                    <li><a href="/admin/tourist-spot-category/index">Spot Categories create</a></li>
                    <li><a href="/admin/tourist-spot-category/show">Spot Categories Show</a></li>
                </ul>
            </li>


            <li>
                <a href="#"><i class="glyphicon glyphicon-send"></i> <span
                            class="nav-label">Manage Trip Album</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/tripalbum/create"> Create</a></li>
                    <li><a href="/admin/tripalbum/show">view</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-location-arrow"></i> <span class="nav-label">Manage Video</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/video/create"> Create</a></li>
                    <li><a href="/admin/video/show">view</a></li>
                </ul>
            </li>
            {{-- <li>
                 <a href="#"><i class="glyphicon glyphicon-king"></i> <span class="nav-label">Manage post</span><span
                             class="fa arrow"></span></a>
                 <ul class="nav nav-second-level collapse">
                     <li><a href="/post/create"> Create</a></li>
                     <li><a href="/post/show">view</a></li>
                 </ul>
             </li>--}}
            <li>
                <a href="#"><i class="glyphicon glyphicon-king"></i> <span class="nav-label">Manage Product</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/product/create">product Create</a></li>
                    <li><a href="/admin/product/show">product view</a></li>
                    <li><a href="/admin/product/category/create">Category Create</a></li>
                    <li><a href="/admin/product/category/show">Category view</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-bell"></i> <span class="nav-label">Manage Event</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/event/create">Event Create</a></li>
                    <li><a href="/admin/event/show">Event view</a></li>
                    <li><a href="/admin/event-post/create">Create Event Post</a></li>
                    <li><a href="/admin/event-post/show">View Event Post</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="glyphicon glyphicon-hourglass"></i> <span
                            class="nav-label">Manage Users</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/user/create">Create Admin</a></li>
                    <li><a href="/admin/show">Admins</a></li>
                    <li><a href="/admin/users/show">Users</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-hourglass"></i> <span
                            class="nav-label">Manage Advertise</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/advertise/create">New Image</a></li>
                    <li><a href="/admin/advertise/view">View Image</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-hourglass"></i> <span
                            class="nav-label">Manage Package</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/company/show">View Company</a></li>
                    <li><a href="/admin/package/show">View Package</a></li>
                </ul>
            </li>


            <li>
                <a href="/admin/slider/show"><i class="fa fa-diamond"></i> <span class="nav-label">Manage Slider</span></a>
            </li>

            <li>
                <a href="/admin/profile"><i class="fa fa-diamond"></i> <span class="nav-label">Profile</span></a>
            </li>
            <li>
                <a href="/admin/result/game-1"><i class="fa fa-diamond"></i> <span class="nav-label">Game Result</span></a>
            </li>
        </ul>

    </div>
</nav>
