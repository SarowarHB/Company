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

                    <div class="cartHeader">All Contact</div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">SL Num</th>
                                <th scope="col" width="45%">image</th>
                                <th scope="col" width="10%">action</th>
                            </tr>
                        </thead>

                        <tbody>


                            @php($i=1)


                            @foreach($images as $image)

                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td><img src="{{asset($image->image)}}" style="width: 300px; height: 200px;" /> </td>

                                <td>
                                    <a href="{{url('image/delete/'.$image->id)}}"
                                        onClick="return confirm('are You Sure')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>

                    </table>




                </div>
            </div>


            <div class="col-md-4">
                <div class="cart">
                    <h2>Add Protfolio</h2>
                    <div class="catBody">

                        <form action="{{ route('store.image')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Application type</label>
                                <input type="text" class="form-control" name="type" id="exampleFormControlInput1"
                                    placeholder="web/wpp/card"">

                            </div>
                            <div class="form-group">

                                <label for="inputEmail3">Image Name</label><br></br>
                                <input type="file" name="image" class="form-control" id="inputEmail3" multiple="">

                                @error('image')
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



<!---Trashed Part--->

@endsection
