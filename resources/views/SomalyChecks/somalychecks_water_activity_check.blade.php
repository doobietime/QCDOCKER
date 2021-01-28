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



			<h2>Water Activity Check</h2>
			<h4>{{$today->format('l')}} <span> {{$today->format('d-m-Y')}}</span></h4>

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



	<form method="POST" enctype="multipart/form-data" action="{!! route('water.store')!!}">	{{csrf_field()}}
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



	@section('somalyjs_water')
<script src="/js/somaly_watercheck.js"></script>
@endsection
@endsection