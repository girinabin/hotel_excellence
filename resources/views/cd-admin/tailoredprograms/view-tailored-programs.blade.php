  @extends('cd-admin.admin')
  @section('title')
View Tailored Programs
@endsection
  @section('content')
  <style type="text/css">
    .mar
    {
      margin-bottom: 10px;
    }
  </style>
  <section class="content-header">
<h1>Tailored Programs</h1>
    <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewtailored')}}">Tailored</a><b>-></b>View</li>

    </ol>
  </section>
  <section class="content">
    <div class="row test2">

      <div class="col-md-12">
        <div class="box box-default box1">
          <div class="box-header text text-center">
            <h3 class="box-title ">View Tailored Programs</h3>
            <a href="{{url('viewtailored/create')}}" class="btn btn-primary btnupdate pull-left">Add Tailored Program</a>
          </div>
          @if(Session::has('DeleteSuccess'))
          <div class="alert alert-success alert-dismissible session_message">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Program Deleted Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @elseif(Session::has('Success'))
          <div class="alert alert-success alert-dismissible session_message">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Program Added Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @elseif(Session::has('UpdateSuccess'))
          <div class="alert alert-success alert-dismissible session_message">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Program Updated Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @endif
          <!-- /.box-header -->
<div class="box-body">
          <table id="example1" class="table table-bordered table-striped">

            <thead>

              <tr>
                <th>Accomodation Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tailored as $t)
              <tr>
                <td>{{$t->name}}</td>
                <td align="center">
                  <form method="POST" action="{{route('update-tailorstatus',$t->id)}}">
                  <div class="btn-group">
                     @if($t->status == 'active')
                  <button type="button" class="btn btn-success">{{$t->status}}</button>
                  @else
                  <button type="button" class="btn btn-danger">{{$t->status}}</button>
                  @endif
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  @if($t->status == 'active')
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
                </div>
                @csrf
                  </form>
              </td>
                <td align="center">
                 <button type="button" class="btn btn-primary btnupdate" data-toggle="modal" data-target="#view-modal{{$t->id}}">
                  <i class="fa fa-eye"></i>
                </button>
                <button class="btn btn-default btnupdate"  data-toggle="modal" data-target="#edit-modal{{$t->id}}"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger btnupdate" data-toggle="modal" data-target="#delete-modal{{$t->id}}"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
            @endforeach


          </tbody>
          <tfoot>
            <tr>
              <th>Accomodation Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
         





          </div>
        </div>

      </div>
    

  </section>

  <!-- View Modal -->
  @foreach($tailored as $t)
  <div class="modal modal-danger fade" id="delete-modal{{$t->id}}">
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

           <a href="{{route('delete-tailor',$t->id)}}"><button type="button" class="btn btn-warning pull-right">Yes</button>
           </a>


           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>

         </div>
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>

   <div class="modal modal-default fade" id="view-modal{{$t->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text text-center">View {{$t->name}}</h4>
          </div>
          <div class="modal-body">
            @if($t->status == 'active')
              <button class="btn btn-success">{{$t->status}}</button>
            @else
              <button class="btn btn-danger">{{$t->status}}</button>
             @endif
            <p><b>Tailor Program Image::</b></p>
            <img src="{{asset('uploads/tailoredprograms/'.$t->t_image)}}" height="350px" width="550px">
            <p><b>Summary::</b></p>
            <p>{{$t->summary}}</p>
             <p><b>Alt Image::</b></p>
            <p>{{$t->alt_image}}</p>

          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>

         </div>
       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>


     <div class="modal modal-default fade" id="edit-modal{{$t->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text text-center">Update Tailored Program</h4>
          </div>
          <form action="{{route('update-tailor',$t->id)}}" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group test1" >
              <label>Tailored Program Name:</label>
                <input type="text" class="form-control" name="name" value="{{$t->name}}">
              <!-- /.input group -->
              @error('name')
              <div class="text text-danger"  style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group test1" >
              <label>Tailored Program Image:</label>
                <input type="file" class="form-control" name="t_image" value="{{$t->t_image}}">
              <!-- /.input group -->
              @error('t_image')
              <div class="text text-danger"  style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group test1" >
              <label>Alt Image Name:</label>
                <input type="text" class="form-control" name="alt_image" value="{{$t->alt_image}}">
              <!-- /.input group -->
              @error('alt_image')
              <div class="text text-danger"  style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group test1" >
              <label>Summary:</label>
                <textarea type="text" class="form-control" name="summary" >{{$t->summary}}</textarea>
              <!-- /.input group -->
              @error('summary')
              <div class="text text-danger"  style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group test1" >
              <label>Status:</label>
              <br>
              <input type="radio"  name="status" value="active"<?php echo $t->status == 'active'?'checked':''?>>Active
              <input type="radio"  name="status" value="inactive"<?php echo $t->status == 'inactive'?'checked': ''?>>Inactive
            
              <!-- /.input group -->
              @error('status')
              <div class="text text-danger"  style="color: red;">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="modal-footer text text-center">
           <button type="submit" class="btn btn-warning pull-left" >Update</button>

           <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>


         </div>
         @csrf
       </form>
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
      
    }
  </style>
  @endsection
