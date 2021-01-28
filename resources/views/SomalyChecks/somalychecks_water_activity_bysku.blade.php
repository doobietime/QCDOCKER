@extends('layouts.app')

@section('content')
	<form method="POST" enctype="multipart/form-data" action="{!! route('mo.store')!!}">	{{csrf_field()}}
<div class="container">
	<div class="row">
		<div class="col-3">
			SKU : 
			<select id="sku_selector" class="form-control">
			<option selected>Choose...</option>
			@foreach($prods as $prod)

			<option value="{{$prod->id}}">{{$prod->Code}}</option>
			@endforeach

			</select>

		</div>

		<div class="col-3">
			MO : 
			<select name="moselector" id="mo_selector" class="form-control">
			<option selected>Choose...</option>


			</select>


		</div>
	</div>

	<div class="row pt-2">
		<h5>Water Activity Results</h5>
		<div  class="col-12" id="result_div" >

					<table id="motable" class="table table-bordered table-sm batchTable">

               			<thead class="thead-light">
               				<tr>
               					<th>Done By</th>
               					<th>Type</th>
               					<th>1</th>
               					<th>2</th>
               					<th>3</th>
               					<th>Avg</th>
               				</tr>
               			</thead>

               			<tbody>
               	


               			</tbody>
               		</table>
               		    <button disabled type="button" class="btn btn-outline-secondary btn-sm float-left" id="addLine">Add Line</button>  
               		    <button id="submitMO" disabled type="submit" class="btn btn-primary float-right">Submit</button>
               		
		</div>
	

	</div>
</div>
</form>

<!--syrup-->
<div class="container">
		<form method="POST" enctype="multipart/form-data" action="{!! route('syrup.store')!!}">	{{csrf_field()}}
<hr />
	<div class="row pt-2">	
		<div class="col-5 pb-2">
		<h5>Syrup Results</h5>

		<input name="syrupname" id="syrupname" hidden >

		Syrup : 
			<select name="syrup_code" id="syrup_selector" class="form-control">
			<option selected>Choose...</option>
			@foreach($prods as $prod)
			@if($prod->product_type == "S")

			<option value="{{$prod->id}}">{{$prod->Code}} - {{$prod->Description}}</option>
			@endif
			@endforeach
			

			</select>
</div>
		<div class="col-12">
	

					<table id="stable" class="table table-bordered table-sm batchTable ">

               			<thead class="thead-light">
               				<tr>
               					<th>Batch</th>
               					<th>Made Date</th>
               					<th>Type</th>
               					<th>1</th>
               					<th>2</th>
               					<th>3</th>
               					<th>Avg</th>
               				</tr>
               			</thead>

               			<tbody>

       
               				

               			</tbody>
               		</table>
               		    <button  type="button" class="btn btn-outline-secondary btn-sm float-left" id="saddLine">Add Line</button>  
               		    <button id="submitS"  type="submit" class="btn btn-primary float-right">Submit</button>
               		
		


		</div>
	</div>
</div>
</form>

@endsection

@section('somalyjs')
<script src="/js/somaly.js"></script>

<script>




	$(document).ready(function() {
    $('#sku_selector').select2();
	});
//add line for wa table
	$("#addLine").on('click', function() {
	

			$("#motable > tbody:last-child").append(
				'<tr class="doobie"><td></td><td><select name="type[]" class="form-control"><option value="Start">Start</option><option value="Middle">Middle</option><option value="End">End</option><option value="Retest">Retest</option><option value="NA">N/A</option></select></td><td><input step="0.001" name="set1[]" type="number" class="form-control"></td><td><input step="0.001" placeholder=""  name="set2[]" type="number" class="form-control"></td><td><input step="0.001"placeholder=""  name="set3[]" type="number" class="form-control"></td></tr>'
				);
	
	});

//add line for syrup table

	$("#saddLine").on('click', function() {
	

			$("#stable > tbody:last-child").append(
				'<tr class="doobie"><td><select name="batch[]" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></td><td><input name="mdate[]"class="form-control datepicker_recurring_start"/></td><td><select name="type[]" class="form-control"><option value="Start">Start</option><option value="Middle">Middle</option><option value="End">End</option><option value="Retest">Retest</option><option value="NA">N/A</option></select></td><td><input step="0.001" name="set1[]" type="number" class="form-control"></td><td><input step="0.001" placeholder=""  name="set2[]" type="number" class="form-control"></td><td><input step="0.001"placeholder=""  name="set3[]" type="number" class="form-control"></td></tr>'
				);
	
	});



 $('body').on('focus',".datepicker_recurring_start", function(){
	$(this).datepicker(
		{
			dateFormat: 'yy-mm-dd'
		});
	console.log('clicked');
})



</script>
@endsection