
<!-- {{$checks->id}} -->
<!-- {{ $checks->check_product }} -->

<head>

</head>
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header h5">Edit Deposit Weight Check</div>

                <div class="card-body">
                	    @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

                	<form method="POST" action="/checkPage/{{$checks->id}} ">


                		 @method('PATCH')<!--start form-->
                		{{csrf_field()}}


                	<div class="form-row">

						   <!--   <div class="form-group col-md-8 center-block text-center">
						    	<div class='input-group center-block ' id='datetimepicker1'>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
	                			</div>
						    </div> -->

						     <div class="form-group col-md-4">

						     		<div class="form-group">
								    	<label for="">Product</label>
								      <select disabled id="product_selector" class="form-control form-control-lg" name="newcheck_product_name" select="{{ $checks->check_product }}">
								      	if($checks->check_product){
								      	echo <option>{{ $checks->check_product }}</option>

								      }
								      else{
								      	@foreach ($allSkus as $sku)
								      	<option>{{$sku->Code}}</option>
								      	@endforeach
								      };




								      	

								      </select>
									</div>

							     <!-- 	<div class="form-group">
							     	 <label for="">Date & Time</label>
							    	<input disabled class="form-control form-control-lg" type="text" id="result1" name="newcheck_datetime" data-date-format="Y-MM-DD HH:mm:s"  value="{{ $checks->check_datetime}}">

									</div> -->

								
						   
						     </div>
					</div>

					<hr />




            	<!-- 	  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="newcheck_date">Date</label>
					      <input id ="datetimepicker1" type="text" class="form-control datetimepicker-input" name="newcheck_date" >
					    </div>
					    <div class="form-group col-md-6">
					      <label for="newcheck_time">Time</label>
					      <input type="text" class="form-control" name="newcheck_time" >
					    </div>
					  </div> -->

					  <!-- <div class="form-row">
					  	 <div class="form-group col-md-12">
					      <label for="newcheck_product_name">Product</label>
					      <input type="text" class="form-control" name="newcheck_product_name" >
					    </div>
					  </div> -->

					<!--   <div class="form-row">
					  	 <div class="form-group col-md-12">
					      <label for="newcheck_product_name">Product</label>
					     
					      <select class="form-control form-control-lg" name="newcheck_product_name">
					      	@foreach ($allSkus as $sku)
					      	<option>{{$sku->Code}}</option>

					      	@endforeach
					      </select>
					    </div>
					  </div> -->


					     	 <div class="form-row "><!--column 1-->
							    <div class="form-group col-md-10">
							    	 <small class="form-text text-muted">Sample Weight (Grams)</small>
							      <label for="inputEmail4">Individual</label>

							        <div class="form-row text-center">
					    <div class="form-group col-md-2 ">
					      <label for="individual_1">1</label>
					      <input type="number" pattern="[0-9]*" class="form-control kd2" name="individual_1" value="{{ $checks->check_inv_1}}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="individual_2">2</label>
					      <input type="number" pattern="[0-9]*" class="form-control kd2" name="individual_2" value="{{ $checks->check_inv_2}}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="individual_3">3</label>
					      <input type="number" pattern="[0-9]*" class="form-control kd2" name="individual_3" value="{{ $checks->check_inv_3}}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="individual_4">4</label>
					      <input type="number" pattern="[0-9]*" class="form-control kd2" name="individual_4" value="{{ $checks->check_inv_4}}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="individual_5">5</label>
					      <input type="number" pattern="[0-9]*" class="form-control kd2" name="individual_5" value="{{ $checks->check_inv_5}}">
					    </div>

					  </div>

					   <div class="form-row">
					   	 <div class="form-group col-md-3 ">
					      <label for="">Target Min</label>
					      <input readonly id="i_min" type="number" pattern="[0-9]*" class="form-control" name="newcheck_individual_target_range" value="{{ $checks->check_inv_target_range}}">
					    </div>
					     <div class="form-group col-md-3 ">
					      <label for="">Target Max</label>
					      <input readonly id="i_max" type="number" pattern="[0-9]*" class="form-control" name="newcheck_individual_target_range" value="{{ $checks->check_inv_target_range}}">
					    </div>
					     <div class="form-group col-md-2">
					      <label for="">Average</label>
					      <input readonly id="individual_avg_input" type="text" class="form-control" name="newcheck_individual_average" value="{{ $checks->check_inv_average}}">
					    </div>

					    <div class="form-group col-md-4">
					     	 <label for="inputEmail4" class="invisible">--</label> <br/>
					      <button type="button" onclick="getAvg('inv');" class="btn btn-primary btn">Get Avg</button>
					    </div>

					   </div>

							  </div>




					  		  <div class="form-group col-md-10 "><hr />
							    	 <small id="" class="form-text text-muted">Sample Weight (Grams)</small>
							      <label for="">Row</label>

							           <div class="form-row text-center">
					    <div class="form-group col-md-2">
					      <label for="">1</label>
					      <input type="number" pattern="[0-9]*" class="form-control kd1" name="sample_1" value="{{ $checks->check_row_1}}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="">2</label>
					      <input type="number" pattern="[0-9]*" class="form-control kd1" name="sample_2" value="{{ $checks->check_row_2}}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="">3</label>
					      <input type="number" pattern="[0-9]*" class="form-control kd1" name="sample_3" value="{{ $checks->check_row_3}}">
					    </div>

					  </div>


					    <div class="form-row">
					   	 <div class="form-group col-md-3">
					      <label for="inputEmail4">Target Min</label>
					      <input readonly id="r_min" type="number" pattern="[0-9]*" class="form-control" name="newcheck_sample_target_range" value="{{$checks->check_row_target_range}}">
					    </div>
					    	 <div class="form-group col-md-3">
					      <label for="inputEmail4">Target Max</label>
					      <input readonly id="r_max" type="number" pattern="[0-9]*" class="form-control" name="newcheck_sample_target_range" value="{{$checks->check_row_target_range}}">
					    </div>
					     <div class="form-group col-md-2">
					      <label for="inputEmail4">Average</label>
					      <input readonly id="row_avg_input" type="text" class="form-control" name="newcheck_sample_average" value="{{$checks->check_row_average}}">
					    </div>
					     <div class="form-group col-md-4">
					     	 <label for="inputEmail4" class="invisible">--</label> <br/>
					      <button type="button" onclick="getAvg('row');" class="btn btn-primary btn">Get Avg</button>
					    </div>

					   </div>
							    </div>
							</div>



					  		<hr />




					    <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="inputEmail4">Dough Temp</label>
					      <input type="number" pattern="[0-9]*" class="form-control" name="newcheck_dough_temp" value="{{$checks->check_dough_temp}}">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputPassword4">Flour Temp</label>
					      <input type="number" pattern="[0-9]*" class="form-control" name="newcheck_flour_temp" value="{{$checks->check_flour_temp}}">
					    </div>
					     <div class="form-group col-md-4">
					      <label for="inputPassword4">Butter Temp</label>
					      <input type="number" pattern="[0-9]*" class="form-control" name="newcheck_butter_temp" value="{{$checks->check_butter_temp}}">
					    </div>
					  </div>

					  <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Comments</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" name="newcheck_comments" value="{{$checks->check_comments}}">{{$checks->check_comments}}</textarea>
</div>

<hr />




					

						
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form><!--end form-->
                    
                </div>
               
            </div>
        </div>
    </div>
</div>

  <script type="text/javascript" defer>
  $(document).ready( function() {

  // DateTime Picker
  $(function () {
    $('#datetimepicker1').datetimepicker({
      inline: true,
      sideBySide: true,
      useCurrent: false

    });

  });

  $("#datetimepicker1").on("change.datetimepicker", function (e) {
   $('#datetimepicker2').datetimepicker('minDate', e.date);
   $('#result1').datetimepicker('date', e.date);
  });

  
   // END DateTime Picker
   
});


 function getAvg(type){

  	if(type == "inv"){

  		var imin = $("#i_min").val();
  		var imax = $("#i_max").val();
  		console.log(imin);
  		console.log(imax);


  		var arr = document.getElementsByClassName("kd2");
var tot = 0;
var av = 0;

for(var i = 0; i < arr.length; i++) {
    if(parseInt(arr[i].value)){
            tot += parseInt(arr[i].value);
    }
}

av = tot/arr.length;
final_av = Math.round(av * 100) / 100


if(final_av < imin || final_av > imax){
	console.log("out of range");
	$("#individual_avg_input").addClass("bg-danger text-white");
}
else{

	$("#individual_avg_input").removeClass("bg-danger text-white");
}

console.log(av);

$("#individual_avg_input").val(final_av);

  	}

  	if(type == "row"){

  		var rmin = $("#r_min").val();
  		var rmax = $("#r_max").val();

  		var arr = document.getElementsByClassName("kd1");
var tot = 0;
var av = 0;

for(var i = 0; i < arr.length; i++) {
    if(parseInt(arr[i].value)){
            tot += parseInt(arr[i].value);
    }
}

av = tot/arr.length;
final_av = Math.round(av * 100) / 100

if(final_av < rmin || final_av > rmax){
	console.log("out of range");
	$("#row_avg_input").addClass("bg-danger text-white");
}
else{

	$("#row_avg_input").removeClass("bg-danger text-white");
}


console.log(av);

$("#row_avg_input").val(final_av);



  	}



}


    </script>


 <!--AJAX-->

 <script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready( function() {
  
        //e.preventDefault();
   
        var product_selected = $("#product_selector").val();
        console.log(product_selected);

   
        $.ajax({
           type:'GET',
           url:'/ajaxRequest',
           data:{prod:product_selected},
           success:function(data){
            // console.log(data.Description);
            var inv_min = data.target_range_ind_min + " - " + data.target_range_ind_max;
            var inv_max = data.target_range_ind_max;
            var row_min = data.target_range_row_min;
            var row_max = data.target_range_row_max;

             $('#i_min').val(data.target_range_ind_min);
             $('#i_max').val(data.target_range_ind_max);

             $('#r_min').val(data.target_range_row_min);
             $('#r_max').val(data.target_range_row_max);
           }
        });
  
	});
</script>

<!--END AJAX-->



@endsection



 