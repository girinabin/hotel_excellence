@extends('cd-admin.admin')
    @section('title')
    Add Feedback
  @endsection
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
  <h1>
  Feedback
  </h1>
  <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/feedback')}}">Feedback</a><b>-></b>add</li>
  </ol>
</section>
<!-- @if($errors->any())
@foreach($errors->any() as $e)
  <div class="text text-danger">
      <li>{{$e}}</li>
  </div>
@endforeach
@endif -->

<section class="content">
  <form action="{{route('add_feedback')}}" method="POST">
    @csrf
   <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10 box1">
      <div class="box box-default">
        <div class="box-header text text-center">
          <h1 class="box-title "><h2>ADD FEEDBACK</h2></h1>
        </div>
        <div class="box-body">
          <!-- Date dd/mm/yyyy -->
          <div class="form-group test1">
            <label>Email ID:</label>
              <input type="email" class="form-control"  name="email" placeholder="Dummy@email.com">
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <!-- Add Alternate of image -->
          <div class="form-group test1" >
            <label>Message</label>
              <textarea cols="145" rows="10" class="form-control" name="message"></textarea>
            <!-- /.input group -->
          </div>

       

          <hr>
          <div class="row">
            <div class="col-md-4 test1">
            </div>
            <div class="col-md-4">

              <a href=""><button class="btn btn-primary  test1" type="submit"><b>Send Message</b></button></a>

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
<!-- /.box -->
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