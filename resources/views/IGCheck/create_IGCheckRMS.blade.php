@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Raw Material Specification (To be completed by QC)<div class="float-right">Document Version - {{$getVersion}}</div></div>

                <div class="card-body shadow-sm">
             
<div class="">
         <!--    //  *show inwards goods inspection details - igchecks','parameters','getBatch// -->
  			<h3>Item Code: 	{{$igchecks->item_code}}</h3>
               <h5>Item Name: 	{{$igchecks->item_name}}</h5>
               <h5>Supplier: {{$igchecks->igcheck_supplier}}</h5>
               <h5>PO Number: 	{{$igchecks->PO_number}}</h5>
               <h5>Created At: 	{{$igchecks->created_at}}</h5>
               <h5>Location: 	{{$igchecks->location}}</h5>
               
           </div>
           <hr />
                   <div class="alert border shadow-sm card ">


      <h5>Inwards Goods Inspection Summary</h5>

             

                 		<table class="table table-sm table-bordered batchTable">

               			<thead class="thead-light">
               				<tr>
               					<th>Batch Code</th>
               					<th>Best Before Date</th>
               					<th>Pallets</th>
               					<th>Quantity (kg)</th>
               					<th>Temperature</th>
               		

               				</tr>
               			</thead>

               			<tbody>
               				@foreach ($getBatch as $GB)
               				<tr>
               					
               					<td>{{$GB->batch_code}}</td>
               					<td>{{$GB->best_before}}</td>
               					<td>{{$GB->quantity_pallets}}</td>
               					<td>{{$GB->quantity}}</td>
               					<td>{{$GB->temperature}}</td>
               				</tr>
               				@endforeach


               			</tbody>
               		</table>


<!--Parameter Table -->
               		<table class="table table-sm table-bordered">

               			<thead class="thead-light">
               				<tr>
               					<th>Parameters</th>
               					<th>Specification</th>
               					<th>Result in Spec</th>
               					<th>Comments</th>
               				</tr>
               			</thead>
               			<tbody>


@foreach($param_lines as $param_line)
              <tr>
              <td>{{$param_line->parameter_name}}</td>
              <td>{{$param_line->specification}}</td>
              <td>{{$param_line->results_in_spec}}</td>
              <td>{{$param_line->comments}}</td>
              </tr>
              @endforeach


               			</tbody>

               		
               		</table>
</div>

<form method="POST" id="rmsform"  enctype="multipart/form-data" action="{!! route('igcheck_rms.create',$igchecks->id)!!}">	{{csrf_field()}}
  <div class="alert border shadow-sm alert-warning">
  	<h5>Notes by QA Officer</h5>
  	<input name="QANotes" type="text" class="form-control">
  </div>


   
 <input name="forkey" value="{{$igchecks->id}}" style="display:none ;"></input>
<div class="alert border shadow-sm ">
	<div class="float-right">Specification Version - {{$getSpecVersion}}</div>
	<h5 class="text-success">Specification to be completed by QA Officer</h5>

               		<table class="table table-sm table-bordered">
               				<thead class="thead-light">
               				<tr>
               					<th>Parameters</th>
               					<th>Specification</th>
               					<th>Result in Spec</th>
               					<th>Comments</th>
               				</tr>
               			</thead>
               			<tbody>


               				@foreach ($parameters as $parameter)
               				<tr>
               					<td  >{{$parameter->parameter_name}}<input name="p1[]" type="hidden" class="form-control" value="{{$parameter->parameter_name}}"></td>
               					<td  >{{$parameter->specification}}<input name="p2[]" type="hidden" class="form-control" value="{{$parameter->specification}}"></td>
               					
               					<td style="max-width:100px;">
               						<input readonly name="ris[]" class="asdf btn btn-primary form-control"  aria-pressed="false" autocomplete="off" value="No"></input>



               					</td>
               					<td><input name="coms[]" type="text" class="form-control"></td>
               					
               				</tr>
               				@endforeach
               			</tbody>
               		</table>

</div>
<div  class="form-group">
 	<input id="coaArea" type="file" class="float-left" name="soa[]" multiple>
 	<input name="forkey" value="{{$igchecks->id}}" style="display:none ;"></input>
 	<input name="version" value="{{$getSpecVersion}}" style="display:none;"></input>
</div>
<button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


$("#rmsform").on("submit", function(){

 
	if ($('#coaArea').get(0).files.length === 0){
		alert("Please upload a COA file");
		return false;
	}
	else{
	return confirm("Confirm COA is attached and Specification is completed ");
}
});

$( document ).ready(function() {


   $(".asdf").addClass("btn-danger active");
});


$(".asdf").click(function(){
	var x = $(this).attr("value");
	if(x == "No"){
		$(this).attr("value","Yes");
		$(this).removeClass("btn-danger");
		$(this).addClass("btn-success active");
		
	}
	if(x == "Yes"){
		$(this).attr("value","No");
		$(this).removeClass("btn-success");
		$(this).addClass("btn-danger active");
		
	}
	
})
</script>






@endsection