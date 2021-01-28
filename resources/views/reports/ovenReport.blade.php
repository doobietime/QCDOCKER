@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Oven Check History  <a href="/csvRequest_oven" class="float-right" id="csv">Download CSV</a></div>

                <div class="card-body shadow-sm">{{ $allOvens->links() }}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <table class="table table-responsive">
  <thead class="">
  	 
    <tr>   
      <th scope="col">Done By</th>
      <th scope="col">Date of Check</th>
       <!-- <th scope="col">Type</th> -->
      <th scope="col">Product</th>
      <th scope="col">Trolley No.</th>
      <th scope="col">Colour</th>
      <th scope="col">Spread</th>
      <th scope="col">Correct Temp</th>
     <th scope="col">Correct Time</th>
      <th scope="col">Checklist Completed</th>
       <th>Status</th>

 

    </tr>

  </thead>
  <tbody>
  	  @foreach ($allOvens as $oven)

    <tr>    
     <td>{{$oven->recorded_by}}</td>
      <td>{{$oven->created_at}}</td>
      <td>{{$oven->oven_product}}</td>
       <td>{{$oven->trolley_number}}</td>
        <td>{{$oven->colour}}</td>
         <td>{{$oven->spread}}</td>
          <td>{{$oven->correct_temp}}</td>
           <td>{{$oven->correct_time}}</td>
            <td>{{$oven->checklist_completed}}</td>

              <td id="{{$oven->id}}" style="cursor: pointer"> <a class="badge badge-light"><?php

                 if( ($oven->verify == NULL) && ($oven->recorded_by !==  Auth::user()->name ) ){
              
                  echo "<a class='badge update'>Verify Now</a>";
                }
                else if( ($oven->verify == NULL) && ($oven->recorded_by ==  Auth::user()->name ) ){
                  echo "<a class='badge badge-success'></a>";
                }
                else{
                  echo "<a class='badge badge-success'>Verified</a>";
                }

                ?></a><span class="badge badge-secondary">{{$oven->verified_by}}</span></td>
                  <td>
                  <?php if($oven->comments){
                  echo " <span class='badge badge-primary' data-toggle='modal' data-target='#a$oven->id'>Comments</span>";
                }
?>
                </td>


            
            
             
    </tr>

       <div class="modal fade" id="a{{$oven->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Comments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       {{$oven->comments}}
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
           url:'/ajaxRequest_updateStatus_oven',
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
