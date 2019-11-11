@extends('cd-admin.admin')
@section('title')
View Replies and Quick Mails
@endsection
@section('content')

<style type="text/css">
  .test1
  {
    margin-top: 50px;
    margin-bottom: 50px;
  }
</style>
<div class="col-md-12 test1">
  <div class="box box-primary">
    <div class="box-header with-border" align="center">
      <h3 class="box-title">Replied Messages</h3>


      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      @if(Session::has('DeleteSuccess'))
      <div class="alert alert-success alert-dismissible session_message">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Message Deleted Successfully</strong>
        {{Session::get("message", '')}}
      </div>
      @endif
      <div class="mailbox-controls">

        <!-- /.btn-group -->
        <a href="{{url('/feedback/reply')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>

      </div>
      <div class="table-responsive mailbox-messages">
        <table class="table table-hover table-striped">
          <tbody>
            @foreach($freply as $f)
            <tr>
              <td><a href="" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete{{$f->id}}"><i class="fa fa-trash"></i></a></td>
              <td><a class="btn btn-default"  data-toggle="modal" data-target="#modal-view{{$f->id}}"><i class="fa fa-eye"></i></a></td>
              <td class="mailbox-name">{{$f->email}}</td>
              <td class="mailbox-subject">{{$f->subject}}</td>
              <td class="mailbox-messages">{!!$f->message!!}</td>
              <td> <?php $date = Carbon\Carbon::parse($f->created_at);
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
  <div class="mailbox-controls">

    <!-- /.btn-group -->
    <a href="{{url('/feedback/reply')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
  </div>


  <!-- /.box-body -->

</div>
<!-- /. box -->
</div>


<div class="col-md-12 test1">
  <div class="box box-primary">
    <div class="box-header with-border" align="center">
      <h3 class="box-title">Quick Messages</h3>


      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="mailbox-controls">

        <!-- /.btn-group -->
        <a href="{{url('/feedback/reply')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>

      </div>
      <div class="table-responsive mailbox-messages">
        <table class="table table-hover table-striped">
          <tbody>
            @foreach($qreply as $q)
            <tr>
              <td><a href="" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete{{$q->id}}"><i class="fa fa-trash"></i></a></td>
              <td><a class="btn btn-default"  data-toggle="modal" data-target="#modal-view{{$q->id}}"><i class="fa fa-eye"></i></a></td>
              <td class="mailbox-name">{{$q->email}}</td>
              <td class="mailbox-subject">{{$q->subject}}</td>
              <td class="mailbox-messages">{!!$q->message!!}</td>
              <td> <?php $date = Carbon\Carbon::parse($q->created_at);
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
  <div class="mailbox-controls">

    <!-- /.btn-group -->
    <a href="{{url('/feedback/reply')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
  </div>


  <!-- /.box-body -->

</div>
<!-- /. box -->
</div>

@foreach($reply as $r)
<div class="modal fade" id="modal-view{{$r->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" align="center">Reply to {{$r->email}}</h4>
        </div>
        <div class="modal-body">
          <p><b>Subject</b></p>
          <p>{{$r->subject}}</p>
          <p><b>Message:</b></p>
          <p>{!!$r->message!!}</p><br>
          <p><b>Sent At:</b></p>
          <p>{{$r->created_at}}</p><br>

        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <div class="modal modal-danger fade" id="modal-delete{{$r->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Are You Sure</h4>
          </div>
          <div class="modal-body">
            <p>Do you really want to delete the data</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">No</button>
            <a href="{{route('delete-reply',$r->id)}}"><button class="btn btn-warning pull-right">Yes</button></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    @endforeach

    @endsection