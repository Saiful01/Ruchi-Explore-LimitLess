@extends('layouts.app')

@section('title', 'All User')


@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Tables</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Data Tables</strong>
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
                        <h5></h5>
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
                                    <th>Place Name</th>
                                    <th>Specialities</th>
                                    <th>Food Cost</th>
                                    <th>Other Cost</th>
                                    <th>Transport</th>
                                    <th>Accommodation</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($result as $res)
                                    <tr class="gradeU">
                                        <td>{{$i++}}</td>
                                        <td>{{$res->place_name}}</td>
                                        <td>{{$res->specialities}}</td>
                                        <td>{{$res->food_cost}}</td>
                                        <td>{{$res->other_cost}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#myModal{{$res->place_id}}">Show
                                            </button>

                                            <div class="modal inmodal fade" id="myModal{{$res->place_id}}" tabindex="-1"
                                                 role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span><span
                                                                    class="sr-only">Close</span></button>
                                                            <h4>Trasnport Details</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>From</th>
                                                                    <th>Type</th>
                                                                    <th>Regular</th>
                                                                    <th>Luxury</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach(getTransportData($res->place_id) as $transport)

                                                                    <tr>
                                                                        <td class="text-danger">{{getDivisionName($transport->from_id)}}</td>
                                                                        <td>{{getTransportTypeById($transport->transport_type)}}</td>

                                                                        <td>{{$transport->regular_price}}</td>
                                                                        <td>{{$transport->luxury_price}}</td>

                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        {{-- <div class="modal-footer">
                                                             <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                         </div>--}}
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            Economy: {{$res->standard}}<br>
                                            Mid-Range: {{$res->good}}<br>
                                            Excellent: {{$res->excellent}}<br>

                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                           href="/admin/place/edit/{{$res->place_id}}">Edit</a></li>
                                                    <li><a class="dropdown-item"
                                                           href="/admin/place/delete/{{$res->place_id}}">Delete</a></li>
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
