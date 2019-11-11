@extends('cd-admin.frontend.home-master')

<!-- page title -->
@section('page-title')	
About | Hotel Excellence
@endsection


<!-- website content -->
@section('content')
<div class="container pad-top pad-bot about-top">
	<h2><span>{{$a['about_name']}}</span></h2>
	<div class="about-image">
		<img src="{{url('uploads/about/'.$a['image_name'])}}" alt="{{$a['image_alt']}}" class="img-fluid">
	</div>
	<div class="about-text">
		<p>{!!$a['description']!!}</p>
	</div>
</div>



<div class="container pad-bot">
	<div class="about-obj-text">
		<h3>The accommodation</h3>
		<p>Reasons to stay</p>
	</div>

	<div class="row">
		@foreach($room as $key => $r)
		<div class="col-md-4 about-obj-card">
			<h5>{{$r['room_title']}}</h5>
			<p>{{$r['summary']}}</p>
		</div>
		@if($key == 2)
		@break
		@endif
		@endforeach
	</div>
</div>
@endsection