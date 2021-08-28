@extends('admin.admin_master')


@section('admin')


<div class="py-12">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="cart">


                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="cartHeader">All Brand</div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL Num</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created At</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach($brands as $brand)


                            <tr>
                                <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                                <td>{{ $brand->brand_name}}</td>
                                <td> <img src="{{asset($brand->brand_image)}}" style="width: 40px; height: 40px;" />
                                </td>
                                <td>{{ $brand->created_at}}</td>
                                <td>
                                    <a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('brand/delete/'.$brand->id)}}"
                                        onClick="return confirm('are You Sure')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{$brands->links()}}

                </div>
            </div>

            <div class="col-md-4">
                <div class="cart">
                    <div class="cartHeader">Add Brand</div>
                    <div class="catBody">

                        <form action="{{ route('store.brand')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                                <label for="inputEmail3">Brand Name</label><br></br>

                                <input type="text" name="brand_name" class="form-control" id="inputEmail3">


                                @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror


                            </div>
                            <br></br>
                            <div class="form-group">

                                <label for="inputEmail3">Brand Image</label><br></br>

                                <input type="file" name="brand_image" class="form-control" id="inputEmail3">


                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror


                            </div>

                            <button type="submit" class="btn btn-primary">Add Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
