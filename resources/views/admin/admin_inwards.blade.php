@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Inwards Goods Main Document Version</div>

                <div class="card-body shadow-sm">

                	<div class="">
         <!--    <form  id="" method="GET" action="{{ url('/') }}/getSkuFromAX">{{csrf_field()}}
				<button type="submit" class="btn btn-primary mb-2">Get SKUs</button>
			</form> -->

<form class="form-inline" method="POST" action="{{ url('/') }}/setGlobalParam">{{csrf_field()}}
  <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Current Version :">
  </div>
  <div class="form-group mx-sm-1 mb-2">
    <input type="text" class="form-control" name="globalparam" placeholder="{{$documentVersion}}">
  </div>


  <button type="submit" class="btn btn-outline-success mb-2">Save</button>
</form>
  									@if(session()->has('message'))
										<div class="alert alert-success" role="alert">{{session()->get('message')}}
										</div>
									@endif

										@if(session()->has('error'))
										<div class="alert alert-danger" role="alert">{{session()->get('error')}}
										</div>
									@endif	
</div>



</form>
                </div>
 				
 			
 		
 					</form>

                   
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Modfy Specification & Version</div>

                <div class="card-body shadow-sm">

                	<div class="">

<h6>Select SKU:</h6>
<select class="form-control form-control-lg" id="input1" name="selected_product">
 						@foreach ($rms as $rm)
 						<option value="{{$rm->id}}">{{$rm->Code}}  -  {{$rm->Description}} - Supplier : {{$rm->supplier}}</option>
 						@endforeach

 					</select>


 					<hr />
<!-- <hr />
<div class="form-inline">
  <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="" value="SKU Code :">
  </div>
  <div class="form-group mx-sm-1 mb-2">
    <input type="text" class="form-control" id="skucodehere" placeholder="">
  </div>
</div>
<div class="form-inline">
  <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="" value="SKU Description :">
  </div>
  <div class="form-group mx-sm-1 mb-2">
    <input type="text" class="form-control" id="skudeschere" placeholder="">
  </div>
</div> -->


 		<div id="specArea">
 			<form method="POST" action="{{ url('/') }}/admin_inwards_save/{id}">{{csrf_field()}}
 			<br />
 			<button type="button" class="btn btn-outline-secondary btn-sm float-left" id="addLine">Add Line</button>   
 			<input type="hidden" id="rmcodebox" name="rmcodeselected"/> 	
 			<br /><br />
 			<table id="paramtable" class="table table-sm table-bordered">
 				<thead>
 					<th>Description</th>
 					<th>Specification</th>
 				</thead>
 				<tbody>
 				</tbody>

 			</table>
 		</div>
 	

  <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Current Version :">
  </div>
  <div class="form-group mx-sm-1 mb-2">
    <input type="text" class="form-control" id="specVBox" name="specVersionBox" placeholder="">
  </div>
<br />
	<button type="submit" class="btn btn-outline-success float-right" id="saveChanges">Save Changes</button><p class="media-body pb-3 mb-0 small ">*Make sure to save changes if you've added new lines</p>

</div>


                	</div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {


//select2 for SKU selection
    $('#input1').select2();
});

//AJAX for displaying SKU details
$('#input1').on('change', function (e){
  		var x = $('option:selected',this).val();

  		$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
        $.ajax({
           type:'GET',
           url:'/ajaxRequest_getParameters',
           data:{
           p_selected: x
           },
           success:function(data){
            console.log(data);

            $("#paramtable tbody").empty();
            $("#specVBox").empty();
            $("#rmcodebox").val(x);

            if( data.version){
            	var v = data.version.version;
            	$("#specVBox").val(v);
            }
            else{
            	var v = "Version Not Set";
            	$("#specVBox").val(v);
            }

       

            
             data.params.forEach(function (line) {
		    $("#paramtable tbody").append(
		        "<tr id='"+line.id+"'>"
		            
		             +"<td><input disabled class='form-control' type='text' value='"+line.parameter_name+"'></td>"
		             +"<td><input disabled class='form-control' type='text' value='"+line.specification+"'></td>"
		             +"<td style='border:none;'><button id='removeBtn' style='margin-top:3px;' type='button' class='btn btn-outline-danger btn-sm float-left' >X</button>    </td>"
		           
		        +"</tr>" )
		});

           
         }
        });

  	});

//addline
	$("#addLine").on('click', function() {
	

			$("#paramtable > tbody:last-child").append('<tr class="doobie"><td><input required name="description[]" type="text" class="form-control"></td><td><input required name="spec[]" type="text" class="form-control dtp" ></td></tr>');
	
});

//removeline

$(document).on('click', "#removeBtn", function() {
	var lineID = $(this).closest('tr').attr('id');
	var lineTR =  $(this).closest('tr');
	var confirmation = confirm("Are you sure?");
	if (confirmation == true){
		console.log("deleted");

				$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });

		   $.ajax({
           type:'POST',
           url:'/ajaxRequest_removeParamLine',
           data:{
           	line_selected: lineID
           },
           success:function(data){
            console.log("Line Removed");
            lineTR.remove();
  
         }
        });

	}
	
	});

//save global param ajax



</script>


@endsection