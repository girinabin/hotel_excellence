@extends('cd-admin.admin')
@section('title')
View Feedback
@endsection
@section('content')

<section class="content-header">
    <h1>
  View Feedbacks
  </h1>
  <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/feedback')}}">Feedback</a><b>-></b>add</li>
  </ol>
</section>
<div class="col-md-12 test1">
  <div class="box box-primary">
    <div class="box-header with-border" align="center">
      <h3 class="box-title">Feedback</h3>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">

      <div class="mailbox-controls">

        <!-- /.btn-group -->
        <a href="{{url('/feedback')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>

      </div>
      <div class="table-responsive mailbox-messages">
        <table class="table table-hover table-striped">
          <tbody>
            @foreach($feedback as $feed)
            <tr>
              <td><a href="" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete{{$feed->id}}"><i class="fa fa-trash"></i></a></td>
              <td><a class="btn btn-default"  data-toggle="modal" data-target="#modal-view{{$feed->id}}"><i class="fa fa-eye"></i></a></td>
              <td class="mailbox-name">{{$feed->email}}</td>
              <td class="mailbox-subject">{{$feed->message}}</td>
              <td>
                @if($feed->status == 'Replied')
                <button class="btn btn-success ">Replied</button>
                @else
                <button class="btn btn-danger">Not Replied</button>
                @endif  
              </td>
              <td> <?php $date = Carbon\Carbon::parse($feed->created_at);
              $now = Carbon\Carbon::now();
              $diff = $date->diffForHumans($now);
              ?>
              {{$diff}}
            </td>
          </tr>
          @endforeach




        </tbody>
      </table>
      <!-- /.table -->
    </div>
    <!-- /.mail-box-messages -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer no-padding">
    <div class="mailbox-controls">
      <!-- Check all button -->


      <!-- /.btn-group -->
      <a href="{{url('/feedback')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>             
    </div>
  </div>
</div>
<!-- /. box -->
</div>


<style type="text/css">
	.test1
	{
		margin-top: 50px;
		margin-bottom: 50px;
	}
</style>
@foreach($feedback as $feed)
<div class="modal fade" id="modal-view{{$feed->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" align="center">Message from {{$feed->email}}</h4>
        </div>
        <div class="modal-body">
          <p><b>Message:</b></p>
          <p>{{$feed->message}}</p><br>
          <p><b>Sent At:</b></p>
          <p>Recieved time will be here</p><br>

        </div>
        <div class="modal-footer">
          <a href="{{route('reply',$feed->id)}}"><button class="btn btn-warning">Reply</button></a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <div class="modal modal-danger fade" id="modal-delete{{$feed->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text text-center">Are You Sure</h4>
          </div>
          <div class="modal-body">
            <p>Do you really want to delete the data</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">No</button>
            <a href="{{route('delete-feedback',$feed->id)}}"><button class="btn btn-warning pull-left">Yes</button></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    @endforeach

    @endsection