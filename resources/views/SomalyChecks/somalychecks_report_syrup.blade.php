@extends('layouts.app')

@section('content')

<div class="container-fluid">


	
<div class="row pb-0">
	<div class="col-6 pb-0">
			<h4><span id="type">{{$contentType}}</span> History </h4>
	</div>
	<div class="col-6 pb-0">
		<div class="float-right mb-6">{{ $results->links() }}</div>
	</div>
</div>





<table class="table table-bordered table-hover " >

	<thead class="thead-light">
		<tr >
			<th>Syrup</th>
			<th>Created At</th>
			<th>Done By</th>
			<th>Batch</th>
			<th>Made Date</th>
			<th>Type</th>
			<th>1</th>
			<th>2</th>
			<th>3</th>
			<th>Avg</th>
			
			<th>Comments</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody >
		@foreach($results as $result)

		<tr>
			<td>{{$result->syrup_name}}</td>
			<td>{{$result->created_at}}</td>
			<td>{{$result->done_by}}</td>
			<td>{{$result->batch_number}}</td>
			<td>{{$result->made_date}}</td>
			<td>{{$result->type}}</td>
			<td>{{$result->c1}}</td>
			<td>{{$result->c2}}</td>
			<td>{{$result->c3}}</td>
			<td>{{$result->avg}}</td>
			<td>{{$result->comments}}</td>
			

			
			

			@if($result->verified_status)
			<td style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-success'>Verified</span></td>
			@else
			<td id="{{$result->id}}" style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-danger update'>Verify</span></td>
			@endif

				@endforeach
		
	</tbody>

</table>



</div>

<script>

var checktype = $("#type").text();

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
           data:{status: "1", id: record_id, comments: response, checktype:checktype},
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