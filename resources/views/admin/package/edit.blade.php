@extends('layouts.app')

@section('title', 'Create Place')


@section('content')
    <h3>Package Edit</h3>
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
            <div class="panel-heading">Package Edit</div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" action="/admin/package/update"
                      enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Select Company</label>
                        <div class="col-lg-9">
                            <select  class="form-control" name="company_id">
                                @foreach($company as $category)
                                    <option value="{{$category->company_id}}" @if($category->company_id == $result->company_id) selected @endif> {{$category->company_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Title</label>
                        <div class="col-lg-9">
                            <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" class="form-control" name="package_id" value="{{$result->package_id}}">
                            <input type="text" placeholder="" class="form-control" value="{{$result->title}}" name="title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Price</label>
                        <div class="col-lg-9">

                            <input type="text" placeholder="" class="form-control" name="price" value="{{$result->price}}">
                        </div>
                    </div>




                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Duration(Days)</label>
                        <div class="col-lg-9">

                            <input type="number" placeholder="" class="form-control" name="duration" value="{{$result->duration}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label"> Details</label>
                        <div class="col-lg-9">
                                     <textarea name="details" class="form-control style_2 summernote"
                                               placeholder="Blog Details" required>{!! $result->details !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Image(350*250PX)</label>
                        <div class="col-lg-9">
                            <input type="file" placeholder="" class="form-control" name="image">
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-big btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


@endsection
