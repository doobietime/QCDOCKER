@extends('layouts.app')
@section('content')

<div class="container">



	




	<div class="row">

     <main role="main" class="col-md-12 col-lg-12 px-md-4">
   <!--    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div> -->

  									@if(session()->has('message'))
										<div class="alert alert-success" role="alert">{{session()->get('message')}}
										</div>
									@endif

										@if(session()->has('error'))
										<div class="alert alert-danger" role="alert">{{session()->get('error')}}
										</div>
									@endif	


      <h2>QC Checks SKUs</h2>
	  <hr />
      <div>


      	<h6>Select SKU:</h6>
<select class="form-control form-control-lg" id="input1" name="selected_product">
 						@foreach ($skus as $sku)
 						<option value="{{$sku->id}}">{{$sku->Code}}  -  {{$sku->Description}} - Supplier : {{$sku->supplier}}</option>
 						@endforeach

 					</select>
 					<hr />

	<form method="POST" enctype="multipart/form-data" action="{!! route('somalysku.store')!!}">	{{csrf_field()}}
	@method('PATCH')
<input style="display:none;"id="idbox" type="text" name="skuid">
<div class="row ">
	<div class="col-md-4">
 		Code<input id="code" class="form-control" type="text" name="code">
 	</div>
 	<div class="col-md-4">
 		Description<input id="desc" class="form-control" type="text" name="desc">
 	</div>
 	<div class="col-md-4">
 		Machine<input  id="machine" class="form-control" type="text" name="machine">
 	</div>
 	</div>
<br/>
 	<div class="row ">
 			<div class="col-md-4">
 		Min <input id="min" class="form-control" type="text" name="min">
 	</div>
 	<div class="col-md-4">
 		Max <input id="max" class="form-control" type="text" name="max">
 	</div>
 	<div class="col-md-4">
 	Target <input id="target" class="form-control" type="text" name="target">
 	</div>

 	</div>
<br/>
 	<div class="row ">
 		<div class="col-md-4">
 		Film Part <input id="fpart" class="form-control" type="text" name="fpart">
 	</div>
 		<div class="col-md-4">
 		Film Version <input id="fversion" class="form-control" type="text" name="fversion">
 	</div>
 	</div>
<br/>
 	<div class="row ">
 		<div class="col-md-4">
 		BBD<input id="bbd" class="form-control" type="text" name="bbd">
 	</div>
 	</div>
<br/>
 	<div class="row ">
 			<div class="col-md-4">
 		Product Sub Type<input id="pstype" class="form-control" type="text" name="pstype">
 	</div>
 	</div>



      </div>

      <button type="submit" class="btn btn-primary float-right" id="saveChanges">Save Changes</button>
    </main>

	</div>
</div>
</form>
<script>

$(document).ready(function() {
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
           url:'/ajaxRequest_getSomalySkus',
           data:{
           p_selected: x
           },
           success:function(data){

            console.log(data);


           	var code = data[0].Code;
           	var desc = data[0].Description;
           	var bbd = data[0].best_before_days;
           	var fpart = data[0].film_part_no;
           	var fversion = data[0].pouch_version;
           	var machine = data[0].product_type;
           	var min = data[0].pouch_min;
           	var max =data[0].pouch_max;
           	var target = data[0].pouch_target;
           	var pstype = data[0].product_sub_type;
           	var skuid = data[0].id;
           	
           	$("#code").val(code);
           	$("#desc").val(desc);
           	$("#bbd").val(bbd);
           	$("#fpart").val(fpart);
           	$("#fversion").val(fversion);
           	$("#machine").val(machine);
           	$("#min").val(min);
           	$("#max").val(max);
           	$("#target").val(target);
           	$("#pstype").val(pstype);
           	$("#idbox").val(skuid);



                 
    

           
         }
        });

  	});


</script>

@endsection 