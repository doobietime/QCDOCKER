@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card ">

                <div class="card-header">Inwards Goods Inspection (To be completed by Store Person)  <div class="float-right">Document Version - {{$getVersion}}</div></div>
        

 <!--              @if(!$param_lines->count())
              null
             @else
                           <table class="table">
              	<thead>
              		<tr>
              				<th>Parameters</th>
               					<th>Specification</th>
               					<th>Results in Spec</th>
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

              @endif -->
         

                <div class="card-body shadow-sm">
<div class="">
                	<h3>Item Code: {{$igcheck->item_code}}</h3>
                	<h5>Item Name: {{$igcheck->item_name}}</h5>
                	<h5>Supplier: {{$igcheck->igcheck_supplier}}</h5>
                	<h5>PO Number: {{$igcheck->PO_number}}</h5>
                	<h5>Created At: {{$igcheck->created_at}}</h5>
</div>

          <hr />
               <form id="igsform" method="POST"  enctype="multipart/form-data" action="{!! route('igcheck_igs.update',$igcheck->id)!!}">	{{csrf_field()}}

               	<div class="form-row">
               		<!-- <div class="form-group col-md-2">
	               		<label for="dr">Date Received</label>
	               		<input type="text" class="form-control">
               		</div> -->
               		<div class="form-group col-md-5" >
               				  <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><strong>PO Number</strong></span>
  </div>
  <input required name="ponumber" type="text" class="form-control">
</div><br />
<label>Location:</label>
 <select name="location" class="form-control">
 	
 	<option value="Chiller">Chiller</option>
 	<option value="Rear Store">Rear Store</option>
 	<option value="Front Store">Front Store</option>
 	<option value="Nut House">Nut House</option>
 </select>
	               	<!-- 	<label for="po" >PO Number</label>
	               		<input required name="ponumber" type="text" class="form-control"> -->
               		</div>
               	
               	</div>
<hr />
               	 <input name="forkey" value="{{$igcheck->id}}" style="display:none ;"></input>
               	<div class="form-row batchArea">
               		<div class="form-group col-md-12">

               		<table class="table table-bordered table-sm batchTable">

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
               					<td>{{$GB->quantity}}</td>
               					<td>{{$GB->temperature}}</td>
               				</tr>
               				@endforeach


               			</tbody>
               		</table>
               		    <button type="button" class="btn btn-outline-secondary btn-sm float-right" id="addBatch">Add Line</button>    	
               	</div>
               </div>
               <hr />

               	<div class="form-row parameterArea">
               		<div class="form-group col-md-12">
               		<table class="table table-sm table-bordered">
               			<!-- <button type="button" class="btn btn-outline-secondary btn-sm float-right" id="addParameter">Add Line</button> -->
               			<thead class="thead-light">
               				<tr>
               					<th>Parameters</th>
               					<th>Specification</th>
               					<th >Result in Spec</th>
               					<th>Comments</th>
               				</tr>
               			</thead>
               			<tbody>


  @if(!$param_lines->count())

               				@foreach ($global_params as $global_param)
               				<tr>
               					<td  >{{$global_param->parameter_name}}<input name="p1[]" type="hidden" class="form-control" value="{{$global_param->parameter_name}}"></td>
               					<td  >{{$global_param->specification}}<input name="p2[]" type="hidden" class="form-control" value="{{$global_param->specification}}"></td>
               					
               					<td style="max-width:100px;">
               						<input readonly name="ris[]" class="asdf btn btn-primary form-control"  aria-pressed="false" autocopmlete="off" value="No"></input>



               					</td>
   


               				<!-- 	<td><input name="ris[]" type="text" class="form-control"></td> -->
               					<td><input name="coms[]" type="text" class="form-control"></td>
               					
               				</tr>
               				@endforeach
@else

  @foreach($param_lines as $param_line)
              <tr>
              <td>{{$param_line->parameter_name}}</td>
              <td>{{$param_line->specification}}</td>
              <td>{{$param_line->results_in_spec}}</td>
              <td>{{$param_line->comments}}</td>
              </tr>
              @endforeach
@endif
               			</tbody>
               		</table>
               		        	
               	</div>
               		         	
               	</div>

<!-- <button class="btn btn-outline-danger float-left" ><a style="color:inherit; text-decoration:none;" href="{{URL::previous()}}">Back</a></button> -->


<input id="dmgPhotoArea" type="file" class="float-left" name="dmgPhotos[]" multiple>
<button type="submit" class="btn btn-primary float-right">Submit</button>
               </form>

                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>

	$("#igsform").submit(function(e) {
     e.preventDefault();
 	 var x = $(".doobie");
 	 console.log(x.length);
 	 if(x.length > 0)
 	 {
 	 	this.submit();
 	 }
 	 else
 	 {
 	 	alert("Please add a batch");
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

	var num = 0;
	$("#addBatch").on('click', function() {
	
		num++;

		console.log("createBatchPressed");

		$checkID = $("#checkid").text();
		console.log($checkID);

			$(".batchTable > tbody:last-child").append('<tr class="doobie"><td><input required name="bcode[]" type="text" class="form-control"></td><td><input required name="bbd[]" type="text" class="form-control dtp" data-provide="datepicker"  data-date-autoclose="true"></td><td><input placeholder="required" required name="pqty[]" type="number" class="form-control"></td><td><input placeholder="required" required name="qty[]" type="number" class="form-control"></td><td><input required name="temp[]" type="text" class="form-control"></td></tr>');
	
			$(document).on("focus", ".dtp", function(){
        	$(this).datepicker({ dateFormat: 'yyyy-mm-dd' });
    });

});





</script>


@endsection