extends('cd-admin.frontend.home-master')

<!-- page title -->
@section('page-title')	
{{$r->room_title}}| Hotel Excellence	
@endsection

<!-- website content -->
@section('content')
<div class="container pad-top pad-bot deluxe-room-top">
	<h2><span>{{$r->room_title}}</span></h2>
	<p>{!!$r->description!!}</p>

	<h4>Images</h4>
	<div class="row">
		<div class="col-md-4">
			<a class="thumbnail fancybox album-link" href="{{url('uploads/room/'.$r->cover_image)}}" rel="lightbox">
				<div class="deluxe-room-image relative-container">
					<img class="img-responsive album-image" alt="" src="{{url('images/room/room7.jpg')}}">
					<div class="relative-albumcontent deluxe-room-content ">
						<span>
							<h3>main room</h3>
						</span>
					</div>
				</div>
			</a>
		</div>

		<div class="col-md-4">
			<a class="thumbnail fancybox album-link" href="{{url('images/floor/floor4.jpg')}}" rel="lightbox">
				<div class="deluxe-room-image relative-container">
					<img class="img-responsive album-image" alt="" src="{{url('images/floor/floor4.jpg')}}">
					<div class="relative-albumcontent deluxe-room-content ">
						<span>
							<h3>floor 4</h3>
						</span>
					</div>
				</div>
			</a>
		</div>

		<div class="col-md-4">
			<a class="thumbnail fancybox album-link" href="{{url('images/floor/floor5.jpg')}}" rel="lightbox">
				<div class="deluxe-room-image relative-container">
					<img class="img-responsive album-image" alt="" src="{{url('images/floor/floor5.jpg')}}">
					<div class="relative-albumcontent deluxe-room-content ">
						<span>
							<h3>floor 5</h3>
						</span>
					</div>
				</div>
			</a>
		</div>

		<div class="col-md-4">
			<a class="thumbnail fancybox album-link" href="{{url('images/floor/floor6.jpg')}}" rel="lightbox">
				<div class="deluxe-room-image relative-container">
					<img class="img-responsive album-image" alt="" src="{{url('images/floor/floor6.jpg')}}">
					<div class="relative-albumcontent deluxe-room-content ">
						<span>
							<h3>floor 6</h3>
						</span>
					</div>
				</div>
			</a>
		</div>

		<div class="col-md-4">
			<a class="thumbnail fancybox album-link" href="{{url('images/floor/floor7.jpg')}}" rel="lightbox">
				<div class="deluxe-room-image relative-container">
					<img class="img-responsive album-image" alt="" src="{{url('images/floor/floor7.jpg')}}">
					<div class="relative-albumcontent deluxe-room-content ">
						<span>
							<h3>floor 7</h3>
						</span>
					</div>
				</div>
			</a>
		</div> 
	</div>
</div>



@endsection