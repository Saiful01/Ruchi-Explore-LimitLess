@extends('layouts.app')

@section('title', 'Update User')


@section('content')
    <h3>Update Place</h3>
    <hr>

    <div class="col-sm-10 col-md-offset-1">
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
            <div class="panel-heading">Update User</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/place/update"
                      enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-3 control-label">Place Name</label>
                                <div class="col-lg-9">
                                    <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" class="form-control" name="place_id"
                                           value="{{$result->place_id}}">
                                    <input type="text" placeholder="" class="form-control" name="place_name"
                                           value="{{$result->place_name}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label">Food Cost</label>
                                <div class="col-lg-9">
                                    <input type="number" placeholder="" class="form-control" name="food_cost"
                                           value="{{$result->food_cost}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label">Other Cost</label>
                                <div class="col-lg-9">
                                    <input type="number" placeholder="" class="form-control" name="other_cost"
                                           value="{{$result->other_cost}}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label">image</label>
                                <div class="col-lg-9">
                                    <input type="file" placeholder="Full Name" class="form-control" name="image"
                                           value="{{$result->image}}"
                                    >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    Accomodation
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id" value="{{$result->id}}">


                                        <input type="number" placeholder="Standard " class="form-control"
                                               name="standard" value="{{$result->standard}}">
                                        <input type="hidden" placeholder="Standard " class="form-control"
                                               name="accommodation_id" value="{{$result->id}}">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">


                                        <input type="number" placeholder="Good" class="form-control"
                                               name="good" value="{{$result->good}}">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <input type="number" placeholder="Excellent" class="form-control"
                                               name="excellent" value="{{$result->excellent}}">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label">specialities</label>
                                    <div class="col-lg-10">
                                    <textarea type="text" placeholder="" class="form-control summernote" rows="10"
                                              name="specialities" {{--data-provide="markdown" rows="10"--}}>{{$result->specialities}}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <?php $j = 0;?>
                            @for($i=1;$i<=8;$i++)
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
                                                       name="bus_regular_price[]" value="{{$data[$j]->regular_price}}">
                                                <input type="hidden" class="form-control" name="bus_transport_id[]"
                                                       value="{{$data[$j]->transport_id}}">
                                                <input type="hidden" class="form-control" value="{{0}}"
                                                       name="from_id[]">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <input type="number" placeholder="Luxury Cost" class="form-control"
                                                       name="bus_luxury_price[]" value="{{$data[$j]->luxury_price}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php $j++;?>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group text-center ">

                                            Train
                                            <input type="hidden" class="form-control" name="train_transport_id[]"
                                                   value="{{$data[$j]->transport_id}}">

                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <input type="number" placeholder="Regular Cost" class="form-control"
                                                       name="train_regular_price[]"
                                                       value="{{$data[$j]->regular_price}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <input type="number" placeholder="Luxury Cost" class="form-control"
                                                       name="train_luxury_price[]" value="{{$data[$j]->luxury_price}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $j++;?>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group text-center ">

                                            Air
                                            <input type="hidden" class="form-control" name="air_transport_id[]"
                                                   value="{{$data[$j]->transport_id}}">

                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <input type="number" placeholder="Regular Cost" class="form-control"
                                                       name="air_regular_price[]" value="{{$data[$j]->regular_price}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <input type="number" placeholder="Luxury Cost" class="form-control"
                                                       name="air_luxury_price[]" value="{{$data[$j]->luxury_price}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $j++;?>
                            @endfor
                        </div>
                    </div>


                    <div class="form-group row">

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-big btn-primary btn-block">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script>
        function jsfunc1() {

            if (document.getElementById('designation').value == "Other") {
                document.getElementById("designation2").style.display = 'block';
            } else {
                document.getElementById("designation2").style.display = 'none';
            }
        }
    </script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"
          rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
        $('#datepicker').datepicker({
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
        });
        $('#datepicker').datepicker("setDate", new Date());
    </script>
@endsection
