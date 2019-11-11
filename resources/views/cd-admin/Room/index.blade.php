@extends('cd-admin.admin')
@section('title')
View Rooms
@endsection
@section('content')

<section class="content-header">
  <h1>
    Room
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewroom')}}">Room</a><b>-></b>View</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box1">
        <div class="box-header text text-center">
          <h3 class="box-title ">View Rooms</h3>
          <a href="{{url('viewroom/create')}}" class="btn btn-primary btnupdate pull-left">Add Rooms</a>
        </div>
        <!-- /.box-header -->
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible session_message">
          <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Inserted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @elseif(Session::has('updatesuccess'))
        <div class="alert alert-success alert-dismissible session_message">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Updated Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @elseif(Session::has('deletesuccess'))
        <div class="alert alert-success alert-dismissible session_message">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Deleted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @endif
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th align="center">Room Title</th>
                <th align="center">Status</th>

                <th align="center">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($room as $rooms)
              <tr>
                
                <td>{{$rooms['room_title']}}</td>
                <td align="center">
                  <form action="{{route('update-roomstatus',$rooms['id'])}}" method="POST">
                    @csrf
  
                    <div class="btn-group">
                     @if($rooms['status'] == 'active')
                  <button type="button" class="btn btn-success">{{$rooms['status']}}</button>
                  @else
                  <button type="button" class="btn btn-danger">{{$rooms['status']}}</button>
                  @endif
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  @if($rooms['status'] == 'active')
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
                </form>
                </td>
                <td align="center">
                  <button class="btn btn-primary btnupdate" data-toggle="modal" data-target="#modalview{{$rooms['id']}}"><i class="fa fa-eye"></i></button>
                  <button class="btn btn-default btnupdate" data-toggle="modal" data-target="#modaledit{{$rooms['id']}}"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-danger btnupdate"  data-toggle="modal" data-target="#modaldelete{{$rooms['id']}}"><i class="fa fa-trash"></i></button>
                </td>
                
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                
                <th>Room Title</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </section>





  @foreach($room as $room)
  <div class="modal fade" id="modalview{{$room['id']}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text text-center">{{$room['room_title']}}<br>
</h4>
          </div>
          <div class="modal-body">
            <div>
              <?php 
              if($room['status'] == 'active') 
              {
                $a = 'btn-success';
              }
              else
              {
                $a = 'btn-danger';
              }
              ?>
              <button class="btn {{$a}}"><h5>{{$room['status']}}</h5></button>
            </div>
            <br>
            <p><b>Room Summary:</b></p>
            <p> {{$room['summary']}}</p><br>
            <p><b>Room Description:</b></p>
            <p> {!!$room['description']!!}</p><br>
            <p><b>Room Cover Image:</b></p>
            <p> <img src="{{asset('uploads/room/'.$room['cover_image'])}}" style="height: 350px; width: 500px;"></p><br>
            <p><b>Alt Cover Image:</b></p>
            <p> {{$room['alt_cover']}}</p><br>
            <p><b>SEO Title:</b></p>
            <p> {{$room['seo_title']}}</p><br>
            <p><b>SEO Description:</b></p>
            <p> {{$room['seo_description']}}</p><br>            
            <p><b>SEO Keyword:</b></p>
            <p> {{$room['seo_keyword']}}</p><br>
            
          </div>
          <div class="modal-footer">
            <a href="#"><button class="btn btn-default" data-dismiss="modal">Close</button></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="modaledit{{$room['id']}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text text-center">Update Room</h4>
            </div>
            <div class="modal-body">
              <form action="{{route('update-room',$room['id'])}}"  enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
                <div class="form-group ">
                  <label>Room Title:</label>
                    <input type="text" class="form-control" name="room_title" value="{{$room['room_title']}}">
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group ">
                  <label>Room Summary:</label>
                    <textarea class="form-control" name="summary" >{{$room['summary']}}</textarea>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->


                <div class="form-group ">
                  <label>Room Description:</label>
                    <textarea class="form-control"  name="description" id="summernote{{$loop->iteration}}" >{!!$room['description']!!}</textarea>
    
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group ">
                  <label>Room Cover Image:</label>
                    <input type="file" class="form-control" name="cover_image">
                 <!-- /.input group -->
        </div>
                <!-- /.form group -->


                <div class="form-group ">
                  <label>Alt Cover Image:</label>
                    <input type="text" class="form-control" name="alt_cover" value="{{$room['alt_cover']}}">
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group ">
                  <label>SEO Title:</label>
                    <input type="text" class="form-control" name="seo_title" value="{{$room['seo_title']}}">
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group ">
                  <label>SEO Description:</label>
                    <textarea class="form-control" name="seo_description">{{$room['seo_description']}}
                    </textarea>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group ">
                  <label>SEO Keyword:</label>
                    <input type="text" class="form-control" name="seo_keyword" value="{{$room['seo_keyword']}}">
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group ">
                  <label>Status:</label>

                  <div class="input-group">
                    
                    <input type="radio" <?php echo $room['status'] == 'active' ? 'checked' :  '' ?> checked name="status" value="active">Active
                    <input type="radio" <?php echo $room['status'] == 'inactive' ? 'checked' :  '' ?>  name="status" value="inactive">Inactive

                  </div>
                  <!-- /.input group -->
                </div>
                <hr>
                <button class="btn btn-warning" type="submit">Update Room</button>

              </form>
              
            </div>
            
           
            
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal modal-danger fade" id="modaldelete{{$room['id']}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text text-center">Delete</h4>
              </div>
              <div class="modal-body">
                Are You Sure you want to delete the data
              </div>
              <div class="modal-footer">
                <a href="{{route('delete-room',$room['id'])}}"><button class="btn btn-warning pull-right">Yes</button></a>
                <a href="#"><button class="btn btn-default pull-left" data-dismiss="modal">No</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        @endforeach


        <!-- /.box -->
        <style type="text/css">
          .btnupdate
          {
            
            margin-right: 15px;
          }
          .box1
          {
            margin-top: 20px;
          }
          .session_message
          {
            margin-left: 9px;
            margin-right: 9px;
          }
        </style>
        @endsection