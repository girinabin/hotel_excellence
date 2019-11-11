@extends('cd-admin.admin')
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
  <h1>
    About
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i>About</li>
  </ol>
</section>
<section class="content">

 <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10 box1">
    <div class="box box-default">
      <div class="box-header text text-center">
        <h1 class="box-title "><h2>Add About</h2></h1>
      </div>
      <div class="box-body">
        <!-- Date dd/mm/yyyy -->
        <form action="{{route('add-about')}}"  enctype="multipart/form-data" method="POST">
          @csrf
          <div class="form-group ">
            <label>About Title:</label>
              <input type="text" class="form-control" name="about_name" value="{{old('about_name')}}">
            @error('about_name')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
            <!-- /.input group -->
          </div>

          <div class="form-group ">
            <label>About Summary:</label>
              <textarea class="form-control" name="summary" id="summernote1">{{old('summary')}}</textarea>
            <!-- /.input group -->
             @error('summary')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->
          <div class="form-group ">
            <label>About Description:</label>
              <textarea class="form-control" name="description" id="summernote">{{old('description')}}</textarea>
            <!-- /.input group -->
             @error('description')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->
          <div class="form-group">
            <label>About Cover Image:</label>
              <input type="file" class="form-control" name="image_name" value="{{old('image_name')}}" >
            <!-- /.input group -->
             @error('image_name')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->


          <div class="form-group ">
            <label>Alt Image Name:</label>
              <input type="text" class="form-control" name="image_alt" value="{{old('alt_image')}}">
            
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

          
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <button class="btn btn-primary" type="submit">Add About</button>
          </div>
          <div class="col-md-4"></div>
        </form>
            <a href="{{URL()->Previous()}}"><button class="btn btn-warning">Cancel</button></a>
      </div>
    </div>
  </div>


  <div class="col-md-1"></div>
</div>


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