  @extends('cd-admin.admin')
      @section('title')
    View Facility
  @endsection
  @section('content')
  <section class="content-header">

    <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewfacility')}}">Facility</a><b>-></b>View</li>
    </ol>
  </section>  
  <section class="content">
    <div class="row test2">
      <div class="col-md-12">
        <div class="box box-default box1">
          <div class="box-header text text-center">
            <h3 class="box-title ">View Facility</h3>
            <a href="{{url('viewfacility/create')}}" class="btn btn-primary btnupdate pull-left">Add Facility</a>


            <?php 
            $count = DB::table('facilities')->count();
            ?>
            @if($count > 0)

            <a href="{{url('viewgallery/create')}}" class="btn btn-primary btnupdate pull-left" style="margin-left:15px; ">Add Gallery</a>

            @endif


          </div>
          @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible session_message">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Facility Added Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @elseif(Session::has('updatesuccess'))
          <div class="alert alert-success alert-dismissible session_message">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Facility Updated Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @elseif(Session::has('deletesuccess'))
          <div class="alert alert-success alert-dismissible session_message">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Facility Deleted Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @endif
          <!-- /.box-header -->

          <div class="row test2">

            @foreach($fa as $f)
            <div class="col-md-4 image-mar-b">

              <a href="{{route('view-gallery',$f->id)}}"><img src="{{asset('uploads/facility/'.$f->facility_image)}}" style="height: 263px; width: 450px;" class="img-responsive" alt="{{$f->image_alt}}">
                <div class="centered"><h1 style="color:white; ">{{$f->facility_name}}</h1></div>
              </a>

              <td>
              <div class="btn btn-danger pull-right" data-toggle="modal" data-target="#delete{{$f->id}}"><i class="fa fa-trash"></i></div>
                <form action="{{route('update-facilitystatus',$f->id)}}" method="POST">
                  @csrf

                  <div class="btn-group">
                   @if($f->status == 'active')
                   <button type="button" class="btn btn-success">{{$f->status}}</button>
                   @else
                   <button type="button" class="btn btn-danger">{{$f->status}}</button>
                   @endif
                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  @if($f->status == 'active')
                  <div class="dropdown-menu " role="menu"  style="min-width: 0px;">
                    <li>
                      <button class="btn btn-danger" type="submit">Inactive</button>
                      
                    </li>
                  </div>
                  @else
                  <div class="dropdown-menu" role="menu"  style="min-width: 0px;">
                    <li>
                      <button class="btn btn-success" type="submit">Active</button>
                      
                    </li>
                  </div>
                  @endif
                </form>
              </div>

            </div>
            @endforeach
</div>
<div align="center">
            {!!$fa->links()!!}
</div>
        </div>

      </div>
    </div>

  </section>

  <!-- View Modal -->
  @foreach($fa as $f)
  <div class="modal modal-danger fade" id="delete{{$f->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text text-center">Delete</h4>
          </div>
          <div class="modal-body">
            <p>Are You Sure You want to delete this data</p>
          </div>
          <div class="modal-footer">

           <a href="{{route('delete-facility',$f->id)}}"><button type="button" class="btn btn-warning pull-right">Yes</button>
           </a>


           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>

         </div>
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
   @endforeach
   <style type="text/css">
    .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: 
    }
  </style>
  @endsection