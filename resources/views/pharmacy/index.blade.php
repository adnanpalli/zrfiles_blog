@extends('main')

@section('title','|All Employee ')

@section('content')

<div class="row">
<div class='col-md-10 col-md-offset-1'>


<table class=table>
	<thead>
		<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Moh license</th>
		<th>Moh Expiry</th>
		</tr>
	</thead>
	@foreach($Pharmacies as $pharmacy)
	<TBODY>
	@php
	$expdate = $pharmacy->pharmacy_docs->moh_expiry;

	
	$pieces = explode("-", $expdate);
      $year =  $pieces[0]; // piece1
      $month =  $pieces[1]; // piece2
      $date = $pieces[2];    
      $Gregorain_date = Hijri2Greg($date,$month,$year,'date');
      //echo $Gregorain_date;
      $pieces = explode("-", $Gregorain_date);
      $yr =  $pieces[0]; // piece1
      $mon =  $pieces[1]; // piece2
      $day = $pieces[2];  
     
      //this is convert string gregorian date to actual date format
      $new_Gregorain_expiry =  date("Y-m-d", mktime(0, 0, 0, $mon, $day, $yr));
      $todaydate = date('Y-m-d');
	
	@endphp	
		<tr>
		<td>{{ $pharmacy->id }}</td>
		<td>{{ strtoupper($pharmacy->name)  }}</td>
		<td>{{ $pharmacy->address  }}</td>
		<td>{{ $pharmacy->pharmacy_docs->moh_license_no  }}</td>
		@php if($todaydate > $new_Gregorain_expiry){ @endphp
				<td style="color:red; font-weight:bold">
					{{ $pharmacy->pharmacy_docs->moh_expiry  }}
				</td>
			@php } 
			else
			{
				$datetime1 = date_create($new_Gregorain_expiry);
          		$datetime2 = date_create($todaydate);
          		$interval = date_diff($datetime1, $datetime2);
          		$diff = $interval->format('%a%');
          		if($diff<=35) 
          		{
					@endphp 	
					<td style="color:orange; font-weight:bold">
							{{ $pharmacy->pharmacy_docs->moh_expiry  }}
						</td>
					@php 
				} 
				else 
				{ 
					@endphp
					<td style="color:green; font-weight:bold">
						{{ $pharmacy->pharmacy_docs->moh_expiry  }}
					</td>
					@php 
				} 
				@endphp
				@php 
			}
			@endphp
		</tr>
	</TBODY>
	@endforeach
</table>

</div>
</div>

@endsection