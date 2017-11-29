@extends('main')

@section('title',"|All posts")

@section('content')


<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<h1>Blog</h1>
	</div>

	<div class="col-md-8 col-md-offset-2">
	@foreach($posts as $post)
	<h1>Title : {{ $post->title }}</h1>
	<h5>Created : {{ date('M j, Y h:ia ',strtotime($post->created_at)) }}</h5>
	<p>Body : {{ substr(strip_tags($post->body),0,250) }} {{strlen(strip_tags($post->body))>250?"...":"" }}</p>
	<a href="{{ url('blog/'.$post->slug)}}" class="btn btn-default btn-sm btn-primary">Read more</a>
	<hr>
	@endforeach
	
	</div>
</div>	
<div class="row">	
<div class="col-md-12">
	<div class="text-center">
		{!! $posts->links(); !!}
	</div>
</div>
</div>
@endsection