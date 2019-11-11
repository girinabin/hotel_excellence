  @extends('cd-admin.admin')
      @section('title')
    View {{$facility->facility_name}}
  @endsection
  @section('content')
  <style type="text/css">
    .mar
    {
      margin-bottom: 10px;
    }
  </style>
  <section class="content-header">

    <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewfacility')}}">Facility</a><b>-></b><a href="{{url('/viewgallery/'.$facility->id)}}">{{$facility->facility_name}}</a><b>-></b>View</li>

    </ol>
  </section>
  <section class="content">
    <div class="row test2">

      <div class="col-md-12">
        <div class="box box-default box1">
          <div class="box-header text text-center">
            <h3 class="box-title ">View {{$facility->facility_name}}</h3>
            <a href="{{url('viewgallery/create/'.$fa_id)}}" class="btn btn-primary btnupdate pull-left">Add Gallery</a>
          </div>
          @if(Session::has('DeleteSuccess'))
          <div class="alert alert-success alert-dismissible session_message">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Image Deleted Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @elseif(Session::has('Success'))
          <div class="alert alert-success alert-dismissible session_message">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Image Added Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @endif
          <!-- /.box-header -->

          <div class="row test2">

            @foreach($gallery as $g)
            <div class="col-md-6 mar">
              <img src="{{asset('uploads/gallery/'.$g->image_name)}}" alt="{{$g->image_alt}}" height="400px" width="634px">
              <div class="btn btn-danger pull-right" data-toggle="modal" data-target="#delete-modal{{$g->id}}" ><i class="fa fa-trash"></i>
                </div>
                @if($g->status == 'active')
                <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle pull-left" type="button" data-toggle="dropdown">
                    {{$g->status}}
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="min-width: 0px;">
                      <li><a href="{{route('update-gallerystatus',$g->id)}}"><button class="btn btn-danger">inactive</button></a></li>
                    </ul>
                  </div>
                  @elseif($g->status == 'inactive')
                  
                  <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle pull-left" type="button" data-toggle="dropdown">
                      {{$g->status}}
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu" style="min-width: 0px;">
                        <li><a href="{{route('update-gallerystatus',$g->id)}}"><button class="btn btn-success">active</button></a></li>
                      </ul>
                    </div>
                    @endif
                    
            </div>
            @endforeach





          </div>
        </div>

      </div>
    </div>

  </section>

  <!-- View Modal -->
  @foreach($gallery as $g)
  <div class="modal modal-danger fade" id="delete-modal{{$g->id}}">
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

           <a href="{{route('delete-gallery',$g->id)}}"><button type="button" class="btn btn-warning pull-right">Yes</button>
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