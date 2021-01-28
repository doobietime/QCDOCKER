@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-12">
			<h2>Scale Calibration</h2>
		</div>
	</div>
	<hr />
		@if(!empty($message))
	<div class="alert alert-success">
		{{ $message }}
	</div>
	@endif

@if($count == "0") 
<div class="col-12">

	<form method="POST" enctype="multipart/form-data" action="{!! route('cali.store')!!}">	{{csrf_field()}}

	
			   @foreach ($errors->all() as $message)
			   	<div class="alert alert-danger">
                <li>{{ $message }}</li>
                 </div>
                @endforeach
           

	<table class="table table-sm table-bordered">
               				<thead class="thead-light">
               				<tr>
               					
               					<th>Date</th>
               					<th>Scale Weight (100g)</th>
               				
               				</tr>
               			</thead>
               			<tbody>

               				<tr>
               					<td>
               						<input name="dt[]" readonly class="form-control" value="{{$today_notime}}">

               					</td>
               					<td>
               							<input name="sw[]" class="form-control">
               					</td>
              
               				</tr>
               		<!-- 		<tr>
               					<td>
               						<input name="dt[]"readonly class="form-control"  value="{{$today_notime}}">
               					</td>
               					<td>
               							<input name="sw[]"class="form-control">
               					</td>
              
               				</tr> -->
               				
               				
               			</tbody>
               		</table>

	</div>

	<div class="row">
	
			<div class=" col-md-4">
				<h5>Verified by: {{ Auth::user()->name }}</h5>
			</div>

	</div>
	<div class="row">
			<div class=" col-md-4">
				<h5>Date/Time: {{$today}}</h5>
			</div>
	
	</div>
<button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
</div>
@endif

@endsection