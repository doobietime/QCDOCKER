@extends('layouts.app')
@section('content')



<div class="container">

	<h3>Critical Control Point Check</h3>

		<form class="form" id="ccpform">
			
			

			<label>Date & Time</label>

			<div class="form-group">
		    <label for="exampleInputEmail1">Select line  </label>
		    <select class="form-control">
				<option>Carton M.D - Line 1</option>
				<option>Carton M.D - Line 2</option>
				<option>Online Cookie</option>
				<option>Online Bar</option>
				<option>X4 - X-Ray</option>
			</select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Product</label>
		    <select class="form-control" id="boxe">
            @foreach($skus as $sku)
           <option val={{$sku->Code}}>{{$sku->Code}} - {{$sku->Description}}</option>
            @endforeach
				
			</select>
		  </div>
		  <div class="form-group">
                    <table class="table table-bordered">

                    <thead class="thead-light">
                        <tr>
                            <th>Test Pieces</th>
                            <th>Result</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>


                    
                    <tr>
                    <td>2.0 Fe</td>
                    <td><input readonly name="ris[]" class="asdf btn btn-primary form-control"  aria-pressed="false" autocomplete="off" value="No"></input></td>
                    <td><input required value="" name="coms[]" type="text" class="form-control com"></td>
                    </tr>
                    <tr>
                    <td>2.5 NFe</td>
                    <td><input readonly name="ris[]" class="asdf btn btn-primary form-control"  aria-pressed="false" autocomplete="off" value="No"></input></td>
                    <td><input required value="" name="coms[]" type="text" class="form-control com"></td>
                    </tr>
                    <tr>
                    <td>3.0 S/S</td>
                    <td><input readonly name="ris[]" class="asdf btn btn-primary form-control"  aria-pressed="false" autocomplete="off" value="No"></input></td>
                    <td><input required value="" name="coms[]" type="text" class="form-control com"></td>
                    </tr>
               


                    </tbody>


                    </table>



		  </div>
          
          <button id="submits" type="submit" class="btn btn-primary form-control">Submit</button>
		</form>

</div>

<script>

$( document ).ready(function() {


$(".asdf").addClass("btn-danger active");
});


$(".asdf").click(function(){
 var x = $(this).attr("value");
 if(x == "No"){
     $(this).attr("value","Yes");
     $(this).removeClass("btn-danger");
     $(this).addClass("btn-success active");
     $(this).closest('td').next('td').find('input[name="coms[]"]').prop('required',false);
     
 }
 if(x == "Yes"){
     $(this).attr("value","No");
     $(this).removeClass("btn-success");
     $(this).addClass("btn-danger active");
     $(this).closest('td').next('td').find('input[name="coms[]"]').prop('required',true);
     
 }
 
})

$(document).ready(function() {
    $('#boxe').select2();
});

// $("#ccpform").on("submit", function(){
//     event.preventDefault(); 
//     $('.asdf').each(function(){

//         if( $(this).val() == "No")
//         {
//             // $(this).closest('td').next('td').find('input[name="coms[]"]').prop('required',true);
            
//         }

//         console.log( $(this).closest('td').next('td').find('input[name="coms[]"]').val() );
//     })

 
//     // if ( $('.asdf').val() == "No" )
//     // {
//     //    // $(this).closest('input').prop("required", true);
//     //    event.preventDefault(); 
//     //    console.log( $(this).closest('input').val() );

//     // } 

// });
</script>

@endsection

