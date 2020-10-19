@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Create Place</h3>
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
            <div class="panel-heading">New Place</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/place/store"
                      enctype="multipart/form-data">


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-3 control-label">Place Name</label>
                                <div class="col-lg-9">
                                    <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                                    <input type="text" placeholder="" class="form-control" name="place_name"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label">Food Cost</label>
                                <div class="col-lg-9">
                                    <input type="number" placeholder="" class="form-control" name="food_cost"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label">Other Cost</label>
                                <div class="col-lg-9">
                                    <input type="number" placeholder="" class="form-control" name="other_cost"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label">image</label>
                                <div class="col-lg-9">
                                    <input type="file" placeholder="Full Name" class="form-control" name="image"
                                    >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    Accomodation
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <input type="number" placeholder="Standard " class="form-control"
                                               name="standard">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">


                                        <input type="number" placeholder="Good" class="form-control"
                                               name="good">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <input type="number" placeholder="Excellent" class="form-control"
                                               name="excellent">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label">specialities</label>
                                <div class="col-lg-10">
                                    <textarea type="text" placeholder="" class="form-control summernote" rows="10"
                                              name="specialities" {{--data-provide="markdown" rows="10"--}}></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">


                            @for($i=1;$i<=8;$i++)

                                <div id="dhaka">

                                    <h4>{{getDivisionName($i)}} To Destination</h4>

                                    <div class="row">

                                        <div class="col-md-2">
                                            <div class="form-group text-center ">
                                                Bus
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="number" placeholder="Regular Cost" class="form-control"
                                                           name="bus_regular_price[]">
                                                    <input type="hidden" class="form-control" value="{{$i}}" name="from_id[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="number" placeholder="Luxury Cost" class="form-control"
                                                           name="bus_luxury_price[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group text-center ">

                                                Train
                                                <input type="hidden" placeholder="Regular Cost" class="form-control"
                                                       name="transport_type">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="number" placeholder="Regular Cost" class="form-control"
                                                           name="train_regular_price[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="number" placeholder="Luxury Cost" class="form-control"
                                                           name="train_luxury_price[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group text-center ">

                                                Air
                                                <input type="hidden" placeholder="Regular Cost" class="form-control"
                                                       name="transport_type">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="number" placeholder="Regular Cost" class="form-control"
                                                           name="air_regular_price[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <input type="number" placeholder="Luxury Cost" class="form-control"
                                                           name="air_luxury_price[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endfor

                        </div>


                    </div>


                    <div class="form-group row">

                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-big btn-primary btn-block pull-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
