@extends('main')

@section('title','|All Employee ')

@section('content')

<div class="row">
<div class='col-md-8 col-md-offset-2'>
<table class=table>
	<thead>
		<th>NAME</th>
		<th>EMP NO</th>
		<th>DATE OF BIRTH</th>
	</thead>
	@foreach($Employees as $emp)
	<TBODY>
		<td>{{ $emp->first_name }}</td>
		<td>{{ $emp->emp_no }}</td>
		<td>{{ $emp->date_of_birth }}</td>
	</TBODY>
	@endforeach
</table>

</div>
</div>

@endsection