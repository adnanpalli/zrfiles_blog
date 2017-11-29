@extends('main')

@section('title','| View Posts')

@section('content')
<div class="row">

<div class="col-md-8">
	<div id="comments-table">
	<h1>Realy Delete this comment ???</h1>
			<strong>Name : {{$comment->name}} </strong><br>
			<strong>Email : {{$comment->email}} </strong><br>
			<strong>comment : {{$comment->comment}} </strong>	
	</div>

	{!! Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'delete']) !!}
	{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-lg form-spacing-top']) }}
	{!! Form::close() !!}

</div>
</div>
@stop