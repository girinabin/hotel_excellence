@extends('cd-admin.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-wraper">
  <section class="content-header">
    <h1>
      Gallery
    </h1>
    <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewgallery')}}">Gallery</a><b>-></b>Add</li>
    </ol>
  </section>
  <section class="content">
 
 <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10 box1">
    <div class="box box-default">
      <div class="box-header text text-center">
        <h1 class="box-title "><h2>Add Gallery</h2></h1>
      </div>
      <div class="box-body">
        <!-- Date dd/mm/yyyy -->
        <form action="{{route('add-gallery')}}"  enctype="multipart/form-data" method="POST">
          @csrf
        <div class="form-group">
            @if(!$fac)
              <label>Select Facility</label>
                <select class="browser-default custom-select form-control" name="facility_id">
                  <option selected disabled>Open this select menu</option>
                  @foreach($data as $d)
                  <option value="{{$d->id}}">{{$d->facility_name}}</option>
                  @endforeach

                </select>
              @else
              
                <label>Facility Name:</label>
                <select class="browser-default custom-select form-control" name="facility_id">
                  <option selected="disabled" value="{{$fac->id}}">{{$fac->facility_name}}</option>
                </select>
              @endif
              @error('facility_id')
              <div class="text text-danger"  style="color: red;">{{ $message }}</div>
              @enderror
              
            </div>
          <!-- /.form group -->


          <div class="form-group ">
            <label>Gallery Image:</label>
              <input type="file" class="form-control" name="image_name" value="{{old('image_name')}}" >
            <!-- /.input group -->
             @error('image_name')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->


          <div class="form-group ">
            <label>Alt Cover Image:</label>
              <input type="text" class="form-control" name="image_alt" value="{{old('image_alt')}}">
            <!-- /.input group -->
             @error('image_alt')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->

          <div class="form-group ">
            <label>Status:</label>
            <br>
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
            <button class="btn btn-primary" type="submit">Add Gallery</button>
          </div>
          <div class="col-md-4"></div>
        </form>
            <a href="{{URL()->Previous()}}"><button class="btn btn-warning">Cancel</button></a>
            <br>
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