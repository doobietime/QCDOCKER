@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5">Create New Weigh Up Check




                </div>

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

                	<form method="POST" action="{{ url('/') }}/weighup"><!--start form-->
                		{{csrf_field()}}
<div class="form-row">
	  <!--   <div class="form-group col-md-8 center-block text-center">
						    	<div class='input-group center-block ' id='datetimepicker1'>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
	                			</div>
						    </div> -->

						    <div class="form-group col-md-4 ">
<div class="form-group">
						    	<label for="">Ingredient Weighed</label>
  <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select1">
  <label id ="WT1" class="btn btn-outline-secondary  btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Small Ingredients"> Small Ingredients
  </label>
  <label id ="WT2" class="btn btn-outline-secondary btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Chocolate"> Chocolate
  </label>
  <label id ="WT3" class="btn btn-outline-secondary btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Bulk Ingredients"> Bulk Ingredients
  </label>

</div>
</div>

    <div class="form-group">


                      <label for="">SKU</label>
                      <select class="form-control form-control-lg" name="w_ingredient">
                        @foreach ($allSkus as $sku)
                        <option>{{$sku->Code}}</option>
                        @endforeach
                  
                      </select>
                  </div>


 


<!-- <div class="form-row form-group">
						    	 <label for="">Date & Time </label>
							    	<input class="form-control form-control-lg" type="text" id="result1" name="w_datetime" data-date-format="Y-MM-DD HH:mm:s"  value="{{ old('newcheck_datetime') }}">


  </div> -->

    <div class=" form-group">


                     <label for="">Weigh Up Number</label>
                    <input class="form-control form-control-lg" type="number" pattern="[0-9]*" id="" name="NWEIGH"  value="{{ old('NWEIGH') }}">
                  </div>



						    </div>



</div>
<!-- <hr /> -->
<!--                 		  <div class="form-row">
    <div class="col-lg-6">
    	 <label for="">Weigh up Type </label>
       <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select1">
  <label id ="WT1" class="btn btn-outline-secondary  btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Small Ingredients"> Small Ingredients
  </label>
  <label id ="WT2" class="btn btn-outline-secondary btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Chocolate"> Chocolate
  </label>
  <label id ="WT3" class="btn btn-outline-secondary btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Bulk Ingredients"> Bulk Ingredients
  </label>

</div>
    </div>
    <div class="col-lg-3">

    </div>
    <div class="col-lg-3">
     	
							    	
    </div>

  </div> -->


  

					  		<hr />
<input style="display:none;" name="WTYPE" type="text" id="WTYPE" value="{{ old('WTYPE') }}">
<!-- <input style="display:none;" name="NWEIGH" type="text" id="NWEIGH" value="{{ old('NWEIGH') }}"> -->
<input style="display:none ;" name="CWEIGHT" type="text" id="CWEIGHT" value="{{ old('CWEIGHT') }}">
<input style="display:none ;" name="CORRECTI" type="text" id="CORRECTI" value="{{ old('CORRECTI') }}">
<input style="display:none ;" name="CORRECTL" type="text" id="CORRECTL" value="{{ old('CORRECTL') }}">
<input style="display: none;" name="CHECKCOMP" type="text" id="CHECKCOMP" value="{{ old('CHECKCOMP') }}">



					    <div class="form-row">
				<!-- 	    <div class="form-group col-md-2">
					      <label for="inputEmail4">No. of Weigh up </label><br/>
					      <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select2">
  <label id ="NW1" class="btn btn-outline-success  btn-lg">
    <input type="radio" name="CI_yes" id="option1" autocomplete="off" value="Yes" > Yes
  </label>
  <label id="NW2" class="btn btn-outline-danger btn-lg">
    <input type="radio" name="CI_no" id="option1" autocomplete="off" value="No" > No
  </label>


</div>
					    </div> -->
					    <div class="form-group col-lg-2">
					      <label for="inputPassword4">Correct Weight</label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select3">
  <label  id ="CW1"class="btn btn-outline-success  btn-lg">
    <input type="radio" name="" id="option2" autocomplete="off" value="Yes"> Yes
  </label>
  <label  id ="CW2"class="btn btn-outline-danger btn-lg">
    <input type="radio" name="" id="option2" autocomplete="off" value="No"> No
  </label>


</div>
					    </div>
					     <div class="form-group col-lg-2">
					      <label for="inputPassword4">Correct Ingredient </label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select4">
  <label id ="CI1" class="btn btn-outline-success  btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="Yes"> Yes
  </label>
  <label id ="CI2" class="btn btn-outline-danger btn-lg">
    <input type="radio" name="" id="option3" autocomplete="off" value="No"> No
  </label>


</div>
					    </div>
					         <div class="form-group col-lg-2">
					      <label for="inputPassword4">Correct Label </label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select5">
  <label id ="CL1" class="btn btn-outline-success  btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off" value="Yes" > Yes
  </label>
  <label id ="CL2"class="btn btn-outline-danger btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off"  value="No"> No
  </label>

</div>
					    </div>

					    <div class="form-group col-lg-3">
					      <label for="inputPassword4">Checksheet Completed </label><br/>
					          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="select6">
  <label id ="CC1" class="btn btn-outline-success  btn-lg">
    <input type="radio" name="" id="option4" autocomplete="off" value="Yes" > Yes
  </label>
  <label id ="CC2"class="btn btn-outline-danger btn-lg">
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
  <textarea class="form-control" aria-label="With textarea" name="weigh_comments">{{old('mixing_comments')}}</textarea>
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

  

    $("#datetimepicker1").on("change.datetimepicker", function (e) {
     $('#result1').datetimepicker('date', e.date);


  });
  

});
 

  
   // END DateTime Picker

   //toggle dem buttons




$("#select1 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#WTYPE").val(optionValue);
});

// $("#select2 input:radio").change(function() {
//     var optionValue = $(this).val();
//     console.log(optionValue);

//     $("#NWEIGH").val(optionValue);
// });

$("#select3 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CWEIGHT").val(optionValue);
});

$("#select4 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CORRECTI").val(optionValue);
});

$("#select5 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CORRECTL").val(optionValue);
});

$("#select6 input:radio").change(function() {
    var optionValue = $(this).val();
    console.log(optionValue);

    $("#CHECKCOMP").val(optionValue);
});


   // END toggle dem buttons

// var x = $("#NWEIGH").val();
// if(x == "Yes"){	
// 	$("#NW1").toggleClass( "active", true );
// }
// if(x == "No"){
// 	$("#NW2").toggleClass( "active", true );
// }


var y = $("#CWEIGHT").val();
if(y == "Yes"){	
	$("#CW1").toggleClass( "active", true );
}
if(y == "No"){
	$("#CW2").toggleClass( "active", true );
}



var z = $("#CORRECTI").val();
if(z == "Yes"){	
	$("#CI1").toggleClass( "active", true );
}
if(z == "No"){
	$("#CI2").toggleClass( "active", true );
}



var w = $("#CORRECTL").val();
if(w == "Yes"){	
	$("#CL1").toggleClass( "active", true );
}
if(w == "No"){
	$("#CL2").toggleClass( "active", true );
}

var b = $("#CHECKCOMP").val();
if(b == "Yes"){	
	$("#CC1").toggleClass( "active", true );
}
if(b == "No"){
	$("#CC2").toggleClass( "active", true );
}


});



    </script>
@endsection