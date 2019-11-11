  @extends('cd-admin.admin')
  @section('title')
  View Accomodation
  @endsection
  @section('content')

  <section class="content-header">
    <h1>
      Accomodation
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewaccomodation')}}">Accomodation</a><b>-></b>View</li>
    </ol>
    <!-- <div class="col-md-1"></div> -->
    <div class="col-sm-12">
      <div class="box">
        <div class="box-header text text-center">
          <h3 class="box-title" >View Accomodation</h3>
          <a href="{{url('/viewaccomodation/create')}}" class="btn btn-primary btnupdate pull-left">Add Accomodation</a>

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
                <th>Accomodation Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($acc as $a)
              <tr>
                <td>{!!e($a->accomodation_name)!!}</td>
                <td align="center">
                  <form method="POST" action="{{route('update-accstatus',$a->id)}}">
                    <div class="btn-group">
                     @if($a->status == 'active')
                     <button type="button" class="btn btn-success">{{$a->status}}</button>
                     @else
                     <button type="button" class="btn btn-danger">{{$a->status}}</button>
                     @endif
                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @if($a->status == 'active')
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
               <button type="button" class="btn btn-primary btnupdate" data-toggle="modal" data-target="#modal-view{{$a->id}}">
                <i class="fa fa-eye"></i>
              </button>
              <button class="btn btn-default btnupdate"  data-toggle="modal" data-target="#modal-edit{{$a->id}}"><i class="fa fa-edit"></i></button>
              <button class="btn btn-danger btnupdate" data-toggle="modal" data-target="#modal-delete{{$a->id}}"><i class="fa fa-trash"></i></button>
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
    <!-- /.box-body -->
  </div>
</div>
<div class="col-md-1"></div>
<!-- View Modal -->
@foreach($acc as $a)
<div class="modal fade" id="modal-view{{$a->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text text-center">{!!e($a->accomodation_name)!!}</h4>
        </div>
        <div class="modal-body">
          <div>
            <?php 
            if($a->status == 'active') 
            {
              $b = 'btn-success';
            }
            else
            {
              $b = 'btn-danger';
            }
            ?>
            <button class="btn {{$b}} "><h5>{{$a->status}}</h5></button>
          </div>
          <br>
          <p><b>Summary:: </b><br>{!!e($a->summary)!!}</p>
          <br>
          <p><b>Accomodation Image::</b><img src="{{asset('uploads/room/'.$a->accomodation_image)}}" style="height: 350px; width: 500px;"></p>
          <br>
          <p><b>Description:: </b>{!!e($a->description)!!}</p>
          <br>
          <p><b>Alt Image:: </b>{!!e($a->image_alt)!!}</p>
          <br>
          <p><b>SEO Title:: </b>{!!e($a->seo_title)!!}</p>
          <br>
          <p><b>SEO Description:: </b>{!!e($a->seo_description)!!}</p>
          <br>
          <p><b>SEO Keyword:: </b>{!!e($a->seo_keyword)!!}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>




  <!-- Delete Modal -->
  <div class="modal modal-danger fade" id="modal-delete{{$a->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text text-center">Delete</h4>
          </div>
          <div class="modal-body">
            <p>Do You Want To delete the Data</p>
          </div>
          <div class="modal-footer">
            <form method="POST" action="{{route('delete-accomodation',$a->id)}}" enctype="multipart/form-data">
              <button type="submit" class="btn btn-warning pull-right">Yes</button>
              @csrf
            </form>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>

          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <!-- Edit Modal -->
    <div class="modal modal-default fade" id="modal-edit{{$a->id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text text-center">Update Accomodation</h4>
            </div>
            <div class="modal-body">
              <form action="{{route('edit-accomodation',$a->id)}}" method="POST" enctype="multipart/form-data">
                <div class="form-group test1">
                  <label>Accomodation Name:</label>
                  <input type="text" class="form-control" name="accomodation_name" value="{!!e($a->accomodation_name)!!}">
                  <!-- /.input group -->
                </div>

                <div class="form-group test1">
                  <label>Summary:</label>

                  <textarea name="summary" class="form-control">{!!e($a->summary)!!}
                  </textarea>                    
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group test1">
                  <label>Accomodation Image:</label>
                  <input type="file" class="form-control" name="accomodation_image" value="{{$a->accomodation_image}}">
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group test1">
                  <label>Alt Image:</label>

                  
                  <input type="text" class="form-control" name="image_alt" value="{!!e($a->image_alt)!!}">

                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group test1">
                  <label>Description:</label>

                  <div class="input-group">
                    <textarea id="summernote{{$loop->iteration}}" cols="10" rows="10" class="form-control" name="description">{!!e($a->description)!!}</textarea>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->


                <!-- /.form group -->
                <div class="form-group test1">
                  <label>SEO Title:</label>
                  <input type="text" class="form-control" name="seo_title" value="{!!e($a->seo_title)!!}">
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->


                <div class="form-group test1">
                  <label>SEO Description:</label>
                  <textarea class="form-control" name="seo_description" >{!!e($a->seo_description)!!}</textarea>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->


                <div class="form-group test1">
                  <label>SEO Keyword:</label>
                  <input type="text" class="form-control" name="seo_keyword" value="{!!e($a->seo_keyword)!!}">
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group test1">
                  <label>Status:</label>

                  <div class="input-group">
                    <input type="radio" name="status" value="active" <?php echo $a->status == 'active' ? 'checked' :  '' ?> >Active
                    <input type="radio" name="status" value="inactive" <?php echo $a->status == 'inactive' ? 'checked' :  '' ?> >Inactive
                  </div>
                  <!-- /.input group -->
                </div>
                <hr>
                <button class="btn btn-warning" type="submit">Update</button>
                <div class="btn btn-primary pull-right" data-dismiss='modal' >Cancel</div>
                @csrf
              </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




      @endforeach
    </section>
    <style type="text/css">
      .btnupdate
      {
       padding-right: 15px;
       margin-right: 15px;
     }

   </style>
   @endsection