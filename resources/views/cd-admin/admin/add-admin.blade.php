@extends('cd-admin.admin')
@section('title')
Add Admin
@endsection
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
  <h1>
    Admin
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewadmin')}}">Admin</a><b>-></b>Add</li>
  </ol>
</section>
<section class="content">

   <form action="{{route('add-admin')}}" method="POST">
   <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10 box1">
      <div class="box box-default">
        <div class="box-header text text-center">
          <h1 class="box-title "><h2>ADD Admin</h2></h1>
        </div>
        <div class="box-body">
          <!-- Date dd/mm/yyyy -->
          <div class="form-group test1">
            <label>Name:</label>
            <input type="text" class="form-control"  name="name" value="{{old('name')}}">
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <!-- Add Alternate of image -->
          <div class="form-group test1" >
            <label>Email:</label>
              <input type="email" name="email" value="{{old('email')}}" class="form-control">
            <!-- /.input group -->
          </div>
           <div class="form-group test1" >
            <label>Password:</label>
              <input type="password" name="password" value="{{old('password')}}" class="form-control">
            <!-- /.input group -->
          </div>

           <div class="form-group test1" >
            <label>Confirm Password:</label>
              <input type="password" name="confirm_password" value="{{old('confirm_password')}}" class="form-control">
            <!-- /.input group -->
          </div>


       

          <hr>
          <div class="row">
            <div class="col-md-4 test1">
            </div>
            <div class="col-md-4">

              <a href=""><button class="btn btn-primary  test1" type="submit"><b>Add Admin</b></button></a>

            </div>
            <div class="col-md-4">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="col-md-1"></div>
@csrf
</form>
</section>


<style type="text/css">
  .test1 
  {
    margin-left:15px;
    margin-right: 15px; 
  }
  .box1
  {
    margin-bottom: 15px;
    margin-top: 15px;
  }
</style>
@endsection