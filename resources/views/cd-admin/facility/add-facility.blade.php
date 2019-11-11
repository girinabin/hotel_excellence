@extends('cd-admin.admin')
    @section('title')
    Add Facility
  @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-wraper">
  <section class="content-header">
    <h1>
      Facility
    </h1>
    <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewfacility')}}">Facility</a><b>-></b>Add</li>
    </ol>
  </section>
  <section class="content">

 <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10 box1">
    <div class="box box-default">
      <div class="box-header text text-center">
        <h1 class="box-title "><h2>Add Facility</h2></h1>
      </div>
      <div class="box-body">
        <!-- Date dd/mm/yyyy -->
        <form action="{{route('add-facility')}}"  enctype="multipart/form-data" method="POST">
          @csrf
          <div class="form-group ">
            <label>Facility Name:</label>
              <input type="text" class="form-control" name="facility_name" value="{{old('facility_name')}}">
            @error('facility_name')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <div class="form-group ">
            <label>Facility Image:</label>
              <input type="file" name="facility_image" class="form-control" value="{{old('facility_image')}}">
            <!-- /.input group -->
             @error('facility_image')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->
      <div class="form-group ">
            <label>Alt Image:</label>
              <input type="text" class="form-control" name="image_alt" value="{{old('image_alt')}}">
            <!-- /.input group -->
             @error('image_alt')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->

          <div class="form-group ">
            <label>SEO Title:</label>
              <input type="text" class="form-control" name="seo_title" value="{{old('seo_title')}}">
            <!-- /.input group -->
             @error('seo_title')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->

          <div class="form-group ">
            <label>SEO Description:</label>
              <textarea type="text" class="form-control" name="seo_description">
                </textarea>
            <!-- /.input group -->
             @error('seo_description')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->

          <div class="form-group ">
            <label>SEO Keyword:</label>

           
              <input type="text" class="form-control" name="seo_keyword" value="{{old('seo_keyword')}}">
            <!-- /.input group -->
             @error('seo_keyword')
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
            <button class="btn btn-primary" type="submit">Add Facility</button>
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