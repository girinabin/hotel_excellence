@extends('cd-admin.admin')
@section('content')

	
	<section class="content-header">
	<h1>
  		SEO(Search Engine Optimization)
  		<small>for Google Optimization</small>
  	</h1>
  	<ol class="breadcrumb">
    	<li><i class="fa fa-dashboard"></i>Dashboard->Facility->SEO</li>
  	</ol>
	</section>
	<section class="content">
		
		  <form action="" method="">
   <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10 box1">
      <div class="box box-default">
        <div class="box-header text text-center">
          <h1 class="box-title "><h2>Facility SEO</h2></h1>
        </div>
        <div class="box-body">
          <!-- Date dd/mm/yyyy -->
          <div class="form-group test1">
            <label>SEO TITLE:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-gears"></i>
              </div>
              <input type="text" class="form-control" value="Hotel-Excellence,hotel,excellence">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
          <!-- add Image-->

          <div class="form-group test1" >
            <label>SEO DESCRIPTION:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-edit"></i>
              </div>
  <textarea cols="150" rows="10">
      
    </textarea>             
  </div>
            <!-- /.input group -->
          </div>
          <!-- Add Alternate of image -->
          <div class="form-group test1" >
            <label>SEO KEYWORD:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-key"></i>
              </div>
              <input type="text" class="form-control" value="hotel,hotel-excellence,excellence,best-hotel,5starhotel,service">
            </div>
            <!-- /.input group -->
          </div>
		 <hr>
          <div class="row">
            <div class="col-md-4 test1">
            </div>
            <div class="col-md-4">

              <a href=""><button class="btn btn-primary  test1" type="submit"><b>Update Facility SEO</b></button></a>
              <a href="/back"><button class="btn btn-danger test1"><b>Cancel</b></button></a>

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

@endsection