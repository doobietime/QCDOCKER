@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-12">
				@if(!empty($message))
	<div class="alert alert-success">
		{{ $message }}
	</div>
	@endif



			<h2>Daily Calibration Checks  : {{$today->format('l')}} <span> {{$today->format('d-m-Y')}}</span></h2>
			<!-- <h4>{{$today->format('l')}} <span> {{$today->format('d-m-Y')}}</span></h4> -->
			<hr />
	<h3>Water Activity Check</h3>
			<table class="table">
				<thead>
					<tr>
					<th>Machine</th>
					<th>Type</th>
					<th>Result</th>
					<th>Test Done</th>
				</tr>
				</thead>
				<tbody>
					@foreach($get5 as $g5)
					<tr class="alert-success">
						<td>{{$g5->calibration_set}}</td>

						<td>{{$g5->test_type}}</td>
						<td class="p5">{{$g5->calibration_type}}</td>
						<td>{{$g5->created_at}}
					</tr>
					@endforeach
				<tr>
					<th>Machine</th>
					<th>Type</th>
					<th>Result</th>
					<th>Test Done</th>
				</tr>
					@foreach($get7 as $g7)
					<tr class="alert-success">
						<td>{{$g7->calibration_set}}</td>
						<td>{{$g7->test_type}}</td>
						<td class="p7">{{$g7->calibration_type}}</td>
						<td>{{$g7->created_at}}
					</tr>
					@endforeach
				
				</tbody>
			</table>
		</div>
	</div>
	<hr />



	<form method="POST" class="pb-5" enctype="multipart/form-data" action="{!! route('water.store')!!}">	{{csrf_field()}}
	<div class="row fluid ">


<!--if water check is not done -->
		<div class="col-md-4">

			<div class="card " >
				<div class="card-header">
					0.500 Calibration  <br /><strong>Range: 0.497 - 0.503</strong>
					
				</div>

			@if($get5)
			<ul class="list-group list-group-flush">
						<li class="list-group-item"><input type="number" step="0.001" name="point5[]" class="form-control" placeholder="AW1"></li>
						<li class="list-group-item"><input type="number" step="0.001" name="point5[]" class="form-control"placeholder="AW2"></li>
					</ul>


			@endif
					

			</div>
		</div>




		<div class="col-md-4" id="retest_box" >

			<div class="card " >
				
				<div class="card-header">
				0.760 Calibration <br /> <strong>Range: 0.757 - 0.763</strong>
				
				</div>
				
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><input type="number"  step="0.001" name="point7[]" class="form-control"placeholder="AW1"></li>
						<li class="list-group-item"><input type="number" step="0.001"  name="point7[]" class="form-control"placeholder="AW2"></li>
					</ul>
		
			</div>
		</div>

</div>
	<button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

<!--SCALE CALIBRATION-->
<hr />
<h3>Scale Calibration</h3>
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
               						<input name="dt[]" readonly class="form-control" value="{{$today_no_time}}">

               					</td>
               					<td>
               							<input name="sw[]" class="form-control">
               					</td>
              
               				</tr>
               		<!-- 		<tr>
               					<td>
               						<input name="dt[]"readonly class="form-control"  value="{{$today_no_time}}">
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

@endif


@section('somalyjs_water')
<script src="/js/somaly_watercheck.js"></script>
@endsection
@endsection