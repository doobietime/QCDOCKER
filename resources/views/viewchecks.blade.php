@extends('layouts.app')

@section('content')
<div class="container">
   <!--  <div class="row justify-content-center"> -->
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
<button type="button" class="btn btn-primary">{{$check->check_product}}</button>
<button type="button" class="btn btn-primary">{{$check->check_datetime}}</button>
   <!--  {{$check->check_datetime}} -->
 <a href="{{ route('checkPage.edit',$check->id)}}" class="btn btn-success  float-right">Edit</a>
  </div>
    </ul>
  
  <div class="card-body">
   <!--  <h5 class="card-title">{{$check->check_product}}</h5> -->

    <div class="container">
  <div class="row">
    <div class="col-sm">
     <span class="badge badge-primary">Individual</span>
     <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
      <th scope="col">4</th>
      <th scope="col">5</th>
      <th scope="col">Target</th>
      <th scope="col">Average</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>{{$check->check_inv_1}}</td>
       <td>{{$check->check_inv_2}}</td>
        <td>{{$check->check_inv_3}}</td>
         <td>{{$check->check_inv_4}}</td>
          <td>{{$check->check_inv_5}}</td>
           <td>{{$check->check_inv_target_range}}</td>
            <td>{{$check->check_inv_average}}</td>
    </tr>

  </tbody>
</table>
    </div>
    <div class="col-sm">
     <span class="badge badge-primary">Row</span>
          <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
      <th scope="col">Target</th>
      <th scope="col">Average</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       <td>{{$check->check_row_1}}</td>
              <td>{{$check->check_row_2}}</td>
               <td>{{$check->check_row_3}}</td>
                <td>{{$check->check_row_target_range}}</td>
                 <td>{{$check->check_row_average}}</td>
    </tr>

  </tbody>
</table>
    </div>
     <div class="col-sm">
     <span class="badge badge-primary">Misc</span>
          <table class="table table-sm">
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
