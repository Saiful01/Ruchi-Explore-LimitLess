@extends('layouts.app')

@section('title', 'Create Spot')


@section('content')
    <h3>Create Tourist Spot  </h3>
    <hr>

    <div class="col-sm-12">
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
        <div class="panel panel-default">
            <div class="panel-heading">Add Tourist Spot</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/tourist-spot/store"
                      enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Select Category</label>
                        <div class="col-lg-9">
                            <select  class="form-control" name="spot_category_id">
                                @foreach($categories as $category)
                                <option value="{{$category->spot_category_id}}"> {{$category->en_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Spot  Eng Name</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="" class="form-control" name="spot_name"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Spot BN Name</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="" class="form-control" name="spot_bn_name"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Spot details</label>
                        <div class="col-lg-9">
                                    <textarea type="text" placeholder="" class="form-control"
                                              name="spot_details" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Address</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Latitude</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="lat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Longitude</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="lon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Featured Image </label>
                        <div class="col-lg-9">

                            <input type="file" placeholder="" class="form-control" name="featured_image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-big btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
