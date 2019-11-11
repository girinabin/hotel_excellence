@extends('cd-admin.frontend.home-master')
<!-- page title -->
@section('page-title')

{{$r->room_title}}| Hotel Excellence
@endsection


<!-- website content -->
@section('content')

<div class="container pad-top pad-bot apartment-top">
	<h2>{{$r->room_title}}</h2>
	<p>{!!$r->description!!}</p>

	<h4>Images</h4>
	<div class="row">
		<div class="col-md-6">
			<a class="thumbnail fancybox album-link" href="{{url('uploads/room/'.$r->cover_image)}}" rel="lightbox">
				<div class="apartment-image relative-container">
					<img class="img-responsive album-image" alt="" src="{{url('uploads/room/'.$r->cover_image)}}">
					<div class="relative-albumcontent apartment-content ">
						<span>
							<h3>{{$r->alt_cover}}</h3>
						</span>
					</div>
				</div>
			</a>
		</div>

	</div>
</div>

@endsection