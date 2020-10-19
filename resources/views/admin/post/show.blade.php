@extends('layouts.app')

@section('title', 'All Forum')


@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Blog Post Tables</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Blog Post</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">

                    <div class="ibox-content">

                        <form class="form-inline" method="post" action="/blog/post"
                              enctype="multipart/form-data">

                            <div class="form-group row">
                                <div class="">

                                    <label>
                                        <input type="text" class="form-control" name="query" placeholder="Search">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="">
                                    <select class="form-control" name="category_id">
                                        <option value="All">All</option>
                                       {{-- @foreach($categories as $category)
                                            <option value="{{$category->category_id}}">{{$category->category_bn}}</option>
                                        @endforeach--}}
                                    </select>

                                    <input type="hidden" class="form-control" name="_token"
                                           value="{{csrf_token()}}">
                                </div>
                            </div>


                            <div class="form-group mb-0 justify-content-end row">
                                <div class="col-10">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Search
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        {{--                        <h5>Basic Data Tables example with responsive plugin</h5>--}}
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @if(session('success'))

                            <div class="alert alert-success">{{session('success')}}!</div>

                        @endif
                        @if(session('failed'))
                            <div class="alert alert-danger">
                                {{session('failed')}}!
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Title</th>
                                    {{--  <th>Details</th>--}}
                                    <th>Image</th>
                                    <th>Publish Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($result as $res)
                                    <tr class="gradeU">
                                        <td>{{$i++}}</td>
                                        <td>
                                            <?php
                                            $categories = json_decode($res->category_id);
                                            if ($categories != null) {
                                                foreach ($categories as $category) {
                                                    echo gettingCategoryIdtoValue($category);
                                                    echo ", <br>";
                                                }
                                            }
                                            ?>

                                        </td>
                                        <td>{{$res->blog_title}}</td>

                                        {{--  <td>{!! $res->blog_details  !!}</td>--}}
                                        <td>
                                            <img src="/images/blog/{{$res->featured_image}}" width="100px">
                                        </td>
                                        <td>@if($res->publish_status==true) <span
                                                    class="badge badge-success">Published</span> @else
                                                <span class="badge badge-warning">UnPublished</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                           href="/blog/unpublished/{{$res->blog_id}}">UnPublished</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                           href="/blog/published/{{$res->blog_id}}">Published</a></li>
                                                    <li><a class="dropdown-item"
                                                           href="/post/edit/{{$res->author_id}}">Edit</a></li>
                                                    <li><a class="dropdown-item"
                                                           href="/post/delete/{{$res->author_id}}">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>


                                    </tr>
                                @endforeach


                                </tbody>


                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
