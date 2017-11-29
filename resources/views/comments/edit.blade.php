@extends('main')

@section('title','| View Posts')

@section('content')
<h1> Edit Comments </h1>

{{ Form::model($comment,['route' =>['comments.update',$comment->id],'method'=>'PUT'])}}

	{{ Form::label('name','Name:') }}
	{{ Form::text('name',null,['class'=>'form-control','disabled'=>'']) }}
	
	{{ Form::label('email','Email:') }}
	{{ Form::email('email',null,['class'=>'form-control','disabled'=>'']) }}
	
	
	{{ Form::label('comment','comment:') }}
	{{ Form::textarea('comment',null,['class'=>'form-control']) }}
	
	
	{{ Form::submit('Update',['class'=>'btn btn-danger']) }}
{{ Form::close()}}


@stop