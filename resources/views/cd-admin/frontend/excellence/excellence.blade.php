@extends('cd-admin.frontend.home-master')

<!-- page title -->
@section('page-title')	
Accomodation	
@endsection


<!-- website content -->
@section('content')

<div class="container pad-top excellence-top">
	<h1>{{$acc['accomodation_name']}}</h1>
	<p>{{$acc['summary']}}</p>
	<p style="text-align: center;"><b>What makes a good life:</b></p>
	<div class="container">
		<div class="row">
			@foreach($tailor as $t)
			<div class="col-md-3">
				<div class="excellence-card">
					<div class="excellence-card-image">
						<img class="img-fluid" alt="" src="{{url('uploads/tailoredprograms/'.$t['t_image'])}}">
					</div>
					<p>{{$t['name']}}</p>
					<hr>
					<!-- Button trigger modal -->
					<div class="treasure-global-btn1">
						<a href="{{url('about')}}" style="margin-top: 15px;" data-toggle="modal" data-target="#exampleModal{{$t['id']}}">
							<p><span>LEARN MORE</span></p>
						</a>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal{{$t['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">{{$t['name']}}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>{{$t['summary']}}</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>

	<p>{!!$acc['description']!!}</p>
	
	
<!-- 	<div id="owl-excellence">
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/new/1.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/new/2.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/new/3.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/new/4.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/new/5.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
	</div>

	<h2 class="pad-top">already existing <span>feature</span></h2>
</div>


<!-- features -->
<!-- <div class="container pad-bot">

	<h3 class="text-center">Swimming Pool</h3>
	<div id="owl-swimming-pool">
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/swimming/swimming1.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/swimming/swimming2.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/swimming/swimming3.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</div> -->


<!-- <div class="container pad-bot">
	<h3 class="text-center">Restaurant</h3>
	<div id="owl-restaurant">
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/restaurant/restaurant1.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/restaurant/restaurant2.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/restaurant/restaurant3.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</div>

<div class="container pad-bot">
	<h3 class="text-center">Gym</h3>
	<div id="owl-gym">
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/gym/2.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/gym/1.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
		<div class="item">
			<div class="excellence-image">
				<img src="{{url('public/images/gym/3.jpg')}}" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</div>  -->
@endsection