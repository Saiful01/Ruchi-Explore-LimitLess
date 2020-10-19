@extends('layouts.app')

@section('title', 'All Forum')


@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Slider Tables</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Slider</strong>
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
                       <a href="/admin/slider/create" class="btn btn-primary pull-right">Create</a>
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
                                    <th>English Title</th>
                                    <th>English Subtitle</th>
                                    <th>Bangla Title</th>
                                    <th>Bangla Subtitle</th>
                                    {{--  <th>Details</th>--}}
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($result as $res)
                                    <tr class="gradeU">
                                        <td>{{$i++}}</td>
                                        <td>{{$res->bn_title}}</td>
                                        <td>{{$res->en_title}}</td>
                                        <td>{{$res->en_sub_title}}</td>

                                        <td>{{$res->bn_sub_title}}</td>
                                        <td>
                                            <img src="/template/img/slides/{{$res->slider_name}}" width="100px">
                                        </td>


                                        <td>
                                            <a class="btn btn-success"
                                               href="/admin/slider/edit/{{$res->slider_id}}">Edit</a>
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
