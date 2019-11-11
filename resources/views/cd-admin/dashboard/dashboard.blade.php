@extends('cd-admin.admin')
@section('title')
Hotel Excellence | Dashboard
@endsection
@section('content')

<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{$room}}</h3>

          <p>No. Of Rooms</p>
        </div>
        <div class="icon">
          <i class="fa fa-building"></i>
        </div>
        <a href="{{url('/viewroom')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$feedback}}</h3>

          <p>New Mails</p>
        </div>
        <div class="icon">
          <i class="fa fa-envelope"></i>
        </div>
        <a href="{{url('/viewfeedback')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{$accomodation}}</h3>

          <p>No. Of Accomodations</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="{{url('/viewaccomodation')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{$tailor}}</h3>

          <p>Total Tailored Programs</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="{{url('/viewtailored')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="box-body">
     <div class="col-md-6">
      <!-- quick email widget -->
      <div class="box box-info">
        <div class="box-header">
          <i class="fa fa-envelope"></i>

          <h3 class="box-title">Quick Email</h3>
          <!-- tools box -->
          
          <!-- /. tools -->
        </div>
        <div class="box-body">
          <form action="{{route('quick_mail')}}" method="post">
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email to:">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" placeholder="Subject">
            </div>
            <div>
              <textarea class="textarea" placeholder="Message" name="message" 
              style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            <input type="hidden" name="through" value="quickmail">
        </div>
        <div class="box-footer clearfix">
          <button type="submit" class="pull-right btn btn-default">Send
            <i class="fa fa-arrow-circle-right"></i></button>
          </div>
          @csrf
          </form>
        </div>
      </div>
      <div class="col-md-6">

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Recent Mails</h3>

           
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           <div class="table-responsive mailbox-messages">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Email</th>
              <th>Message</th>
              <th>From</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentmail as $feed)
            <tr>
             
              <td class="mailbox-name">{{$feed->email}}</td>
              <td class="mailbox-subject">{!!$feed->message!!}</td>
              <td class="mailbox-subject">{{$feed->through}}</td>
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
       </div>
        <a href="{{url('/viewfeedback')}}" class="small-box-footer"><button class="btn btn-primary" style="margin-top: 21px; margin-left: 255px;">View Recent Mails <i class="fa fa-arrow-circle-right"></i></button></a>
      </div>
      <!-- /.table -->
    </div>

              </div>

            </section>


        <!-- /.content -->

        @endsection