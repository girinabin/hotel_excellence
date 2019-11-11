@extends('cd-admin.admin')
@section('title')
Add Tailored Program
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-wraper">
  <section class="content-header">
    <h1>
      Tailored Programs
    </h1>
    <ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewtailored')}}">Tailored</a><b>-></b>Add</li>
    </ol>
  </section>
  <section class="content">

 <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10 box1">
    <div class="box box-default">
      <div class="box-header text text-center">
        <h1 class="box-title "><h2>Add Tailored Program</h2></h1>
      </div>
      <div class="box-body">
        <!-- Date dd/mm/yyyy -->
        <form action="{{route('add-tailor')}}"  enctype="multipart/form-data" method="POST">
          @csrf
          <div class="form-group ">
            <label>Tailor Program Name:</label>
              <input type="text" class="form-control" name="name" value="{{old('room_title')}}">
            @error('name')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <div class="form-group ">
            <label>Tailored Image:</label>
              <input type="file" class="form-control" name="t_image" value="{{old('t_image')}}">
            <!-- /.input group -->
             @error('t_image')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->


          <div class="form-group ">
            <label>Alt Image:</label>
              <input type="text" name="alt_image" value="{{old('alt_image')}}" class="form-control">
            <!-- /.input group -->
             @error('alt_image')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->

          <div class="form-group ">
            <label>Summary:</label>
              <input type="text" class="form-control" name="summary" value="{{old('summary')}}" >
            <!-- /.input group -->
             @error('summary')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->


         
          <div class="form-group ">
            <label>Status:</label>

            <div class="input-group">
              
              <input type="radio" name="status" value="active"<?php echo old('status') == 'active'?'checked':''?>>Active
              <input type="radio" name="status" value="inactive"<?php echo old('status') == 'inactive'?'checked':''?>>Inactive

            </div>
            <!-- /.input group -->
             @error('status')
             
            <div class="text text-danger" style="color: red;">{{ $message }}</div>
          
            @enderror
        </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <button class="btn btn-primary" type="submit">Add Tailored Program</button>
          </div>
          <div class="col-md-4"></div>
        </form>
            <a href="{{URL()->Previous()}}"><button class="btn btn-warning">Cancel</button></a>
      </div>
    </div>
  </div>


  <div class="col-md-1"></div>




</section>
</div>


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