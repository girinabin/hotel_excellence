@extends('cd-admin.admin')
  @section('title')
    Add Carousel
  @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-wraper">
  <section class="content-header">
    <h1>
      Carousel
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewcarousel')}}">Carousel</a><b>-></b>Add</li>
    </ol>
  </section>
  <section class="content">
  <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10 box1">
    <div class="box box-default">
      <div class="box-header text text-center">
        <h1 class="box-title "><h2>Add Carousel</h2></h1>
      </div>
      <div class="box-body">
        <!-- Date dd/mm/yyyy -->
        <form action="{{route('add-carousel')}}"  enctype="multipart/form-data" method="POST">
          @csrf
          <div class="form-group ">
            <label>Carousel Name:</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}">
            @error('name')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
            <!-- /.input group -->
          </div>

          <div class="form-group ">
            <label>Carousel Image:</label>
              <input type="file" class="form-control" name="c_image" value="{{old('c_image')}}" >
            <!-- /.input group -->
             @error('c_image')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->


          <div class="form-group ">
            <label>Alt Carousel Image:</label>
              <input type="text" class="form-control" name="alt_image" value="{{old('alt_image')}}">
            <!-- /.input group -->
             @error('alt_image')
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
            <button class="btn btn-primary" type="submit">Add Carousel</button>
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