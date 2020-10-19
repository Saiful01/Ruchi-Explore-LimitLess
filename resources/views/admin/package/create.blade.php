@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Package Create</h3>
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
            <div class="panel-heading">Package Create</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/package/store"
                      enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Select Company</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="company_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->company_id}}"> {{$category->company_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Title</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="text" placeholder="" class="form-control" name="title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Price</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="price">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Duration(Days)</label>
                        <div class="col-lg-9">

                            <input type="number" placeholder="" class="form-control" name="duration">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Details</label>
                        <div class="col-lg-9">
                                   <textarea name="details" class="form-control style_2 summernote"
                                             placeholder="Blog Details" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Image(350*250PX)</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="image">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-big btn-primary">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>


@endsection
