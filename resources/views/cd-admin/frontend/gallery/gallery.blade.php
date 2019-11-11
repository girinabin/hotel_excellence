@extends('cd-admin.frontend.home-master')

<!-- page title -->
@section('page-title')	
{{$fa['facility_name']}}| Hotel Excellence
@endsection


<!-- website content -->
@section('content')
<div class="container padding-tb top-bg">
	<h2>{{$fa['facility_name']}}</h2>
	<div class="row gallery-row-padding">
@foreach($gallery as $g)
		<div class="col-md-4">
			<div class="gallery-img relative-container">
				<a class="thumbnail fancybox" href="{{url('uploads/gallery/'.$g['image_name'])}}" rel="lightbox">
					<img src="{{url('uploads/gallery/'.$g['image_name'])}}" class="img-responsive gallery-image">
				</a>
			</div>
		</div>
		
@endforeach
	</div>
</div>
@endsection