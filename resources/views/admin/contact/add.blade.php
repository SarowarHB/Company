@extends('admin.admin_master')


@section('admin')

<div class="col-lg-8">
    <div class="card card-default">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-header card-header-border-bottom">
            <h2>Contact Input</h2>
        </div>
        <div class="card-body">

            <form action="{{route('store.contact')}}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="exampleFormControlInput1"
                        placeholder="Enter Phone">

                </div>

               
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                        placeholder="Enter Email">

                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>



</div>
@endsection
