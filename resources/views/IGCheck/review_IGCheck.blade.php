@extends('layouts.app')

@section('content')


<div class="container">
	@if(!empty($fnotes))
<div class="alert border shadow-sm alert-warning">
  	<h5>Finalize Notes</h5>
  	{{$fnotes}}
  </div>
  @endif

@if(empty($igchecks->verified_status))
	  <div class="card-body d-flex col-md-12">
  <form id="form1" method="POST"  enctype="multipart/form-data" action="{{ url('/') }}/IGCheck/Verify/{{$igchecks->id}}">	{{csrf_field()}}
  
<div class="input-group pr-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">Notes</span>
  </div>
  <input  name="f_notes" type="text" class="form-control" aria-describedby="basic-addon3">
</div>
  </form>
  <div class="col-md-2">
  <button type="submit" form="form1" class="form-control btn btn-primary"><a style="color:inherit; text-decoration:none;">Verify</a></button>
</div>

  </div>

    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Review Completed Inward Goods Check<div class="float-right">Document Version - {{$getVersion}}</div></div>


                <div class="card-body shadow-sm">
             
<div class="alert">
         <!--    //  *show inwards goods inspection details - igchecks','parameters','getBatch// -->
  <h3>Item Code: 	{{$igchecks->item_code}}</h3>
               <h5>Item name: 	{{$igchecks->item_name}}</h5>
                <h5>PO Number: 	{{$igchecks->PO_number}}</h5>
				<h5>Packing Slip Number: 	{{$igchecks->packing_slip}}</h5>
                <h5>Supplier: {{$igchecks->igcheck_supplier}}</h5>
               <h5>Created At: 	{{$igchecks->created_at}}</h5>
               <h5>Location: 	{{$igchecks->location}}</h5>
              

             
           </div>
             <div class="alert border shadow-sm">
             

              


<!-- 	<h5><span id="ajax_title"></span></h5>
 	<span>Released in AX : <span id="ajax_result"></span></span>
 	<p>Quantity Remaining : <span id="ajax_result2"></span></p>
 	
 	<hr /> -->
 	<h5>Release History</h5>
 

				<table id="HistoryTable" class="table table-sm table-bordered">
               		<thead class="thead-light">
               				<tr>
               					<th>Batch Code</th>
               					<th>Quantity Released</th>
               					<th>Date Released</th>
               	
               				</tr>
               			</thead>

               			<tbody>

               					@foreach ($batches as $bl)
               					
               				<tr>
               					<td>{{$bl->batch->batch_code}}</td>
               					<td>{{$bl->quantity_released}}</td>
               					<td>{{$bl->created_at}}</td>
               				</tr>
               				@endforeach
               				
               		

               			</tbody>
               		</table>



               </div>


                   <div class="alert border shadow-sm">
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
               					
               					<td >{{$GB->batch_code}}</td>
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
<div class="alert border shadow-sm alert-warning">
  	<h5>Notes by QA Officer</h5>
  	{{$notes}}
  </div>
   <form method="POST" action="{{ url('/') }}/igcheck_rms/{id}">	{{csrf_field()}}
 <input name="forkey" value="{{$igchecks->id}}" style="display:none ;"></input>
<div class="alert border shadow-sm">
	<div class="float-right">Specification Version - {{$igchecks->rmsversion_used}}</div>
	<h5>Specification Summary</h5>
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


@foreach($param_lines_RMS as $param_line_RMS)
              <tr>
              <td>{{$param_line_RMS->parameter_name}}</td>
              <td>{{$param_line_RMS->specification}}</td>
              <td>{{$param_line_RMS->results_in_spec}}</td>
              <td>{{$param_line_RMS->comments}}</td>
              </tr>
              @endforeach


               			</tbody>

               		
               		</table>

</div>

</form>
                </div>
	                <div class="card-body">
	                	<div class="d-flex pb-3">
	                		<div class="col-md-3">
	                <h5>Certificate of Analysis</h5>
	            </div>
	            <div class="col-md-4">

	                <div class="float-right">
	            <form id="form2" method="POST"  enctype="multipart/form-data" action="{{ url('/') }}/IGCheck/updateSoa/{{$igchecks->id}}">	{{csrf_field()}}

<small>Incorrect? Upload new Certificate of Analysis. This will delete all previous documents.
	                	<input required id="newCert" type="file" name="updated_soa[]" multiple>

</small>
	                </div>

	            </div>

	            <div class="col-md-3">

	            	<button  type="submit" form="form2" class="form-control btn btn-primary"><a style="color:inherit; text-decoration:none;">Upload</a></button>
	            	
	            </div>
	            </div>
 <hr />
	           

	          			@foreach ($eURL as $url)
	{{$url}}         			
   <div class="embed-responsive embed-responsive-16by9">
	          			<iframe class="embed-responsive-item" src="{{url('storage/' .$url)}}" allowfullscreen></iframe>
</div>
	          		<hr />
	          			@endforeach
	          			@foreach ($eURLdoc as $urli)

	          			{{$urli}}<br />
	          			*We cannot display word documents - please download to view. Thanks <br />
	          			<a href="{{url('storage/'.$urli)}}">Download Document</a>


	          			@endforeach

	          		</div>
	          		
	          		</div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).on("click", "#verify_btn" , function() {

});
</script>

@endsection