@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Factory Induction Quiz</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               

               

                    <form>

            @foreach ($questions as $q)

         <h4>{{$q->question}}</h4>	
         <br />
         <div class="radio">
         <label class="radio"><input type="radio" name="{{$q->id}}" value="1" meme="{{$q->ans}}"> {{$q->op1}}</label>
         </div>

          <div class="radio">
         <label class="radio"><input type="radio" name="{{$q->id}}" value="2" meme="{{$q->ans}}"> {{$q->op2}}</label>
         </div>

          <div class="radio">
         <label class="radio"><input type="radio" name="{{$q->id}}" value="3" meme="{{$q->ans}}"> {{$q->op3}}</label>
         </div>

          <div class="radio">
         <label class="radio"><input type="radio" name="{{$q->id}}" value="4" meme="{{$q->ans}}"> {{$q->op4}}</label>
         </div>
<!-- 
         <input class="chosenAnswer" type="text" id="{{$q->id}}"> -->

    <hr />
         @endforeach

         <button type="button" class="btn btn-primary" id="submitQuiz">Submit</button>
          <button style="display: none;" type="button" class="btn btn-warning" id="retryQuiz">Retry</button>
           <button style="display: none;" type="button" class="btn btn-success float-right hidden" id="finishQuiz">Finish</button>
  </form>

                  
</div>
                    
<input id="resultBox">
                </div>
            </div>
        </div>
    </div>
</div>


<script>

  $(document).ready( function() {
    	 $('input:radio').click(function() {      
	         var getID = $(this).attr("meme");
	         var getANS = $(this).attr("value");

	         if (getID == getANS){
	         	console.log("correct");
	         }
	         else{
	         	console.log("wrong)");
	         }
	         console.log (getANS);
     	});

  });

//Submit Button Action
  $("#submitQuiz").click(function() {  

  	var correctCounter = 0;
  	var total = 10;
  	$("#submitQuiz").addClass("disabled");
  	$("input:radio").attr('disabled', true);

  	$("form input[type=radio]:checked").each(function(){
  		if($(this).attr("meme") == $(this).attr("value")){
  			//$(this).attr('disabled', true);
  			$(this).parent().addClass("text-success");
  			correctCounter++;
  			
  		}
  		else{
  			$(this).parent().addClass("text-danger");
  			
  		}
  	});
$("#resultBox").val("Your Score : " + correctCounter + "/" + total);

if(correctCounter > 8){
	$("#finishQuiz").show();
}
else{
	$("#retryQuiz").show();
};

//Retry Action
$("#retryQuiz").click(function() {  
location.reload();
});

//AJAX to link to Finish -> Save to DB that you have successfully completed the Quiz

   // $.ajaxSetup({
   //      headers: {
   //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //      }
   //  });

  	//        $.ajax({
   //         type:'GET',
   //         url:'/ajaxRequest',
   //         data:{
   //         	ids : myArray
   //         },
   //         success:function(data){
   //          	$("#resultBox").val(data);
   //          	console.log(data);
   //          	console.log(JSON.stringify(data));


   //          }
   //       });

});
  

</script>

@endsection