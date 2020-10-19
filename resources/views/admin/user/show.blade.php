@extends('layouts.app')

@section('title', 'All User')


@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Admin / User List</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Admin / User Table</strong>
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
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>php
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

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($result as $res)
                                    <tr class="gradeU">
                                        {{--<td>{{$res->id}}</td>--}}
                                        <td>{{$res->full_name}}</td>
                                        <td>{{$res->email}}</td>
                                        <td>{{$res->phone}}</td>
                                        <td>
                                            @if($res->is_active)
                                               Active
                                            @else
                                                Inactive
                                            @endif

                                        </td>
                                        <td>
                                            @if($res->is_active)
                                                <a href="/admin/user/status-update/{{$res->id}}/0">Deactivate</a>
                                            @else
                                                <a href="/admin/user/status-update/{{$res->id}}/1">Activate</a>
                                            @endif

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
