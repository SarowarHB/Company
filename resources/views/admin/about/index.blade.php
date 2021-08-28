@extends('admin.admin_master')


@section('admin')


    <div class="py-12">

        <div class="container">
            <div class="row">
            <div class="col-md-12">
                    <br></br>
                <div class="cart">
                    <h3>Add About</h3>
                   <a href="{{route('add.about')}}"><button type="button" class="btn btn-info">Add About</button></a>
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

                     <div class="cartHeader">All About</div>

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="5%" >SL Num</th>
                                <th scope="col" width="10%" >About Title</th>
                                <th scope="col" width="10%" >Short Discription</th>
                                <th scope="col" width="25%" >Long Discription</th>
                                <th scope="col" width="15%" >action</th>
                                </tr>
                            </thead>

                            <tbody>  


                            @php($i=1)
                     
                            @foreach($abouts as $about)
                            

                                <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{ $about->title}}</td>
                                <td>{{ $about->short_dis}}</td>
                                <td>{{ $about->long_dis}}</td>
                                
                                <td>
                                    <a href="{{url('about/edit/'.$about->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('about/delete/'.$about->id)}}" onClick="return confirm('are You Sure')" class="btn btn-danger">Delete</a>
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
