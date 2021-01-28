@extends('layouts.app')

@section('content')
<div class="container">

<h5>Mixing Checks Done Today</h5>
     

   @foreach ($allMixing as $mixing)
      
<div class="card ">
   <a class="d-none"> {{$mixing->id}} <a/>
  <div class="card-header">
 <button type="button" class="btn btn-primary btn-sm">{{$mixing->mixing_type}}</button>
<button type="button" class="btn btn-primary btn-sm">{{$mixing->mixing_product}}</button>
<button type="button" class="btn btn-primary btn-sm">{{$mixing->created_at}}</button>
<span class="badge badge-primary">Check Done By : {{$mixing->recorded_by}}</span>
<!--  <a href="{{ route('mixing.edit',$mixing->id)}}" class="btn btn-success btn-sm float-right">Edit</a> -->
  </div>
    </ul>
  
  <div class="card-body">


    <div class="container">
  <div class="row">
    <div class="col-sm">
     
     <table class="table table-sm text-center">
  <thead>
    <tr>
      <th scope="col">Number of Mixes</th>
      <th scope="col">Correct Ingredients</th>
      <th scope="col">Correct Weight</th>
      <th scope="col">Mixing SOP Followed</th>
      <th scope="col">Checksheet Completed</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>{{$mixing->mixing_no_of_mixes}}</td>
       <td>{{$mixing->correct_ingredients}}</td>
        <td>{{$mixing->correct_weights}}</td>
         <td>{{$mixing->mixing_sop_followed}}</td>
          <td>{{$mixing->checksheets_completed}}</td>
         
    </tr>

  </tbody>
</table>


   
  </div>
</div>  

<div class="card">
  <div class="card-body">
    Comments:
    {{$mixing->comments_observation}}
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
