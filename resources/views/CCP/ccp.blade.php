@extends('layouts.app')
@section('content')



<div class="container">

	<h3>Critical Control Point Check</h3>

		<form method="POST" class="form" id="ccpform" enctype="multipart/form-data" action="{!! route('ccp.store')!!}">	{{csrf_field()}}>
			
			

			<label>Date & Time *THIS WILL AUTOFILL WHEN USER SUBMITS</label>

			<div class="form-group">
		    <label for="lineselect">Select line</label>
		    <select name="selected_line" id="lineselect" class="form-control">
                <option>Select Line...</option>
				<option value="MD">Carton M.D - Line 1</option>
				<option value="MD">Carton M.D - Line 2</option>
				<option value="OC">Online Cookie</option>
				<option value="OB">Online Bar</option>
				<option value="X4">X4 - X-Ray</option>
			</select>
		  </div>
		  <div class="form-group">
		    <label for="abcd">Product</label>
		    <select name="selected_sku" class="form-control" id="boxe">
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
                    <td><input id="t1" class="form-control tp" name="tpiece[]" ></td>
                    <td><input readonly name="ris[]" class="asdf btn btn-primary form-control"  aria-pressed="false" autocomplete="off" value="No"></input></td>
                    <td><input required value="" name="coms[]" type="text" class="form-control com"></td>
                    </tr>
                    <tr>
                    <td><input  id="t2" class="form-control tp" name="tpiece[]" ></td>
                    <td><input readonly name="ris[]" class="asdf btn btn-primary form-control"  aria-pressed="false" autocomplete="off" value="No"></input></td>
                    <td><input required value="" name="coms[]" type="text" class="form-control com"></td>
                    </tr>
                    <tr>
                    <td><input  id="t3" class="form-control tp" name="tpiece[]" ></td>
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

$('#lineselect').on('change', function (e){
      var x = $('option:selected',this).val();

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
        $.ajax({
           type:'GET',
           url:'/ajaxRequest_getTestPieces',
           data:{
           p_selected: x
           },
           success:function(data){

             $(".tp").val('');

            var v1 = data[0].value;
            var v2 = data[0].value1;
            var v3 = data[0].value2;

            $("#t1").val(v1);
            $("#t2").val(v2);
            $("#t3").val(v3);


          

           
           }
        });

    });


</script>

@endsection

