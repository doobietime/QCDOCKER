@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Weigh Up Check History  <a href="/csvRequest_weighup" class="float-right" id="csv">Download CSV</a></div>

                <div class="card-body shadow-sm">{{ $allWeighups->links() }}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <table class="table table table-responsive">
  <thead class="">
  	 
    <tr>   
      <th scope="col">Done By</th>
      <th scope="col">Date of Check</th>
       <!-- <th scope="col">Type</th> -->
      <th scope="col">Type</th>
      <th scope="col">SKU</th>
      <th scope="col">Weigh up No.</th>
      <th scope="col">Correct Weight</th>
      <th scope="col">Correct Ingredient</th>
     <th scope="col">Correct Label</th>
      <th scope="col">Checksheet Completed</th>
      <th>Status</th>


    </tr>

  </thead>
  <tbody>
  	  @foreach ($allWeighups as $wu)

    <tr>    
      <td>{{$wu->recorded_by}}</td>
      <td>{{$wu->created_at}}</td>
      <td>{{$wu->type}}</td>
       <td>{{$wu->ingredient}}</td>
        <td>{{$wu->number_of_weighup}}</td>
         <td>{{$wu->correct_weight}}</td>
          <td>{{$wu->correct_ingredient}}</td>
           <td>{{$wu->correct_label}}</td>
            <td>{{$wu->checksheet_completed}}</td>

               <td id="{{$wu->id}}" style="cursor: pointer"> <a class="badge badge-light"><?php

                 if( ($wu->verify == NULL) && ($wu->recorded_by !==  Auth::user()->name ) ){
              
                  echo "<a class='badge update'>Verify Now</a>";
                }
                else if( ($wu->verify == NULL) && ($wu->recorded_by ==  Auth::user()->name ) ){
                  echo "<a class='badge badge-success'></a>";
                }
                else{
                  echo "<a class='badge badge-success'>Verified</a>";
                }

                ?></a><span class="badge badge-secondary">{{$wu->verified_by}}</span></td>
                  <td>
                  <?php if($wu->comments){
                  echo " <span class='badge badge-primary' data-toggle='modal' data-target='#a$wu->id'>Comments</span>";
                }
?>
                </td>

            
            
             
    </tr>

        <div class="modal fade" id="a{{$wu->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Comments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       {{$wu->comments}}
      </div>
    
    </div>
  </div>
</div>

   @endforeach
  
  </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

  $(document).on("click", ".update" , function() {
  var record_id = $(this).closest('td').attr('id');
  console.log(record_id);

  var response = window.confirm("Are you sure sure you want to verify this check?");
   if (response) {

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
   
        $.ajax({
           type:'POST',
           url:'/ajaxRequest_updateStatus_weigh',
           data:{status: "1", id: record_id},
           success:function(data){
            console.log("Ajax success, status has been udpdated");
            location.reload();
           }
        });


   }
   else{

   }

});



   
</script>
@endsection
