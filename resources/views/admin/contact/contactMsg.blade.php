@extends('admin.admin_master')


@section('admin')


    <div class="py-12">

        <div class="container">
            <div class="row">
            <div class="col-md-12">
                    <br></br>
                <div class="cart">
                    <h3>Show Message</h3>
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

                     <div class="cartHeader">All Message</div>

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="5%" >SL Num</th>
                                <th scope="col" width="10%" >Name</th>
                                <th scope="col" width="15%" >Email</th>
                                <th scope="col" width="15%" >Subject</th>
                                <th scope="col" width="25%" >Message</th>
                                <th scope="col" width="15%" >action</th>
                                </tr>
                            </thead>

                            <tbody>  


                            @php($i=1)
                     
                            @foreach($msgs as $msg)
                            

                                <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{ $msg->name}}</td>
                                <td>{{ $msg->email}}</td>
                                <td>{{ $msg->subject }}</td>
                                <td>{{ $msg->message }}</td>
                                
                                <td>
                                    <a href="{{url('message/delete/'.$msg->id)}}" onClick="return confirm('are You Sure')" class="btn btn-danger">Delete</a>
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
