@extends('admin.admin_master')


@section('admin')


<div class="py-12">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container">
        <div class="row">


            <div class="col-md-8">
                <div class="cart">
                    <div class="cartHeader">Edit Slider</div>
                    <div class="catBody">

                        <form action="{{ url('slider/update/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{$sliders->image}}">
                            <div class="form-group">

                                <label for="inputEmail3">Edit Slider Title</label><br></br>

                                <input type="text" name="title" class="form-control" id="inputEmail3"
                                    value="{{$sliders->title}}">


                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="inputEmail3">Edit Slider Discription</label><br></br>
                                <textarea class="form-control" name="discription" id="exampleFormControlTextarea1"
                        rows="3"> {{$sliders->discription}}</textarea>
                                   

                                @error('discription')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>

                            <div class="form-group">
                                
                                <label for="inputEmail3">Edit Brand Image</label><br></br>  
                                
                                <input type="file" name="image" class="form-control" id="inputEmail3"
                                 value="{{$sliders->image}}">
                               

                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Edit Slider</button>
                            <br></br>

                            <div class="form-group">
                                <h3>Current Image</h3>
                                <img src="{{asset($sliders->image)}}" style="width: 400px; height: 300px"></img>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
