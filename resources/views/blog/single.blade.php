@extends('main')
<?php $title = htmlspecialchars($post->title); ?>
@section('title',"|$title")

@section('content')


<div class="row">


	<div class="col-md-8 col-md-offset-2">
	<img src={{ asset('images/'.$post->image)}}  width="400" height="400">
	<h1>{{ $post->title }}</h1>
	<p>{!! $post->body !!}</p>
	<hr>
	<p>Posted In : {{ $post->category->name }} <br></p>
	
	
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<div class="comment-header"><h3><span class="glyphicon glyphicon-comment comment-icon"></span>{{$post->comments->count()}}  Comments</h3></div>
	@foreach($post->comments as $comment)
		<div class="comment">
			<div class="author-info">
				<img class="author-pic" src="{{ 'https://www.gravatar.com/avatar/'.md5( strtolower( trim( $comment->email ) ) )   }}">
				<div class="author-name">
				<h4>{{ $comment->name }}</h4>
				
				<p class="author-time">
				{{ $comment->created_at }}
				</p>
				</div>
			</div>
		
			<div class="comment-content">
			<p>{{ $comment->comment }}</p>
			</div>
		</div>
		@endforeach
	</div>
</div>

	<div class="row">
			<div id="comment_form" class="col-md-8 col-md-offset-2">
			
			{!!  Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])  !!}
			
			<div class="row">
			<div class="col-md-6">
				{{ Form::label('name','Name:') }}
				{{ Form::text('name',null,['class'=>'form-control']) }}
			</div>
			<div class="col-md-6">
				{{ Form::label('email','Email:') }}
				{{ Form::email('email',null,['class'=>'form-control']) }}
			</div>
			<div class="col-md-12">
				{{ Form::label('comment','Comment:') }}
				{{ Form::textarea('comment',null,['class'=>'form-control','rows' => '5']) }}
				
				{{ Form::submit('Add comment',['class'=>'btn btn-success btn-block form-spacing-top'])}}
			</div>
			</div>	
			{!! Form::close() !!}
			
			
			</div>
	</div>	
	
@endsection