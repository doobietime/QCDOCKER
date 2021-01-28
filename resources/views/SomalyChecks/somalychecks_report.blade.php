@extends('layouts.app')

@section('content')

<div class="container-fluid">


	
<div class="row pb-0">
	<div class="col-6 pb-0">
			<h4>{{$contentType}} History </h4>
	</div>
	<div class="col-6 pb-0">
		<div class="float-right mb-6">{{ $results->links() }}</div>
	</div>
</div>





<table class="table table-bordered table-hover table-sm" style="font-size:12px">

	<thead class="thead-light">
		<tr >
			<th>Date</th>
			<th>Product</th>
			<th>MO #</th>
			<th>Film Part</th>
			<th>Film Ver.</th>
			<th>Done By</th>
			<th>Seal Test</th>
			<th>Fin Seal Even & Aligned</th>
			<th>BBD Correct</th>
			<th>BBD Quality & Alignment</th>
			<th>Carton Label</th>
			
			<th>Check 1</th>
			<th>Check 2</th>
			<th>Check 3</th>
			<th>Check 4</th>
			<th>Check 5</th>
			<th>Average</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody >
		@foreach($results as $result)

		<tr>
			<td>{{$result->created_at}}</td>
			<td>{{$result->product_used_code}}</td>
			<td>{{$result->mo_number}}</td>
			<td>{{$result->film_part}}</td>
			<td>{{$result->version}}</td>
			<td>{{$result->created_by}}</td>
			@foreach($result->pouchChecks_lines as $resultl)
			<td>{{$resultl->result_in_spec}}
				@if($resultl->comments)
				<span class="badge badge-warning">*{{$resultl->comments}}</span>
				@endif
			</td>
			
			@endforeach
			


			@foreach ($result->pouchChecks_lines_weight as $resultlw)
			<td>{{$resultlw->check1}}</td>
			<td>{{$resultlw->check2}}</td>
			<td>{{$resultlw->check3}}</td>
			<td>{{$resultlw->check4}}</td>
			<td>{{$resultlw->check5}}</td>
			<td class="alert-info">{{$resultlw->average}}</td>
			@endforeach

			@if($result->verified_status)
			<td style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-success'>Verified</span></td>
			@else
			<td id="{{$result->id}}" style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-danger update'>Verify</span></td>
			@endif

				
			
			<td style="cursor: pointer; text-align: center">
				@foreach ($result->pouchChecks_lines as $resultl)

				@if($resultl->specification)
				<span style="vertical-align: middle" class='badge badge-primary' data-toggle='modal' data-target='#a{{$resultl->pouchCheck_id}}'>Details</span>
				@endif

				@if(count($result->pouchChecks_mo)> 0)
				<span style="vertical-align: middle" class="badge badge-info">*WA</span>
				@endif
				
				
		


				   <div class="modal fade" id="a{{$resultl->pouchCheck_id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	@if($result->comments)
      	<h4 class="alert-warning">Verify Comments</h4>
      	{{$result->comments}}
      	<hr />
      	@endif

      	<h4 class="alert-info">Re-Test Results</h4>

		@if(count($result->pouchChecks_retest) > 0)
      		<table class="table table-sm">
      			<thead>
      				<tr>
      					<th>Check 1</th>
      					<th>Check 2</th>
      					<th>Check 3</th>
      					<th>Check 4</th>
      					<th>Check 5</th>
      					<th>Average</th>
      				</tr>
      			</thead>
      			<tbody>

      				@foreach ($result->pouchChecks_retest as $rtest)
      				<tr>
      					
      				<td>{{$rtest->check1}}</td>
      				<td>{{$rtest->check2}}</td>
      				<td>{{$rtest->check3}}</td>
      				<td>{{$rtest->check4}}</td>
      				<td>{{$rtest->check5}}</td>
      				<td>{{$rtest->average}}</td>

      			
      			</tr>
      				@endforeach
      			</tbody>

      		</table>
      		
      		@else
      		<div >No Re-test records exist</div>
      		@endif
      		
<hr />
      		
<h4 class="alert-info">Dates</h4>
      		<table class="table table-sm">

      			<thead>
      				<tr>
      					<th>Made Date</th>
      					<th>BB Date</th>
      					<th>Packed Date</th>
      				</tr>
      			</thead>
      			<tbody>
      				
      				<tr>
      					
      				<td>{{$result->made_date}}</td>
			<td>{{$result->bb_date}}</td>
			<td>{{$result->packed_date}}</td>
      			
      			</tr>
      				
      			</tbody>

      		</table>

      		<hr/>
          <!--mo and lines-->

     <h4 class="alert-info">Water Activity </h4>
     @foreach ($result->pouchChecks_mo as $pouchChecks_moo)
    <strong>MO Number: {{$pouchChecks_moo->mo_number}}</strong>


	     <table class="table table-sm">
      			<thead>
      				<tr>
      					<th>Type</th>
      					<th>1</th>
      					<th>2</th>
      					<th>3</th>
      					<th>Avg</th>
      				</tr>
      			</thead>
      			<tbody>
      				
	     @foreach( $pouchChecks_moo->pouchChecks_mo_lines as $pp)
      				<tr>
      					
      				<td>{{$pp->type}}</td>
      				<td>{{$pp->c1}}</td>
      				<td>{{$pp->c2}}</td>
      				<td>{{$pp->c3}}</td>
      				<td>{{$pp->avg}}</td>
      			
      			</tr>
      				 @endforeach
      			</tbody>

      		</table>



	    

     @endforeach

    
      		
@break




      </div>
  


    
    </div>
  </div>
</div>

			

			@endforeach


     
	</td>
				

	


		</tr>
		@endforeach
	</tbody>

</table>



</div>

<script>

  $(document).on("click", ".update" , function() {
  var record_id = $(this).closest('td').attr('id');
  console.log(record_id);

  //var response = window.confirm("Are you sure sure you want to verify this check?");
   var response = prompt("Are you sure you want to verify this check?"," ")
   if (response) {

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
   
        $.ajax({
           type:'POST',
           url:'/ajax_verify',
           data:{status: "1", id: record_id, comments: response},
           success:function(data){

           if(data == "0")
           {
           	 location.reload();
           }
           if(data == "1")
           {
           	alert("You cannot verify your own record(s)");
           }
            
           }
        });


   }
   else{

   }

});



   
</script>



@endsection