@extends('cd-admin.frontend.home-master')

<!-- page title -->
@section('page-title')	

@endsection


<!-- website content -->
@section('content')
<div class="container padding-tb top-bg">
	<h2>album</h2>
	<div class="row">
		@foreach($fac as $a)
		<div class="col-md-6">
			<a href="{{url('/album/'.$a['slug'])}}" class="album-link">
				<div class="album-img relative-container">
					<img src="{{url('uploads/facility/'.$a['facility_image'])}}" class="img-responsive album-image" alt="{{$a['image_alt']}}">
					<div class="relative-albumcontent album-content ">
						<span>
							<h3>{{$a['facility_name']}}</h3>
						</span>
					</div>
				</div>
			</a>
		</div>
		@endforeach
		
		
	</div>
</div>	
@endsection