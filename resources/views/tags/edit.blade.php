@extends('main')

@section('title',"| Edit tag ")

@section('content')

<div class="row">

<div class="col-md-12">
{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}


	{{Form::label('name','Name :') }}
	{{Form::text('name',null,['class' => 'form-control']) }}
	{{Form::submit('Save Changes',['class'=>'btn btn-success form-spacing-top']) }}
	{!!Form::close() !!}
</div>


</div>

@endsection