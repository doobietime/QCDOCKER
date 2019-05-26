<head>

</head>
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Check</div>

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

                	<form method="POST" action="{{ url('/') }}/checkPage"><!--start form-->
                		{{csrf_field()}}


                	<div class="form-row">

						     <div class="form-group col-md-8 center-block text-center">
						    	<div class='input-group center-block ' id='datetimepicker1'>
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
	                			</div>
						    </div>

						     <div class="form-group col-md-4">

						     		<div class="form-group">
								    	<label for="">Product</label>
								      <select class="form-control form-control-lg" name="newcheck_product_name" select="{{ old('newcheck_product_name') }}">
								      	if({{ old('newcheck_product_name') }}){
								      	<option>{{ old('newcheck_product_name') }}</option>
								      }
								      else{
								      @foreach ($allSkus as $sku)
								      	<option>{{$sku->Code}}</option>
								      	@endforeach

								  };
								      	
								      </select>
									</div>

							     	<div class="form-group">
							     	 <label for="">Date & Time</label>
							    	<input class="form-control form-control-lg" type="text" id="result1" name="newcheck_datetime" data-date-format="Y-MM-DD HH:mm:s"  value="{{ old('newcheck_datetime') }}">
									</div>

								
						   
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
							    <div class="form-group col-md-6">
							    	 <small class="form-text text-muted">Sample Weight (Grams)</small>
							      <label for="inputEmail4">Individual</label>

							        <div class="form-row text-center">
					    <div class="form-group col-md-2 ">
					      <label for="individual_1">1</label>
					      <input type="text" class="form-control" name="individual_1" value="{{ old('individual_1') }}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="individual_2">2</label>
					      <input type="text" class="form-control" name="individual_2" value="{{ old('individual_2') }}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="individual_3">3</label>
					      <input type="text" class="form-control" name="individual_3" value="{{ old('individual_3') }}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="individual_4">4</label>
					      <input type="text" class="form-control" name="individual_4" value="{{ old('individual_4') }}">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="individual_5">5</label>
					      <input type="text" class="form-control" name="individual_5" value="{{ old('individual_5') }}">
					    </div>

					  </div>

					   <div class="form-row">
					   	 <div class="form-group col-md-4 ">
					      <label for="">Target Range</label>
					      <input type="text" class="form-control" name="newcheck_individual_target_range" placeholder="">
					    </div>
					     <div class="form-group col-md-4">
					      <label for="">Average</label>
					      <input type="text" class="form-control" name="newcheck_individual_average" placeholder="">
					    </div>

					   </div>

							  </div>




					  		  <div class="form-group col-md-6 ">
							    	 <small id="" class="form-text text-muted">Sample Weight (Grams)</small>
							      <label for="">Row</label>

							           <div class="form-row text-center">
					    <div class="form-group col-md-2">
					      <label for="">1</label>
					      <input type="text" class="form-control" name="sample_1" placeholder="">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="">2</label>
					      <input type="text" class="form-control" name="sample_2" placeholder="">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="">3</label>
					      <input type="text" class="form-control" name="sample_3" placeholder="">
					    </div>

					  </div>


					    <div class="form-row">
					   	 <div class="form-group col-md-4">
					      <label for="inputEmail4">Target Range</label>
					      <input type="text" class="form-control" name="newcheck_sample_target_range" placeholder="">
					    </div>
					     <div class="form-group col-md-4">
					      <label for="inputEmail4">Average</label>
					      <input type="text" class="form-control" name="newcheck_sample_average" placeholder="">
					    </div>

					   </div>
							    </div>
							</div>



					  		<hr />




					    <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="inputEmail4">Dough Temp</label>
					      <input type="text" class="form-control" name="newcheck_dough_temp" placeholder="">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputPassword4">Flour Temp</label>
					      <input type="text" class="form-control" name="newcheck_flour_temp" placeholder="">
					    </div>
					     <div class="form-group col-md-4">
					      <label for="inputPassword4">Butter Temp</label>
					      <input type="text" class="form-control" name="newcheck_butter_temp" placeholder="">
					    </div>
					  </div>

					  <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Comments</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" name="newcheck_comments"></textarea>
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

    </script>



@endsection



 