
@extends('main')
@section('title','| CONTACT PAGE')

@section('content')
		<div class="row">
			<div class="col-md-12">
				<h1>Contact me</h1>
				<hr>
				<form action="{{ url('contact') }}" method="POST">
				{{ csrf_field() }}
					<div class="from-group">
						<label name="email">Email :</label>
						<input id="email" name="email" class="form-control">
					</div>
					<div class="from-group">
						<label name="subject">Subject</label>
						<input id="subject" name="subject" class="form-control">
					</div>
					<div class="from-group">
						<label name="message">Message:</label>
						<textarea id="message" name="message" class="form-control">Type your message here....</textarea>
					</div>
					<div class="from-group">
						<input type="submit" value="Send Message" class="btn btn-success form-spacing-top">
					</div>
				</form>
			</div>	
		</div><!--end of header row-->
@endsection