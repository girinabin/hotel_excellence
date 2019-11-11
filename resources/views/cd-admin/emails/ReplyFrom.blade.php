@component('mail::message')
<div class="row">
Hello, {{$data['email']}}
<p>
	<div class="col-md-3">
		This is to hereby tell you that we have recieved your feedback and will try our best for the customer satisfaction.
		{{$data['subject']}}

		Message::{!!$data['message']!!}
	</div>
</p>
</div>
@endcomponent
