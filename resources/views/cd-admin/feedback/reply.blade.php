@extends('cd-admin.admin')
@section('title')
View Replies and Quick Mails
@endsection
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
  <h1>
    Feedback
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i>Dashboard->Mail->Reply</li>
  </ol>
</section>
<section class="content">

  <form action="{{route('send-reply')}}" method="POST">
   <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10 box1">
      <div class="box box-default">
        <div class="box-header text text-center">
          <h1 class="box-title "><h2>Reply to {{$reply['email']}}</h2></h1>
        </div>
        <div class="box-body">
          <!-- Date dd/mm/yyyy -->
          <div class="form-group test1">

            <label>Email ID:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-envelope-o"></i>
              </div>
              <input type="email" class="form-control" value="{{$reply['email']}}" name="email" readonly>
            </div>
            <!-- /.input group -->   
            @error('email')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- /.form group -->
          <!-- add Image-->

          <div class="form-group test1" >
            <label>Subject:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-edit"></i>
              </div>
              <input type="text" class="form-control" name="subject">
            </div>
            <!-- /.input group -->
            @error('subject')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
          </div>
          <!-- Add Alternate of image -->
          <div class="form-group test1" >
            <label>Message</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-edit"></i>
              </div>
              <textarea id="summernote" name="message"></textarea>
            </div>
            @error('message')
            <div class="text text-danger"  style="color: red;">{{ $message }}</div>
            @enderror
            <!-- /.input group -->
          </div>



          <hr>
          <div class="row">
            <div class="col-md-4 test1">
            </div>
            <div class="col-md-4">
              <input type="hidden" name="message_id" value="{{$reply['id']}}">
              <input type="hidden" name="through" value="feedback">

              <button class="btn btn-primary  test1" type="submit"><b>Send Message</b></button>
              @csrf
            </form>

          </div>
          <div class="col-md-4">

          </div>
        </div>
      </div>
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