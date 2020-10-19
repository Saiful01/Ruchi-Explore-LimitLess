@extends('layouts.common')

@section('title', 'Profile')



@section('content')

    <br>
    <div class="margin_60 container">

        <div class="row">
            <div class="col-md-12">
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

            </div>

            <div id="tabs" class="tabs">
                <nav>
                    <ul>
                        <li class=""><a href="#profile" class="icon-profile"><span>{{__('localize.profile')}}</span></a>
                        </li>
                        <li class="tab-current"><a href="#blogs"
                                                   class="icon-booking"><span>{{__('localize.blogs')}}</span></a>
                        </li>
                        <li class=""><a href="#forum"
                                        class="icon-list"><span>{{__('localize.forum')}}</span></a>
                        </li>


                        <li class=""><a href="#profile" class="icon-gamepad"><span>Game</span></a>
                        </li>
                    </ul>
                </nav>
                <div class="content">
                    <section id="profile" class="">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{__('localize.your_profile')}}</h4>
                                <ul id="profile_summary">

                                    <li> {{__('localize.name')}} <span>{{$user->full_name}}</span>
                                    </li>

                                    <li>{{__('localize.phone_no')}} <span>{{$user->phone}}</span>
                                    </li>
                                    <li>{{__('localize.email')}} <span>{{$user->email}}</span>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">

                                @if($user->profile_pic !=null)
                                    <img src="{{'/images/user/'.$user->profile_pic}}" alt="Image" width="150px"
                                         class="img-fluid styled profile_pic">
                                @else
                                    <img style="border: 1px solid #E5D390;border-radius: 15px !important;"
                                         src="/template/img/avatar1.jpg" alt="Image" width="150px"
                                         class="img-fluid styled profile_pic">
                                    <br>
                                @endif

                            </div>
                        </div>
                        <!-- End row -->

                        <div class="divider"></div>
                        <form action="/user/profile/update" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Edit profile</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{__('localize.name')}} </label>
                                        <input class="form-control" name="full_name" id="first_name" type="text"
                                               value="{{$user->full_name}}">
                                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                        <input type="hidden" name="id" value="{{$user->id}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('localize.phone_no')}}</label>
                                        <input class="form-control" name="phone" id="last_name" type="text"
                                               value="{{$user->phone}}">
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('localize.email')}}</label>
                                        <input class="form-control" name="email" id="email_2" type="text"
                                               value="{{$user->email}}">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="password" id="password_2" type="text"
                                               value="" placeholder="*****" minlength="8">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('localize.profile_image')}}
                                        </label>
                                        <input class="form-control" name="profile_pic" id="email" type="file"
                                               value="{{$user->profile_pic}}">
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->

                            <hr>
                            <button type="submit" class="btn_1 green">{{__('localize.update_profile')}}</button>

                        </form>


                    </section>


                    <section id="blogs" class="content-current">
                        @include('common.pages.profile.blog_list')

                    </section>

                    <section id="forum" class="">
                        @include('common.pages.profile.forum_list')

                    </section>

                    <!-- End section 1 -->


                    <!-- End section 4 -->
                    {{-- game section start--}}
                    <section id="forum" class="">
                        @include('common.pages.profile.game')

                    </section>

                </div>
                <!-- End content -->
            </div>


        </div>
        <!-- End row-->
    </div>


    <script src="/template/js/tabs.js"></script>
    {
    <script>
        new CBPFWTabs(document.getElementById('tabs'));
    </script>
@stop
