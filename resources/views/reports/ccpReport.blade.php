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





<table class="table table-bordered table-hover" >

	<thead class="thead-light">
		<tr >
			<th>Created At</th>
			<th>SKU</th>
			<th>Done By</th>
			<th>Status</th>
            <th></th>
		</tr>
	</thead>

	<tbody >
		@foreach($results as $result)

		<tr>
			<td>{{$result->created_at}}</td>
			<td>{{$result->sku}}</td>
			<td>{{$result->created_by}}</td>

			@if($result->status)
			<td style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-success'>Verified</span></td>
			@else
			<td id="{{$result->idccpChecks}}" style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-danger update'>Verify</span></td>
			@endif
            <td style="cursor: pointer; text-align: center; vertical-align: baseline"><span style="vertical-align: middle" class='badge badge-primary' data-toggle='modal' data-target='#a{{$result->idccpChecks}}'>Details</span> </td>
				@endforeach
                 
		</tr>
	</tbody>

</table>


<!--MODAL-->
@foreach($results as $result)
<div class="modal fade" id="a{{$result->idccpChecks}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <table class="table table-bordered table-hover" >

        <thead class="thead-light">
            <tr >
                <th>Test Piece</th>
                <th>Result</th>
                <th>Comments</th>
                <th></th>
            </tr>
        </thead>

        <tbody >
    @foreach ($result->ccpChecks_line as $line)

            <tr>
                <td>{{$line->test_piece}}</td>
                <td>{{$line->result}}</td>
                <td>{{$line->comments}}</td>
                    
            </tr>
    @endforeach
        </tbody>

        </table>




      </div>
    </div>
  </div>
 </div>   
@endforeach
<!--END MODAL-->



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