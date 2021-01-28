@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5">Edit Mixing Check</div>

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

                	<form method="POST" action="/mixing/{{$mixings->id}}"><!--start form-->
                		 @method('PATCH')
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

						     	<div class=" form-row form-group">

						     		<div class="col-md-6">
						     			<label for="">Product Type</label>
						     			<select class="form-control form-control-lg" name="mixing_type_1" select="{{ $mixings->mixing_type }}">
						     				
						     		   	if($mixings->mixing_type){
								      	echo <option>{{ $mixings->mixing_type }}</option>

								      }
								      else{
								      <option>Bars</option>
								      	<option>Cookies</option>
								      	
								      };

						     		

						     			</select>
						     			

						     		</div>
						     			<div class="col-md-6">

								    	<label for="">Product</label>
								      <select class="form-control form-control-lg" name="mixing_product_name" select="{{ $mixings->mixing_product}}">
								         	if($mixings->mixing_product){
								      	echo <option>{{ $mixings->mixing_product }}</option>

								      }
								      else{
								      	@foreach ($allSkus as $sku)
								      	<option>{{$sku->Code}}</option>
								      	@endforeach
								      };
								      	
								      </select>
									</div>



						     	</div>




						     	

							     <!-- 	<div class=" form-group form-row">
							     	 <label for="">Date & Time</label>
							   <input class="form-control form-control-lg" type="text" id="result1" name="mixing_datetime_1" data-date-format="Y-MM-DD HH:mm:s"  value="{{ $mixings->mixing_datetime }}">
									</div> -->

									<div class="form-group form-row">
										<div class="col-md-6">
							     	 <label for="">Number of Mixes</label>
							    	<input class="form-control form-control-lg" type="number" pattern="[0-9]*" id="" name="mixing_number_of_mixes"  value="{{ $mixings->mixing_no_of_mixes }}">
							    </div>
									</div>



								
						   
						     </div>
					</div>

					  		<hr />

<input style="display:none;" name="CI" type="text" id="CI" value="{{ $mixings->correct_ingredients }}">
<input style="display: none;" name="CW" type="text" id="CW" value="{{ $mixings->correct_weights  }}">
<input style="display: none;" name="MSF" type="text" id="MSF" value="{{ $mixings->mixing_sop_followed  }}">
<input style="display: none;" name="CC" type="text" id="CC" value="{{ $mixings->checksheets_completed  }}">


					    <div class="form-row">
					    <div class="form-group col-md-3">
					      <label for="inputEmail4">Correct Ingredients</label><br/>
					      <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select1">
  <label id ="cilb1" class="btn btn-secondary  btn-lg">
    <input type="radio" name="CI_yes" id="option1" autocomplete="off" value="Yes" > Yes
  </label>
  <label id="cilb2" class="btn btn-secondary btn-lg">
    <input type="radio" name="CI_no" id="option1" autocomplete="off" value="No" > No
  </label>


</div>
					    </div>
					    <div class="form-group col-md-3">
					      <label for="inputPassword4">Correct Weight</label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select2">
  <label  id ="cwlb1"class="btn btn-secondary  btn-lg">
    <input type="radio" name="" id="option2" autocomplete="off" value="Yes"> Yes
  </label>
  <label  id ="cwlb2"class="btn btn-secondary btn-lg">
    <input type="radio" name="" id="option2" autocomplete="off" value="No"> No
  </label>

</div>
					    </div>
					     <div class="form-group col-md-3">
					      <label for="inputPassword4">Mixing SOP Followed</label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select3">
  <label id ="msflb1" class="btn btn-secondary  btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Yes"> Yes
  </label>
  <label id ="msflb2" class="btn btn-secondary btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="No"> No
  </label>

</div>
					    </div>
					     <div class="form-group col-md-3">
					      <label for="inputPassword4">Checksheet Completed</label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select4">
  <label id ="cclb1" class="btn btn-secondary  btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off" value="Yes" > Yes
  </label>
  <label id ="cclb2"class="btn btn-secondary btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off"  value="No"> No
  </label>

</div>
					    </div>
					  </div>
<hr />
					  <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Comments</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" name="mixing_comments">{{$mixings->comments_observation }}</textarea>
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

   //toggle dem buttons




$("#select1 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CI").val(optionValue);
});

$("#select2 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CW").val(optionValue);
});

$("#select3 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#MSF").val(optionValue);
});

$("#select4 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CC").val(optionValue);
});


   // END toggle dem buttons

var x = $("#CI").val();
if(x == "Yes"){	
	$("#cilb1").toggleClass( "active", true );
}
if(x == "No"){
	$("#cilb2").toggleClass( "active", true );
}


var y = $("#CW").val();
if(y == "Yes"){	
	$("#cwlb1").toggleClass( "active", true );
}
if(y == "No"){
	$("#cwlb2").toggleClass( "active", true );
}


var z = $("#MSF").val();
if(z == "Yes"){	
	$("#msflb1").toggleClass( "active", true );
}
if(z == "No"){
	$("#msflb2").toggleClass( "active", true );
}


var w = $("#CC").val();
if(w == "Yes"){	
	$("#cclb1").toggleClass( "active", true );
}
if(w == "No"){
	$("#cclb2").toggleClass( "active", true );
}



   
});

    </script>
@endsection