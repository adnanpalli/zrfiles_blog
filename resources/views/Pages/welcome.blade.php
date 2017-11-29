
@extends('main')

@section('title','| HOME PAGE')

@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
					  <h1>Welcome to Techno Blog....</h1>
					  <p class="lead">Thank u for visiting......</p>
					  <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a></p>-->
				</div>
			</div>	
		</div><!--end of header row-->
		<div class="row">
			<div class="col-md-8">
				@foreach($posts as $post)
				<div class="post">
					<p>{{ $post->title }}</p>
					<p>{{ substr(strip_tags($post->body),0,250) }} {{ strlen(strip_tags($post->body)) > 250 ? "...": ""}}</p>
					<a href="{{ url('blog/'.$post->slug)}}" class="btn btn-default btn-sm btn-primary">Read more</a>
					
				</div>
				<hr>
				@endforeach
			</div>	
		
		
			<div class="col-md-3 col-md-offset-1" style="color:blue;">
				<h1></h1>
			</div>	
		</div><!--end of header row-->
@endsection

