@extends('layouts.app')
@section('content')

<div class="container">

<h5>Oven Checks Done Today</h5>
     

   @foreach ($allOvens as $oven)
      
<div class="card ">
   <a class="d-none"> {{$oven->id}} <a/>
  <div class="card-header">
<button type="button" class="btn btn-primary btn-sm">{{$oven->oven_product}}</button>
<button type="button" class="btn btn-primary btn-sm">{{$oven->created_at}}</button>
<span class="badge badge-primary">Check Done By : {{$oven->recorded_by}}</span>
  
<!--  <a href="{{ route('oven.edit',$oven->id)}}" class="btn btn-success btn-sm float-right">Edit</a> -->
  </div>
    </ul>
  
  <div class="card-body">


    <div class="container">
  <div class="row">
    <div class="col-sm">
     
     <table class="table table-sm text-center">
  <thead>
    <tr>
      <th scope="col">Trolley No.</th>
      <th scope="col">Colour</th>
      <th scope="col">Spread</th>
      <th scope="col">Correct Temps</th>
      <th scope="col">Correct Time</th>
      <th scope="col">Checksheet Completed</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>{{$oven->trolley_number}}</td>
       <td>{{$oven->colour}}</td>
        <td>{{$oven->spread}}</td>
         <td>{{$oven->correct_temp}}</td>
          <td>{{$oven->correct_time}}</td>
           <td>{{$oven->checklist_completed}}</td>
         
    </tr>

  </tbody>
</table>


   
  </div>
</div>  

<div class="card">
  <div class="card-body">
    Comments:
    {{$oven->comments}}
  </div>
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
