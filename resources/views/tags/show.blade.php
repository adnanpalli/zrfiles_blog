@extends('main')

@section('title',"| $tag->name ")

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1> {{ $tag->name }} - Tag : <small> {{$tag->posts->count()}} Tags </small> </h1>
	</div>
	<div class="col-md-2">
		
		<a href="{{ route('tags.edit',$tag->id)}}" class="btn btn-primary pull-right btn-block ">EDIT</a>
	</div>
	<div class="col-md-2">
	{{ Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE']) }}
	
	{{ Form::submit('Delete',['class'=> 'btn btn-danger btn-block form-spacing-top'])}}
	
	{{ Form::close() }}
	
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
		<thead>
		<tr>
		<th>#</th>
		<th>POST</th>
		<th>TAGS</th>
		<th></th>
		</tr>
		</thead>
		<tbody>
		@foreach($tag->posts as $post)
		<tr>
		
		<td>{{$post->id}}</td>
		<td>{{$post->title}}</td>
		<td>
			@foreach($post->tags as $tag )
			<span class="label label-default" style="padding:5px;"> {{ $tag->name }} </span>
			@endforeach
		</td>
		<td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-xs">view</a></td>
		</tr>
		@endforeach
		</tbody>
		</table>.
	</div>
</div>
@endsection