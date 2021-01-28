@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mixing Check History  <a href="/csvRequest_mix" class="float-right" id="csv">Download CSV</a></div>

                <div class="card-body shadow-sm">{{ $allMixing->links() }}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <table class="table table-responsive">
  <thead class="">
  	 
    <tr>   
      <th scope="col">
      Done By</th>
      <th scope="col">Date of Check</th>
       <th scope="col">Type</th>
      <th scope="col">Product</th>
      
     
      <th scope="col">Mix Number</th>
      <th scope="col">Correct Ingredients</th>
      <th scope="col">Correct Weights</th>
      <th scope="col">Mixing SOP Followed</th>
     <th scope="col">Checksheets Completed</th>
    <!--   <th scope="col">Comments</th> -->
       <th>Status</th>

  <!--    <th scope="col">Comments</th> -->

    </tr>

  </thead>
  <tbody>
  	  @foreach ($allMixing as $mix)

    <tr>    
      <td>{{$mix->recorded_by}}</td>
      <td>{{$mix->created_at}}</td>
      <td>{{$mix->mixing_type}}</td>
       <td>{{$mix->mixing_product}}</td>
        <td>{{$mix->mixing_no_of_mixes}}</td>
         <td>{{$mix->correct_ingredients}}</td>
          <td>{{$mix->correct_weights}}</td>
           <td>{{$mix->mixing_sop_followed}}</td>
            <td>{{$mix->checksheets_completed}}</td>

              <td id="{{$mix->id}}" style="cursor: pointer"> <a class="badge badge-light"><?php

                 if( ($mix->verify == NULL) && ($mix->recorded_by !==  Auth::user()->name ) ){
              
                  echo "<a class='badge update'>Verify Now</a>";
                }
                else if( ($mix->verify == NULL) && ($mix->recorded_by ==  Auth::user()->name ) ){
                  echo "<a class='badge badge-success'></a>";
                }
                else{
                  echo "<a class='badge badge-success'>Verified</a>";
                }

                ?></a><span class="badge badge-secondary">{{$mix->verified_by}}</span></td>
      
                
<!-- 
                 <td id="{{$mix->id}}" > <a class="badge badge-light"><?php
                if($mix->verify == NULL){
                  echo "<a class='badge update'>Verify Now</a>";
                }
                else{
                  echo "<a class='badge badge-success'>Verified</a>";
                }

                ?></a></td> -->
                   <td>
                  <?php if($mix->comments_observation){
                  echo " <span class='badge badge-primary' data-toggle='modal' data-target='#a$mix->id'>Comments</span>";
                }
?>
                </td>
            
             
    </tr>

      <div class="modal fade" id="a{{$mix->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Comments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       {{$mix->comments_observation}}
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
           url:'/ajaxRequest_updateStatus_mix',
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
