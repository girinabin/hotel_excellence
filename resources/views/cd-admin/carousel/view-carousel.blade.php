  @extends('cd-admin.admin')
    @section('title')
    View Carousel
  @endsection
  @section('content')
  <style type="text/css">
    .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);

    }
    .mar
    {
    margin-bottom: 10px;
    }
    .test2 
          {
            margin-left:15px;
            margin-right: 20px; 
            margin-bottom: 15px;
            margin-top: 15px;
          }
          .box1
          {
            margin-bottom: 15px;
            margin-top: 15px;
          }

          .title
          {
            color: red;
          }
          .img1
          {
            border-radius: 45px;
          }
  </style>
  <div class="content-wraper">
    <section class="content-header">

      <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/carousel')}}">Carousel</a><b>-></b>View</li>

      </ol>
    </section>
    <section class="content">
      <div class="row test2">

        <div class="col-md-12">
          <div class="box box-default box1">

            <div class="box-header text text-center">
              <h3 class="box-title ">View Carousel</h3>
              <a href="{{url('viewcarousel/create')}}" class="btn btn-primary btnupdate pull-left">Add Carousel</a>
            </div>
            <!-- /.box-header -->
                         @if(Session::has('DeleteSuccess'))
          <div class="alert alert-success alert-dismissible session_message">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Carousel Deleted Successfully</strong>
            {{Session::get("message", '')}}
          </div>
            @elseif(Session::has('Success'))
          <div class="alert alert-success alert-dismissible session_message">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Carousel Added Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @endif

            <div class="row test2">
              @foreach($carousel as $c)
              <div class="col-md-6 mar">
                <br>
                <img src="{{url('uploads/carousel/'.$c->c_image)}}" style="height: 500px; width: 634px">
                <h1 class="centered" style="color: white">{{$c->name}}</h1>
                <div class="btn btn-danger pull-right" data-toggle="modal" data-target="#delete-modal{{$c->id}}" ><i class="fa fa-trash"></i>
                </div>
                @if($c->status == 'active')
                <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle pull-left" type="button" data-toggle="dropdown">
                    {{$c->status}}
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="min-width: 0px;">
                      <li><a href="{{route('update_carouselstatus',$c->id)}}"><button class="btn btn-danger">inactive</button></a></li>
                    </ul>
                  </div>
                  @elseif($c->status == 'inactive')
                  
                  <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle pull-left" type="button" data-toggle="dropdown">
                      {{$c->status}}
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu" style="min-width: 0px;">
                        <li><a href="{{route('update_carouselstatus',$c->id)}}"><button class="btn btn-success">active</button></a></li>
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
      </div>

      <!-- View Modal -->
      @foreach($carousel as $c)
      <div class="modal modal-danger fade" id="delete-modal{{$c->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View</h4>
              </div>
              <div class="modal-body">
                <p>Are You Sure You want to delete this data</p>
              </div>
              <div class="modal-footer">
                <a href="{{route('delete-carousel',$c->id)}}"><button class="btn btn-warning pull-right" >Yes</button></a>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        @endforeach

        @endsection