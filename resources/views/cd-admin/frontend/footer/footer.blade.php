<div class="container-fluid footer-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-4 footer-info">
				<h5>Hotel Excellence</h5>
				<p>Whether visitors are travelling for business or pleasure, for one night or several weeks, to see all that Kathmandu has to offer or to retreat to a luxurious hideaway, Hotel Excellence offers authentic Nepali hospitality and unrivalled facilities. Offering a calm and professional environment, while benefiting from easy access to Nepal's capital, guests will find an immaculate service that can cater to their every need.</p>
				<ul>
					<li><a href="#"><i class="fab fa-facebook-square fa-3x"></i></a></li>
					<li><a href="#"><i class="fab fa-instagram fa-3x"></i></a></li>
					<li><a href="#"><i class="fab fa-twitter-square fa-3x"></i></a></li>
				</ul>
			</div>
			<div class="col-md-4 footer-feedback">
				<h5>Feedback</h5>
				<form method="POST" action="{{route('add_feedback')}}">
					@csrf
					<div class="form-group">
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
					</div>
					<div class="form-group">
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your message" name="message"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="col-md-4 footer-contact">
				<h5>Contact Us</h5>
				<p>Give us a call or come see us !!</p>
				<ul>
					<li><a href=""><p><i class="fas fa-mobile-alt"></i>(+977)-014-373-344</p></a></li>
					<li><a href=""><p><i class="fas fa-envelope"></i>inquiry@hotelexcellencenepal.com</p></a></li>
					<li><a href=""><p><i class="fas fa-map-marker-alt"></i>Tokha Road, Dhapasi Heights, Kathmandu, Nepal</p></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>




<div class="continer-fluid footer-copyright-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-6 footer-copyright-left">
				<p>Copyright &copy;{{date("Y")}}, Hotel Excellence.</p>
			</div>
			<div class="col-md-6 footer-copyright-right">
				<p>Developed with <i class="fas fa-heart"></i> : <a href="https://creatudevelopers.com/" target="_blank">Creatu Developers</a></p>
			</div>
		</div>
	</div>
</div>