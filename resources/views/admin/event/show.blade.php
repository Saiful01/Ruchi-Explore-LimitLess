@extends('layouts.app')

@section('title', 'All Events')


@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Events Table</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Events</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Event Table</strong>
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
                    <div class="ibox-title">
                        <h5>Event Table</h5>
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
                                    <th>Title English</th>
                                    <th>Title Bangla</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Address</th>
                                    <th>Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($result as $res)
                                    <tr class="gradeU">
                                        <td>{{$i++}}</td>
                                        <td>{{$res->event_title_en}}</td>
                                        <td>{{$res->event_title_bn}}</td>
                                        <td>{{$res->event_starting_date}}</td>
                                        <td>{{$res->event_ending_date}}</td>
                                        <td>{{$res->event_title_bn}}</td>




                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                           href="/admin/event/edit/{{$res->id}}">Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                           href="/admin/event/delete/{{$res->id}}">Delete</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                           href="/admin/event/details/{{$res->id}}">Event Details </a>
                                                    </li>
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
