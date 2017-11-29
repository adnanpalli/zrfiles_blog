@extends('main')


@section('title','|create employee')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')

<div class="row">
	
	<div class="col-md-8 col-md-offset-2">
		<h1>CREATE EMPLOYEE</h1>
		{!! Form::open(array('route'=>'employee.store','data-parsley-validate' => '','files' => true,'method'=>'POST')) !!}
		{{ Form::label('emp_no','Employee Number') }}
		{{ Form::text('emp_no',null,array('class'=>'form-control','required'=>'')) }}

		{{ Form::label('first_name','Frist Name') }}
		{{ Form::text('first_name',null,array('class'=>'form-control','required'=>'')) }}

		{{ Form::label('last_name','Last Name') }}
		{{ Form::text('last_name',null,array('class'=>'form-control','required'=>'')) }}

		{{ Form::label('email','Email Address') }}
		{{ Form::text('email',null,array('class'=>'form-control','required'=>'','data-parsley-type'=>'email')) }}

		{{ Form::label('designation','Designation') }}
		{{ Form::select('designation',['01'=>'Pharmacist','02'=>'labor'],null,array('class'=>'form-control')) }}

		{{ Form::label('date_of_birth','Date of Birth') }}
		{{ Form::date('date_of_birth',\Carbon\Carbon::now(),array('class'=>'form-control')) }}

		{{ Form::label('date_of_join','Date of Join') }}
		{{ Form::date('date_of_join',\Carbon\Carbon::now(),array('class'=>'form-control')) }}


		{{ Form::label('nationality','Nationality') }}
		{{ Form::select('nationality',['india'=>'INDIA','pakistan'=>'PAKISTAN'],null,array('class'=>'form-control')) }}

		{{ Form::label('contact_no','Contact Number') }}
		{{ Form::text('contact_no',null,array('class'=>'form-control')) }}
		<br>

		{{ Form::submit('Save',array('class'=>'btn btn-primary btn-block')) }}

		{!! Form::close() !!}

	</div>
</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection