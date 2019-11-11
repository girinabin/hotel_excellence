@extends('cd-admin.admin')
@section('title')
Add Room
@endsection
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
  <h1>
    Room
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewroom')}}">Room</a><b>-></b>Add</li>
  </ol>
</section>
<section class="content">

 <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10 box1">
    <div class="box box-default">
      <div class="box-header text text-center">
        <h1 class="box-title "><h2>Add Room</h2></h1>
      </div>
      <div class="box-body">
        <!-- Date dd/mm/yyyy -->
        <form action="{{route('add-room')}}"  enctype="multipart/form-data" method="POST">
          @csrf
          <div class="form-group ">
            <label>Room Title:</label>
              <input type="text" class="form-control" name="room_title" value="{{old('room_title')}}">
            @error('room_title')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <div class="form-group ">
            <label>Room Summary:</label>
              <textarea type="text" class="form-control" name="summary" >{{old('summary')}}</textarea>
            <!-- /.input group -->
             @error('summary')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->

          <div class="form-group ">
            <label>Room Description:</label>
              <textarea  name="description" id="summernote">{{old('description')}}</textarea>
            <!-- /.input group -->
             @error('description')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->

          <div class="form-group ">
            <label>Room Cover Image:</label>
              <input type="file" class="form-control" name="cover_image" value="{{old('cover_image')}}" >
            <!-- /.input group -->
             @error('cover_image')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->


          <div class="form-group ">
            <label>Alt Cover Image:</label>
              <input type="text" class="form-control" name="alt_cover" value="{{old('alt_cover')}}">
            <!-- /.input group -->
             @error('alt_cover')
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
                {{old('seo_description')}}
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
            <button class="btn btn-primary" type="submit">Add Room</button>
          </div>
          <div class="col-md-4"></div>
        </form>
            <a href="{{URL()->Previous()}}"><button class="btn btn-warning">Cancel</button></a>
      </div>
    </div>
  </div>


  <div class="col-md-1"></div>



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