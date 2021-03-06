@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5">Edit Oven Check</div>

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

                	<form method="POST" action="/oven/{{$ovens->id}}"><!--start form-->
                		 @method('PATCH')
                		{{csrf_field()}}


                	<div class="form-row">

                	<!-- 	 <div class="form-group col-md-8 center-block text-center">
						    	<div class='input-group center-block ' id='datetimepicker1'>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
	                			</div>
						    </div> -->

						      <div class="form-group col-md-4">

						     		<div class="form-group">
								    	<label for="">Product</label>
								      <select class="form-control form-control-lg" name="oven_product" select="{{ $ovens->oven_product}}">
								      	if({{ $ovens->oven_product }}){
								      	<option>{{ $ovens->oven_product }}</option>
								      }
								      else{
								      @foreach ($allSkus as $sku)
								      	<option>{{$sku->Code}}</option>
								      	@endforeach

								  };
								      	
								      </select>
									</div>

							   <!--   	<div class="form-group">
							     	 <label for="">Date & Time</label>
							    	<input class="form-control form-control-lg" type="text" id="result1" name="oven_datetime" data-date-format="Y-MM-DD HH:mm:s"  value="{{ $ovens->datetime}}">
							    	
									</div> -->

								
						   
						     </div>

					</div>

					  		<hr />

<input style="display:none;" name="TNUM" type="text" id="TNUM" value="{{ $ovens->trolley_number }}">
<input style="display:none ;" name="COLOUR" type="text" id="COLOUR" value="{{ $ovens->colour }}">
<input style="display:none ;" name="SPREAD" type="text" id="SPREAD" value="{{ $ovens->spread }}">
<input style="display:none ;" name="CHECKCOMP" type="text" id="CHECKCOMP" value="{{ $ovens->checklist_completed }}">
<input style="display:none ;" name="CTIME" type="text" id="CTIME" value="{{ $ovens->correct_time }}">
<input style="display:none ;" name="CTEMP" type="text" id="CTEMP" value="{{ $ovens->correct_temp }}">


					    <div class="form-row">
					    <div class="form-group col-lg-2">
					      <label for="inputEmail4">Trolley Number</label><br/>
					      <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select1">
  <label id ="tn1" class="btn btn-secondary  btn-lg">
    <input type="radio" name="CI_yes" id="option1" autocomplete="off" value="Yes" > Yes
  </label>
  <label id="tn2" class="btn btn-secondary btn-lg">
    <input type="radio" name="CI_no" id="option1" autocomplete="off" value="No" > No
  </label>


</div>
					    </div>
					    <div class="form-group col-lg-3">
					      <label for="inputPassword4">Colour</label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select2">
  <label  id ="c1"class="btn btn-secondary  btn-lg">
    <input type="radio" name="" id="option2" autocomplete="off" value="Good"> Good
  </label>
  <label  id ="c2"class="btn btn-secondary btn-lg">
    <input type="radio" name="" id="option2" autocomplete="off" value="Dark"> Dark
  </label>
  <label  id ="c3"class="btn btn-secondary btn-lg">
    <input type="radio" name="" id="option2" autocomplete="off" value="Light"> Light
  </label>

</div>
					    </div>
					     <div class="form-group col-lg-3">
					      <label for="inputPassword4">Spread</label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select3">
  <label id ="s1" class="btn btn-secondary  btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Good"> Good
  </label>
  <label id ="s2" class="btn btn-secondary btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Underspread"> Underspread
  </label>
  <label id ="s3" class="btn btn-secondary btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Overspread"> Overspread
  </label>

</div>
					    </div>
					
					  </div>
<hr />
					   <div class="form-row">

					   	     <div class="form-group col-lg-2">
					      <label for="inputPassword4">Checksheet Completed</label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select4">
  <label id ="cc1" class="btn btn-secondary  btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off" value="Yes" > Yes
  </label>
  <label id ="cc2"class="btn btn-secondary btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off"  value="No"> No
  </label>

</div>
					    </div>

					      <div class="form-group col-lg-2">
					      <label for="inputPassword4">Correct Temp</label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select5">
  <label id ="ct1" class="btn btn-secondary  btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off" value="Yes" > Yes
  </label>
  <label id ="ct2"class="btn btn-secondary btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off"  value="No"> No
  </label>

</div>
					    </div>

					          <div class="form-group col-lg-2">
					      <label for="inputPassword4">Correct Time</label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select6">
  <label id ="ctm1" class="btn btn-secondary  btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off" value="Yes" > Yes
  </label>
  <label id ="ctm2"class="btn btn-secondary btn-lg">
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
  <textarea class="form-control" aria-label="With textarea" name="oven_comments">{{$ovens->comments}}</textarea>
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

    $("#TNUM").val(optionValue);
});

$("#select2 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#COLOUR").val(optionValue);
});

$("#select3 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#SPREAD").val(optionValue);
});

$("#select4 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CHECKCOMP").val(optionValue);
});

$("#select5 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CTIME").val(optionValue);
});

$("#select6 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CTEMP").val(optionValue);
});


   // END toggle dem buttons

var x = $("#TNUM").val();
if(x == "Yes"){	
	$("#tn1").toggleClass( "active", true );
}
if(x == "No"){
	$("#tn2").toggleClass( "active", true );
}


var y = $("#COLOUR").val();
if(y == "Good"){	
	$("#c1").toggleClass( "active", true );
}
if(y == "Dark"){
	$("#c2").toggleClass( "active", true );
}
if(y == "Light"){
	$("#c3").toggleClass( "active", true );
}


var z = $("#SPREAD").val();
if(z == "Good"){	
	$("#s1").toggleClass( "active", true );
}
if(z == "Underspread"){
	$("#s2").toggleClass( "active", true );
}
if(z == "Overspread"){
	$("#s3").toggleClass( "active", true );
}


var w = $("#CHECKCOMP").val();
if(w == "Yes"){	
	$("#cc1").toggleClass( "active", true );
}
if(w == "No"){
	$("#cc2").toggleClass( "active", true );
}

var b = $("#CTIME").val();
if(b == "Yes"){	
	$("#ctm1").toggleClass( "active", true );
}
if(b == "No"){
	$("#ctm2").toggleClass( "active", true );
}

var n = $("#CTEMP").val();
if(n == "Yes"){	
	$("#ct1").toggleClass( "active", true );
}
if(n == "No"){
	$("#ct2").toggleClass( "active", true );
}



   
});

    </script>
@endsection