@extends('cd-admin.frontend.home-master')

<!-- page title -->
@section('page-title')	
Hotel Excellence	
@endsection


<!-- website content -->
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner home-carousel">
<!-- 		<div class="container-fluid pad-0 treasure-global-btn" style="position: relative;margin-bottom: -43px;z-index: 1;">
			<a href="{{url('floor-plan')}}" style="margin-top: 15px;">
				<p><span>LEARN ABOUT FUTURE PROJECT</span></p>
			</a>
		</div> -->
		@if($countcar != 0)
		<div class="carousel-item active">
			<img class="d-block w-100" src="{{url('uploads/carousel/'.$carousel['c_image'])}}" alt="{{$carousel['alt_image']}}">
		</div>
		

		@foreach($carousels as $c)
		<div class="carousel-item">
			<img class="d-block w-100" src="{{url('uploads/carousel/'.$c['c_image'])}}" alt="{{$c['alt_image']}}">
		</div>
		@endforeach
		@else
		<div class="carousel-item active">
			<img class="d-block w-100" src="{{url('cd-admin/images/1.jpg')}}" alt="Image1">
		</div>
		

		<div class="carousel-item">
			<img class="d-block w-100" src="{{url('cd-admin/images/2.jpg')}}" alt="Image2">

		</div>
		@endif

		
	</div>
	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>




<div class="container pad-top pad-bot">
	<div class="row">
		<div class="col-md-5">
			<div class="home-about-image">
				<img src="{{url('uploads/about/'.$a['image_name'])}}" alt="{{$a['image_alt']}}" class="img-fluid">
			</div>
		</div>
		<div class="col-md-7">
			<div class="home-about-text">
				<h2>Learn About <span>Hotel Excellence</span></h2>
				<div>{!!$a['summary']!!}</div>
				<div class="container-fluid pad-0 treasure-global-btn">
					<a href="{{url('about')}}" style="margin-top: 15px;">
						<p><span >LEARN MORE</span></p>
					</a>
				</div>
			</div>
		</div>
	</div>	
</div>


<div class="container pad-bot home-excellence-card">
	<h3><!-- Center For <span>Excellence</span> -->Room</h3>
	@if($rooms)
	@foreach($rooms as $key =>$r)
	@if($key % 2 == 0)
	<div class="row pad-bot">
		<div class="col-md-6">
			<div class="home-excellence-image">
				<img src="{{url('uploads/room/'.$r['cover_image'])}}" alt="{{$r['alt_cover']}}" class="img-fluid">
			</div>
		</div>
		<div class="col-md-6 home-excellence-text">
			<h5>{{$r['room_title']}}</h5>
			<p>{{$r['summary']}}</p>
		</div>
	</div>
	@else
	<div class="row pad-bot">
		<div class="col-md-6 home-excellence-text-1">
			<h5>{{$r['room_title']}}</h5>
			<p>{{$r['summary']}}</p>
		</div>
		<div class="col-md-6">
			<div class="home-excellence-image">
				<img src="{{url('uploads/room/'.$r['cover_image'])}}" alt="{{$r['alt_cover']}}" class="img-fluid">
			</div>
		</div>
	</div>
	@endif
	@if($key == 2)
	@break
	@endif
	@endforeach
	@if($roomslug)
<div class="container-fluid pad-0 treasure-global-btn">
		<a href="{{url('/room/'.$roomslug->room_slug)}}" style="margin-top: 15px;">
			<p><span>VIEW ALL</span></p>
		</a>
	</div>
	@endif
	@endif
</div>

</div>

@endsection