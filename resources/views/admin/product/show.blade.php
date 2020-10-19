@extends('layouts.app')

@section('title', 'Blog Categories')


@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Product Table</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/admin/dashboard">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Product  Table</strong>
                </li>
                <li class="breadcrumb-item active">
                    <a href="/admin/product/create" class="button"><strong>Add product</strong></a>
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
                        <h5>Product Table</h5>
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
                                    <th>Product Name</th>
                                    <th>Product details</th>
                                    <th>Product Avialble</th>
                                    <th>Product URL Link</th>
                                    <th>Product Price</th>
                                    <th>Product Image</th>

                                    <th>Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($result as $result)
                                    <tr class="gradeU">
                                        <td>{{$i++}}</td>
                                        <td>{{$result->product_category_name}}</td>
                                        <td>{{$result->product_name}}</td>
                                        <td>{{$result->product_details}}</td>
                                        <td>{{$result->available_in}}</td>
                                        <td>{{$result->url_link}}</td>
                                        <td>{{$result->Product_price}}</td>
                                        <td>
                                            <img src="/images/product/{{$result->product_image}}" width="100px" alt="image">

                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                           href="/admin/product/edit/{{$result->product_id}}">Edit</a></li>
                                                    <li><a class="dropdown-item"
                                                           href="/admin/product/delete/{{$result->product_id}}">Delete</a></li>
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
