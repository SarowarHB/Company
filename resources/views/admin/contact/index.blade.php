@extends('admin.admin_master')


@section('admin')


    <div class="py-12">

        <div class="container">
            <div class="row">
            <div class="col-md-12">
                    <br></br>
                <div class="cart">
                    <h3>Add Contact</h3>
                   <a href="{{route('add.contact')}}"><button type="button" class="btn btn-info">Add Contact</button></a>
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

                     <div class="cartHeader">All Contact</div>

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="5%" >SL Num</th>
                                <th scope="col" width="25%" >Address</th>
                                <th scope="col" width="10%" >Phone</th>
                                <th scope="col" width="10%" >Email</th>
                                <th scope="col" width="15%" >action</th>
                                </tr>
                            </thead>

                            <tbody>  


                            @php($i=1)
                     
                            @foreach($contacts as $contact)
                            

                                <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{ $contact->address}}</td>
                                <td>{{ $contact->phone}}</td>
                                <td>{{ $contact->email}}</td>
                                
                                <td>
                                    <a href="{{url('image/edit/'.$contact->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('image/delete/'.$contact->id)}}" onClick="return confirm('are You Sure')" class="btn btn-danger">Delete</a>
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
