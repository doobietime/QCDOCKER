@extends('layouts.app')

@section('content')
<div class="container">

  <h5>Deposit Weight Checks Done Today </h5>
   <!--  <div class="row  "> -->
<!--         <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Checks</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    

   @foreach ($allChecks as $check)
      
<div class="card ">
   <a class="d-none"> {{$check->id}} <a/>
  <div class="card-header">
    <!-- <h5 >{{$check->check_product}} - {{$check->check_datetime}}  </h5> -->

<button type="button" class="btn btn-primary btn-sm">{{$check->check_product}}</button>

<button type="button" class="btn btn-primary btn-sm">{{$check->created_at}}</button>
<!-- <a href="{{ route('checkPage.edit',$check->id,$check->product)}}" class="btn btn-success btn-sm  float-right">Edit</a> -->
   <!--  {{$check->check_datetime}} -->

  </div>
    </ul>
  
  <div class="card-body">
   <!--  <h5 class="card-title">{{$check->check_product}}</h5> -->

    <div class="container">
  <div class="row">
    <div class="col-sm-4">
     <span class="badge badge-primary">Individual</span>
     <table class="table table-sm text-center">
  <thead>
    <tr>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
      <th scope="col">4</th>
      <th scope="col">5</th>
      <th scope="col">Avg</th>
      <th scope="col">Target</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>{{$check->check_inv_1}}</td>
       <td>{{$check->check_inv_2}}</td>
        <td>{{$check->check_inv_3}}</td>
         <td>{{$check->check_inv_4}}</td>
          <td>{{$check->check_inv_5}}</td>
         
            <td>{{$check->check_inv_average}}</td>
              <td>{{$check->check_inv_target_range}}</td>
    </tr>

  </tbody>

</table>
    </div>
    <div class="col-sm-4">
     <span class="badge badge-primary" >Row</span>
          <table class="table table-sm text-center">
  <thead>
    <tr>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
      <th scope="col">Avg</th>
      <th scope="col">Target</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       <td>{{$check->check_row_1}}</td>
              <td>{{$check->check_row_2}}</td>
               <td>{{$check->check_row_3}}</td>
                
                 <td>{{$check->check_row_average}}</td>
                 <td>{{$check->check_row_target_range}}</td>
    </tr>

  </tbody>
</table>
    </div>
     <div class="col-sm-4">
     <span class="badge badge-primary">Misc</span>
          <table class="table table-sm text-center">
  <thead>
    <tr>
      <th scope="col">Dough Temp</th>
      <th scope="col">Flour Temp</th>
      <th scope="col">Butter Temp</th>

    </tr>
  </thead>
  <tbody>
    <tr>
        <td>{{$check->check_dough_temp}}</td>
                   <td>{{$check->check_flour_temp}}</td>
                    <td>{{$check->check_butter_temp}}</td>

    </tr>

  </tbody>
</table>
    </div>
   
  </div>
<?php if($check->re_check_inv_1 && $check->re_check_row_1){
  echo "
 <div class='row'>
    <div class='col-sm-4'>
     <span class='badge badge-primary'>Individual</span>
     <span class='badge badge-danger'>Re-test</span>
  <table class='table table-sm text-center'>
  <thead>
    <tr>
      <th scope='col'>1</th>
      <th scope='col'>2</th>
      <th scope='col'>3</th>
      <th scope='col'>4</th>
      <th scope='col'>5</th>
      <th scope='col'>Avg</th>
      <th scope='col'>Target</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>$check->re_check_inv_1</td>
       <td>$check->re_check_inv_2</td>
        <td>$check->re_check_inv_3</td>
         <td>$check->re_check_inv_4</td>
          <td>$check->re_check_inv_5</td>
         
            <td>$check->re_check_inv_average</td>
             <td>$check->check_inv_target_range</td>
              
    </tr>

  </tbody>

</table>
</div>
     <div class='col-sm-4'>
     <span class='badge badge-primary' >Row</span>
      <span class='badge badge-danger'>Re-test</span>
          <table class='table table-sm text-center'>
  <thead>
    <tr>
      <th scope='col'>1</th>
      <th scope='col'>2</th>
      <th scope='col'>3</th>
      <th scope='col'>Avg</th>
      <th scope='col'>Target</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       <td>$check->re_check_row_1</td>
              <td>$check->re_check_row_2</td>
               <td>$check->re_check_row_3</td>
                
                 <td>$check->re_check_row_average</td>
                 <td>$check->check_row_target_range</td>
    </tr>

  </tbody>
</table>
    </div>
</div>

  ";
}

 elseif($check->re_check_row_1){ 

    echo "
 <div class='row'>
    <div class='col-sm-4'>
    
</div>
     <div class='col-sm-4'>
     <span class='badge badge-primary' >Row</span>
      <span class='badge badge-danger'>Re-test</span>
          <table class='table table-sm text-center'>
  <thead>
    <tr>
      <th scope='col'>1</th>
      <th scope='col'>2</th>
      <th scope='col'>3</th>
      <th scope='col'>Avg</th>
      <th scope='col'>Target</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       <td>$check->re_check_row_1</td>
              <td>$check->re_check_row_2</td>
               <td>$check->re_check_row_3</td>
                
                 <td>$check->re_check_row_average</td>
                 <td>$check->check_row_target_range</td>
    </tr>

  </tbody>
</table>
    </div>
</div>

  ";
  
  }
  elseif($check->re_check_inv_1){
  echo "
 <div class='row'>
    <div class='col-sm-4'>
     <span class='badge badge-primary'>Individual</span>
     <span class='badge badge-danger'>Re-test</span>
  <table class='table table-sm text-center'>
  <thead>
    <tr>
      <th scope='col'>1</th>
      <th scope='col'>2</th>
      <th scope='col'>3</th>
      <th scope='col'>4</th>
      <th scope='col'>5</th>
      <th scope='col'>Avg</th>
      <th scope='col'>Target</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>$check->re_check_inv_1</td>
       <td>$check->re_check_inv_2</td>
        <td>$check->re_check_inv_3</td>
         <td>$check->re_check_inv_4</td>
          <td>$check->re_check_inv_5</td>
         
            <td>$check->re_check_inv_average</td>
             <td>$check->check_inv_target_range</td>
              
    </tr>

  </tbody>

</table>
</div>
     
</div>

  ";
}

  ?>

</div>  

<div class="card">
  <div class="card-body">
    Comments:
    {{$check->check_comments}}
  </div>
</div>    

  
  </div>

</div>
<br />
                 @endforeach


      <!--           </div>
            </div>
        </div> -->

<!--     </div> -->
</div>

@endsection
