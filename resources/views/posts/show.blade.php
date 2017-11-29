@extends('main')

@section('title','| View Posts')

@section('content')

<div class="row">
	<div class="col-md-8">
		<img src={{ asset('images/'.$posts->image) }} width="400" height="400">
		<h1> {{ $posts->title }} </h1>
		<p class="lead"></p>
		{!! $posts->body !!}
		<hr>
		<div class="tag">
		@foreach($posts->tags as $tag)
			<span class="label label-default">{{$tag->name}}</span>
		@endforeach
		</div>
		
		<div id="comments-table">
		<h1>{{$posts->comments->count() }}Comments </h1>
		
		</div>
		<table class="table">
		<thead>
		<tr>
		<th>#</th>
		<th>Name</th>
		<th>Email</th>
		<th>Comment</th>
		<th>EDIT/DELETE</th>
		</tr>	
		</thead>
		
		@foreach($posts->comments as $comment)
		<tbody>
		<tr>
		<td>{{ $comment->id}}</td>
		<td>{{ $comment->name}}</td>
		<td>{{ $comment->email}}</td>
		<td>{{ $comment->comment}}</td>
		<td>
		
		<a href="{{ route('comments.edit',$comment->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
		<a href="{{ route('comments.delete',$comment->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
		</td>
		</tr>
		@endforeach
		
		
		</tbody>
		</table>
		
	</div>
	<div class="col-md-4">
		<div class="well">
		<dl class="dl-horizontal">
			<dt>Url Slug: </dt>
			<dd><a href="{{ url('blog/'.$posts->slug) }}">{{ url($posts->slug) }}</dd>
		</dl>
		<dl class="dl-horizontal">
			<dt>Created At: </dt>
			<dd>{{ date('M j, Y h:ia ',strtotime($posts->created_at)) }}</dd>
		</dl>
		<dl class="dl-horizontal">
			<dt>Last updated:</dt>
			<dd>{{ date('M j, Y h:ia',strtotime($posts->updated_at)) }}</dd>
		</dl>
		<dl class="dl-horizontal">
			<dt>Category:</dt>
			<dd>{{ $posts->category->name }}</dd>
		</dl>		
		<hr>
		<div class="row">
			<div class="col-sm-6">
			{!! Html::linkRoute('posts.edit','Edit',array($posts->id),array('class'=>'btn btn-primary btn-block')) !!}
			
			</div>
			<div class="col-sm-6">
				
				{!! Form::open(['route'=>['posts.destroy',$posts->id],'method'=>'delete']) !!}
				
				
				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
				
				{!! Form::close() !!}
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
			{!! Html::linkRoute('posts.index','<< See all Posts ',[],array('class'=>'btn btn-primary btn-block form-spacing-top')) !!}
			
			</div>
			
		</div>
		</div>
	</div>
</div>


@endsection