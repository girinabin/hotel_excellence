@extends('cd-admin.admin')
@section('title')
View About
@endsection
@section('content')
<div class="content-wraper">
<section class="content-header">
  <h1>
    About
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewabout')}}">About</a></li>
  </ol>
</section>
<section class="content">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header text text-center">
        <h3 class="box-title">View About</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        @if(Session::has('updatesuccess'))
        <div class="alert alert-success alert-dismissible session_message">
          <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Updated Successfully</strong>
          {{Session::get("message", '')}}
          @endif
        </div>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Title</th>
              <th>Summary</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($about as $a)
            <tr>
              <td>{{$a->about_name}}</td>
              <td>{!!$a->summary!!}
              </td>
              <td align="center">
               <button type="button" class="btn btn-primary btnupdate" data-toggle="modal" data-target="#modal-view{{$a->id}}">
                <i class="fa fa-eye"></i>
              </button>
              <button class="btn btn-default btnupdate"  data-toggle="modal" data-target="#modal-edit{{$a->id}}"><i class="fa fa-edit"></i></button>

            </td>

          </tr> 
          @endforeach


        </tbody>
        <tfoot>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>

</section>
</div>
<!-- Edit Modal -->
@foreach($about as $a)
<div class="modal fade" id="modal-edit{{$a->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h1 class="text text-center modal-title">Edit About</h1>

        </div>
        <div class="modal-body">
          <form action="{{route('update-about',$a->id)}}" method="POST" enctype="multipart/form-data">
           <div class="box-body">
            <!-- Date dd/mm/yyyy -->
            <div class="form-group test1">
              <label>About Title:</label>
                <input type="text" class="form-control" value="{{$a->about_name}}" name="about_name">
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <!-- add Image-->
            <div class="form-group test1">
              <label>Summary:</label>
                <textarea class="form-control" name="summary" id="summernote">{!!e($a->summary)!!}</textarea>
              <!-- /.input group -->
            </div>

            <div class="form-group test1" >
              <label>Description:</label>
                <textarea class="form-control" id="summernote1" name="description">{{$a->description}}</textarea>
              <!-- /.input group -->
            </div>

            <!-- /.form group -->
            <!-- /.box-body -->
            <div class="form-group test1" >
              <label>About Image:</label>
                <input type="file" name="image_name" class="form-control" value="{{$a->image_name}}">
              <!-- /.input group -->
            </div>

            <!-- /.box-body -->
            <div class="form-group test1" >
              <label>Alt Image Name:</label>
                <input type="text" name="image_alt" class="form-control" value="{{$a->image_alt}}">
              <!-- /.input group -->
            </div>

            <div class="form-group test1" >
              <label>SEO Title:</label>
                <input type="text" name="seo_title" class="form-control" value="{{$a->seo_title}}">
              <!-- /.input group -->
            </div>

            <div class="form-group test1" >
              <label>SEO Description:</label>
                <textarea class="form-control" name = "seo_description">{{$a->seo_description}}</textarea>
              <!-- /.input group -->
            </div>

            <div class="form-group test1" >
              <label>SEO Keyword:</label>
                <input type="text" name="seo_keyword" class="form-control" value="{{$a->image_alt}}">
              <!-- /.input group -->
            </div>



            <hr>


            <button class="btn btn-danger  test1" type="submit"><b>Edit About</b></button>
            @csrf
          </form>
          <button class="btn btn-primary test1 pull-right" data-dismiss="modal"><b>Cancel</b></button>

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</div>
<!-- /.modal -->
<div id="modal-view{{$a->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">{{$a->about_name}}</h4>
      </div>
      <div class="modal-body">
        <p><b>About Image::</b> <img src="{{asset('uploads/about/'.$a->image_name)}}" style="height: 350px; width: 450px;"></p>
        <p><b>Alternate Image Name::</b>{{$a->image_alt}}</p>
        <p><b>About Description::</b>{!!$a->description!!}</p>
        <p><b>SEO Title::</b>{{$a->seo_title}}</p>
        <p><b>SEO Description::</b>{{$a->seo_description}}</p>
        <p><b>SEO Keyword::</b>{{$a->seo_keyword}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endforeach
<style type="text/css">
.btnupdate
  {
   padding-right: 15px;
   margin-right: 15px;
 }

</style>
@endsection