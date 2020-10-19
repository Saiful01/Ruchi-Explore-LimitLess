@extends('layouts.app')

@section('title', 'Create Advertise image')
<style>
    .containercheckbox {
        padding: 3px;
        border: 1px solid #ccc;
        height: 200px;
        overflow-y: scroll;
    }

</style>


@section('content')
    <h3>Create Advertise image </h3>
    <hr>



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

                <form action="/admin/advertise/store" method="post" enctype="multipart/form-data">
                   <div class="row">
                       <div class="col-md-6">

                           <div class="form-group">
                               <label class="font-weight-bold"> Select category</label>
                               <input type="hidden" name="_token" value="{{csrf_token()}}">
                               <div class="containercheckbox">

                                   @foreach($categories as $category)
                                       <input class="ml-2" type="checkbox" name="category_id[]"
                                              value="{{$category->blog_category_id}}"/> {{$category->en_name}} <br/>
                                   @endforeach
                               </div>
                           </div>

                       </div>
                       <div class="col-md-6">


                           <div class="form-group">
                               <label class="font-weight-bold"> Upload Image</label>
                               <img id="preview" src="#" alt="your image" height="150px" width="100%"/>
                               <input type="file" name="image" id="preview" class="form-control style_2"/>
                           </div>
                       </div>

                       <div class="form-group">
                           <button type="submit" class="btn btn-big btn-primary">Save</button>
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>




@endsection
