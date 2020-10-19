@extends('layouts.app')

@section('title', 'Create Place')
<style>
    .containercheckbox {
        padding: 3px;
        border: 1px solid #ccc;
        height: 200px;
        overflow-y: scroll;
    }

</style>


@section('content')
    <h3>Edit Advertise image </h3>
    <hr>



    <form action="/admin/advertise/update" method="post" enctype="multipart/form-data">
        <div class="row">
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

                    <label class="font-weight-bold"> Select category</label>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="advertise_id" value="{{$result->advertise_id}}">
                        <div class="containercheckbox">

                            @foreach($categories as $category)
                                <input class="ml-2" type="checkbox" name="category_id[]"

                                       @foreach(json_decode($result->category_id) as $item)

                                       @if($category->blog_category_id==$item)
                                       checked
                                       @endif

                                       @endforeach


                                       value="{{$category->blog_category_id}}"/> {{$category->en_name}} <br/>
                            @endforeach
                        </div>
                    </div>
                    <label class="font-weight-bold"> Upload Image</label>

                    <div class="form-group">

                        <img id="preview" src="/images/advertise_image/{{$result->advertise_image}}" alt="your image" height="150px"  width="100%"/>

                        <input type="file" name="image" id="preview" class="form-control style_2"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-big btn-primary">Update</button>
                    </div>

                </div>
            </div>
        </div>
    </form>



@endsection
