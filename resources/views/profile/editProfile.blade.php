@extends('layouts.app')

    @section('content')
    
      <div class="container">
          <h1>Edit Profile</h1>
        	<hr>
      	<div class="row">
            <!-- left column -->
            <div class="col-md-3">
              <div class="text-center">
                <img src="{{ asset('img/avatar.jpg') }}" class="avatar img-circle" alt="avatar">
                <h6>Upload a different photo...</h6>
                
                <input type="file" class="form-control">
              </div>
            </div>
            
            <!-- edit form column -->
            <div class="col-md-9">
              <h3>Personal info</h3>
              
              <form class="form-horizontal" role="form" action="/profile" method="post">
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('FirstName') ? ' has-error' : '' }}">
                  <label class="col-lg-3 control-label">First name:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="firstName" value="{{$user->firstName}}">
                  </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="col-lg-3 control-label">Last name:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="lastName" value="{{$user->name}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Email:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="email" value="{{$user->email}}">
                  </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="col-md-3 control-label">Password:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Confirm password:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" name="password_confirmation">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="col-md-8">
                    <input type="submit" class="btn btn-primary" value="Save Changes">
                    <span></span>
                    <input type="reset" class="btn btn-default" value="Cancel">
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
      <hr>
  @endsection