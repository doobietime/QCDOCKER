@extends('layouts.app')
@section('content')

<div class="container">

<h5>Weigh Up Checks Done Today</h5>
     

   @foreach ($allWeighups as $wu)
      
<div class="card ">
   <a class="d-none"> {{$wu->id}} <a/>
  <div class="card-header">
<button type="button" class="btn btn-primary btn-sm">{{$wu->ingredient}}</button>
<button type="button" class="btn btn-primary btn-sm">{{$wu->type}}</button>
<button type="button" class="btn btn-primary btn-sm">{{$wu->created_at}}</button>
<span class="badge badge-primary">Check Done By : {{$wu->recorded_by}}</span>
  
<!--  <a href="{{ route('weighup.edit',$wu->id)}}" class="btn btn-success btn-sm float-right">Edit</a> -->
  </div>
    </ul>
  
  <div class="card-body">


    <div class="container">
  <div class="row">
    <div class="col-sm">
     
     <table class="table table-sm text-center">
  <thead>
    <tr>
      <th scope="col">No. of Weigh up</th>
      <th scope="col">Correct Weight</th>
      <th scope="col">Correct Ingredient</th>
      <th scope="col">Correct Label</th>
      <th scope="col">Checksheet Completed</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>{{$wu->number_of_weighup}}</td>
       <td>{{$wu->correct_weight}}</td>
        <td>{{$wu->correct_ingredient}}</td>
         <td>{{$wu->correct_label}}</td>
           <td>{{$wu->checksheet_completed}}</td>
         
    </tr>

  </tbody>
</table>


   
  </div>
</div>  

<div class="card">
  <div class="card-body">
    Comments:
    {{$wu->comments}}
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
