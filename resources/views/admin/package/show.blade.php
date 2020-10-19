@extends('layouts.app')

@section('title', 'Package')


@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Package</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Package</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <a href="/admin/package/create" class="btn btn-primary pull-right">Create</a>
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
                                <th>Company Name</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Duration</th>
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
                                    <td>{{$res->company_title}}</td>
                                    <td>{{$res->title}}</td>

                                     <td>{!! $res->details  !!}</td>
                                    <td>{{$res->price}}</td>
                                    <td>{{$res->duration}}</td>
                                    <td>
                                        <img src="/images/package/{{$res->package_image}}" width="100px">
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
                                                       href="/admin/package/edit/{{$res->package_id}}">Edit</a></li>
                                                <li><a class="dropdown-item"
                                                       href="/admin/package/delete/{{$res->package_id}}">Delete</a></li>
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
