@extends('admin.admin_master')


@section('admin')


    <div class="py-12">

        <div class="container">
            <div class="row">
            <div class="col-md-12">
                    <br></br>
                <div class="cart">
                    <h3>Add Service</h3>
                   <a href="{{route('add.service')}}"><button type="button" class="btn btn-info">Add Slider</button></a>
                   </div>
                 </div>
            </div>
            <br></br>
                <div class="col-md-12">
                    <div class="cart">

                   


                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                     <div class="cartHeader">All Service</div>

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="5%" >SL Num</th>
                                <th scope="col" width="10%" >Service Title</th>
                                <th scope="col" width="20%" >Discription</th>
                                <th scope="col" width="15%" >Image</th>
                                <th scope="col" width="15%" >action</th>
                                </tr>
                            </thead>

                            <tbody>  


                            @php($i=1)
                     
                            @foreach($services as $service)
                            

                                <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{ $service->title}}</td>
                                <td>{{ $service->desc }}</td>
                                <td> <img src="{{asset($service->image)}}" style="width: 50px; height: 50px;" /></td>
                                
                                <td>
                                    <a href="{{url('service/edit/'.$service->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('service/delete/'.$service->id)}}" onClick="return confirm('are You Sure')" class="btn btn-danger">Delete</a>
                                </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
               

                   </div>
                </div>

                
        </div>
    </div>


@endsection
