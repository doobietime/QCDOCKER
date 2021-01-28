@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Deposit Weight Check History  <a href="/csvRequest" class="float-right" id="csv">Download CSV</a></div>
               


                <div class="card-body shadow-sm">{{ $allChecks->links() }}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <table class="table table-responsive table" id="tabletop">
  <thead class="">
  	 
    <tr>   
     <th >Done By</th>
     
      <th scope="col">Date of Check</th>
      <th scope="col">Product</th>
      
    <!--   <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
      <th scope="col">4</th>
      <th scope="col">5</th> -->
     <th scope="col" >Inv Average</th>
     <th scope="col" class="table-info">Inv Target Range</th>
   <!--   <th scope="col">1</th>
     <th scope="col">2</th>
     <th scope="col">3</th> -->
     <th scope="col">Row Average</th>
     <th scope="col" class="table-info">Row Target Range</th>
     <th scope="col">Dough Temp</th>
     <th scope="col">Flour Temp</th>
     <th scope="col">Butter Temp</th>
     <th>Status</th>
  <!--    <th scope="col">Comments</th> -->

    </tr>

  </thead>
  <tbody>
  	  @foreach ($allChecks as $check)

    <tr > 
  
     <td id="record_user"> <a >{{ $check->recorded_by }}</a></td>
     <!--  <td>{{$check->recorded_by}}</td> -->
      <td>{{$check->created_at}}</td>
      <td>{{$check->check_product}}</td>
    <!--    <td>{{$check->check_inv_1}}</td>
        <td>{{$check->check_inv_2}}</td>
         <td>{{$check->check_inv_3}}</td>
          <td>{{$check->check_inv_4}}</td>
           <td>{{$check->check_inv_5}}</td> -->
            <td >{{$check->check_inv_average}}</td>
             <td class="table-info">{{$check->check_inv_target_range}}</td>
           <!--    <td>{{$check->check_row_1}}</td>
               <td>{{$check->check_row_2}}</td>
                <td>{{$check->check_row_3}}</td> -->
                <td>{{$check->check_row_average}}</td>
                <td class="table-info">{{$check->check_row_target_range}}</td>
                <td>{{$check->check_dough_temp}}</td>
                <td>{{$check->check_flour_temp}}</td>
                 <td>{{$check->check_butter_temp}}</td>

                <td id="{{$check->id}}" style="cursor: pointer"> <a class="badge badge-light"><?php

                 if( ($check->verify == NULL) && ($check->recorded_by !==  Auth::user()->name ) ){
                // if( $check->verify == NULL ){
                  echo "<a class='badge update'>Verify Now</a>";
                }
                else if( ($check->verify == NULL) && ($check->recorded_by ==  Auth::user()->name ) ){
                  echo "<a class='badge badge-success'></a>";
                }
                else{
                  echo "<a class='badge badge-success'>Verified</a>";
                }

                ?></a><span class="badge badge-secondary">{{$check->verified_by}}</span></td>
               <!--  <td>{{$check->check_comments}}</td> -->
                <td>
                  <?php if($check->check_comments){
                  echo " <span class='badge badge-primary' data-toggle='modal' data-target='#a$check->id'>Comments</span>";
                }
?>
                </td>
                <div class="modal fade" id="a{{$check->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Comments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       {{$check->check_comments}}
      </div>
    
    </div>
  </div>
</div>

    </tr>

    
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
           url:'/ajaxRequest_updateStatus',
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




// $(document).on("click", "#csv" , function() {

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//      $.ajax({
//            type:'GET',
//            url:'/csvRequest',
//            data:{},
//            success:function(data){

    
//            }
//         });
  
//   });

   
</script>

@endsection


