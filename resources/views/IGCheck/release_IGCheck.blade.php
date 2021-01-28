@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Release Raw Material<div class="float-right">Document Version - {{$getVersion}}</div></div>

                <div class="card-body shadow-sm">
             
<div class="">
         <!--    //  *show inwards goods inspection details - igchecks','parameters','getBatch// -->
  <h3>Item: 	{{$igchecks->item_code}}</h3>
               <h5>Description: 	{{$igchecks->item_name}}</h5>
               <h5>Created at: 	{{$igchecks->created_at}}</h5>
               <h5>Supplier: {{$igchecks->igcheck_supplier}}</h5>
               <h5>PO Number: 	{{$igchecks->PO_number}}</h5>
               <h5>Location: 	{{$igchecks->location}}</h5>

             
           </div>
           <hr />
             <div class="alert border shadow-sm ">
             

               	<h5 class="text-success">Select Batch to Release</h5>

               		<select id="p_selector" class="form-control col-md-6">
               			<option>Select...</option>
               			@foreach ($getBatch as $GB)
               			<option value="{{$GB->id}}">{{$GB->batch_code}}</option>
               			@endforeach

               		</select>
<hr />
<p>Quantity Remaining : <span id="ajax_result"></span></p>

<span id="ajax_result2">

<form id="batchlineForm" class="form-inline" method="PUT" action="{{ url('/') }}/batch/">	{{csrf_field()}}


<input style="display:none ;" id="FKey"  name="FK" type="text" value="{{$igchecks->id }}">
 Release Amount :
  <div class="form-group mx-sm-3 mb-2">
	<input style="display:none ;" id="batchID" name="batchID" type="text">

    <input disabled id="qtyInput" required type="number" class="form-control" name="release_amount" min="0">


  </div>
  <div style="display:none;" class="form-group mx-sm-3 mb-2" id="axbox2">
  	<span class="badge badge-success">Released in AX</span>
  </div>
  <div style="display:none;" class="form-group mx-sm-3 mb-2" id="axbox">
  	<input class="form-check-input" type="checkbox" id="ax" name="ax">
  	 <label class="form-check-label" for="ax">
 Release in AX </label>
 
  </div>
<button id="submitBtn" type="submit" class="btn btn-primary mb-2">Release</button>

</form>
<hr />
<!-- 	<h5><span id="ajax_title"></span></h5>
 	<span>Released in AX : <span id="ajax_result"></span></span>
 	<p>Quantity Remaining : <span id="ajax_result2"></span></p>
 	
 	<hr /> -->
 	<h5>History</h5>

				<table id="HistoryTable" class="table table-sm table-bordered">
               		<thead class="thead-light">
               				<tr>
               					<th>Quantity Released</th>
               					<th>Date Released</th>
               	
               				</tr>
               			</thead>

               			<tbody>

               			
               		

               			</tbody>
               		</table>



               </div>

<div class="alert border shadow-sm alert-warning">
  	<h5>Notes by QA Officer</h5>
  	{{$notes}}
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
 <form  id="final_form" method="POST" enctype="multipart/form-data" action="{{ url('/') }}/igcheck_rms_final/{id}" >{{csrf_field()}}
 	<div  class="form-group">

 	<input name="forkey" value="{{$igchecks->id}}" style="display:none ;"></input>
<button  type="submit" class="btn btn-primary float-right">Finalize</button>
</div>
</form>

                </div>
 <div class="card-body">
	                <h5>Certificate Of Analysis</h5>
	           
	          			@foreach ($eURL as $url)
	{{$url}}         			
   <div class="embed-responsive embed-responsive-16by9">
	          			<iframe class="embed-responsive-item" src="{{url('storage/' .$url)}}" allowfullscreen></iframe>
</div>
	          		<hr />
	          			@endforeach
	          			@foreach ($eURLdoc as $urli)

	          			{{$urli}}
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

$("#final_form").on("submit", function(){

	if($('#HistoryTable tbody tr').length === 0){
		alert("Please release all batches");
		return false;
	}
	else{
	return confirm("Confirm Finalize? (no changes can be made once finalized)");
}
});




$("#submitBtn").prop("disabled",true);
	$("#batchlineForm").submit(function(e) {
		

     e.preventDefault();


 	 var x = $("#ajax_result").text();
 	 var x = parseInt(x,10);
	 var y = $("#qtyInput").val();
	 var remain = x-y;

	 console.log("input is" + y);
	 console.log("remaining is" + x);

   if(y > x)
  		{
    	alert("Input Quantity is Greater than Remaining..");
    	return false;
 		}
 		else{
 			var fsubmit = confirm("Confirm Release? (Make sure batch is released in AX)");
 			if(fsubmit == true){ 

		this.submit();
	}
 			//this.submit();
 		}
//prompt user batch is not released in AX do you wish to continue - using js switch app
});


	



	 	$('#p_selector').on('change', function (e){
  		var x = $('option:selected',this).val();
  		var y = $('#batchID2').val();
  		var z = $('#FKey').val();

  		      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     
        $.ajax({
           type:'GET',
           url:'/ajaxRequest_getBatches',
           data:{
           	batch_selected: x,
           	batchID : y,
           	FKey : z
           },
           dataType : 'json',
           success:function(data){

           	var i = data.batches[0].released_in_AX;
           	console.log(i);

           	if(i == "no" || i == null){
           		$("#axbox2").hide();
           		$("#axbox").show();
           	}
            else{
            	$("#axbox").hide();
            	$("#axbox2").show();
            }


           	$("#ajax_result").html(data.batches[0].quantity_remaining);
           


           		var qty = data.batches[0].quantity_remaining;
           		
           		console.log(qty);

           		
           		if(qty <= 0)
           		{
           			$("#qtyInput").prop("disabled",true);
           			$("#submitBtn").prop("disabled",true);
           		}
           		else{
           			$("#qtyInput").prop("disabled",false);
           			$("#submitBtn").prop("disabled",false);
           		}

           		

           	$("#batchID").val(data.batches[0].id);

           	$("#HistoryTable tbody").empty();


           	data.batchLines.forEach(function (line) {
		    $("#HistoryTable tbody").append(
		        "<tr>"
		            +"<td>"+line.quantity_released+"</td>"
		            +"<td>"+line.created_at+"</td>"
		        +"</tr>" )
		});

      //      	$.each(data,function(i,item){
		    // $("#HistoryTable tbody").append(
		    //     "<tr>"
		    //         +"<td>"+data.batchLines[0].quantity_released+"</td>"
		    //         +"<td>"+data.batchLines[0].created_at+"</td>"
		    //     +"</tr>" )
		    // })


           }
        });





  	});
</script>

@endsection
