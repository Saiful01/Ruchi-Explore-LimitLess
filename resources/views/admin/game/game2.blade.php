@extends('layouts.app')

@section('title', 'Game 2')


@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Game Score List</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Game Score List</strong>
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
                        <a href="/admin/result/game-1" class="btn btn-primary">Game 1</a>
                        <a href="/admin/result/game-2" class="btn btn-success">Game 2</a>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Time</th>
                                    <th>Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($result as $res)
                                    <tr class="gradeU">
                                        <td>{{$res->gamer_id}}</td>
                                        <td>{{$res->full_name}}</td>
                                        <td>{{$res->time}}</td>
                                        <td>{{$res->score}}</td>

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
