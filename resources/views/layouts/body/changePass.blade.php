@extends('admin.admin_master')


@section('admin')

<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Change Password</h2>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card-body">
            <form action="{{route('update.password')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationServer01">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="oldPassword"
                            placeholder="Current Password" value="" required="">
                            @error('current_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServer02">New Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="New Password" required="">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationServerUsername">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Confirm Password"
                            aria-describedby="inputGroupPrepend3" required="">
                            @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        <div class="invalid-feedback">
                           
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">save</button>
            </form>
        </div>
    </div>
</div>
@endsection
