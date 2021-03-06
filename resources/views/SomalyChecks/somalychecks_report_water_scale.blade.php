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




@if($contentType == "WaterA")

<table class="table table-bordered table-hover ">

	<thead class="thead-light">
		<tr >
			<th>Created At</th>
			<th>Done By</th>
			<th>Calibration Set</th>
			<th>Calibration Type</th>
			<th>Test Type</th>
			<th>Is Re-Test</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody >

		@foreach($results as $result)
		<tr>
			<td>{{$result->created_at}}</td>
			<td>{{$result->created_by}}</td>
			<td>{{$result->calibration_set}}</td>
			<td>{{$result->test_type}}</td>
			<td>{{$result->calibration_type}}</td>
			<td>{{$result->retest}}</td>


			@if($result->verified_status)
			<td style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-success'>Verified</span></td>
			@else
			<td id="{{$result->id}}" style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-danger update'>Verify</span></td>
			@endif


		</tr>
		@endforeach
	</tbody>


</table>

@endif


@if($contentType == "ScaleC")

<table class="table table-bordered table-hover ">

	<thead class="thead-light">
		<tr >
			<th>Created At</th>
			<th>Done By</th>
			<th>Scale Weight</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody >

		@foreach($results as $result)
		<tr>
			<td>{{$result->created_at}}</td>
			<td>{{$result->created_by}}</td>
			<td>{{$result->scale_weight}}</td>
				@if($result->verified_status)
			<td style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-success'>Verified</span></td>
			@else
			<td id="{{$result->id}}" style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-danger update'>Verify</span></td>
			@endif
		</tr>
		@endforeach
	</tbody>


</table>


@endif

<script>

	var checktype = $("#type").text();

  $(document).on("click", ".update" , function() {
  var record_id = $(this).closest('td').attr('id');
  console.log(record_id);

  var response = window.confirm("Are you sure sure you want to verify this check?");
   if (response) {

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
   
        $.ajax({
           type:'POST',
           url:'/ajax_verify',
           data:{status: "1", id: record_id, checktype : checktype},
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