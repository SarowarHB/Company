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
                        <div class="cartHeader">Edit Brand</div>
                        <div class="catBody">

                        <form action="{{ url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                                <div class="form-group">
                                
                                    <label for="inputEmail3">Edit Brand Name</label><br></br>  
                                    
                                    <input type="text" name="brand_name" class="form-control" id="inputEmail3"
                                     value="{{$brands->brand_name}}">
                                   

                                    @error('brand_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                
                                    <label for="inputEmail3">Edit Brand Image</label><br></br>  
                                    
                                    <input type="file" name="brand_image" class="form-control" id="inputEmail3"
                                     value="{{$brands->brand_image}}">
                                   

                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                               
                                <button type="submit" class="btn btn-primary">Edit Brand</button>
                                <br></br>

                                <div class="form-group">
                                <h3>Current Image</h3>
                                    <img src="{{asset($brands->brand_image)}}" style="width: 400px; height: 300px" ></img>

                                </div>




                                


                     </form>
                     </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection	
