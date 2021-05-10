@extends('layouts.app')

@section('content')
<div class="container">

<h3><strong>Inwards Goods</strong></h3>

<hr />

  <nav class="nav nav-pills flex-column flex-sm-row">

  <a class="flex-sm-fill text-sm-center nav-link my-auto active mr-3" href=" {{url('IGCheck/create')}}">New Check</a>

    <a class="flex-sm-fill text-sm-center nav-link my-auto active" href=" {{url('IGCheck/createOfflinePDF')}} ">Export Offline Form</a>
  <a class="flex-sm-fill text-sm-center nav-link "></a>
   <a class="flex-sm-fill text-sm-center nav-link "></a>
    <a class="flex-sm-fill text-sm-center nav-link "></a>

 <form class="form-inline float-right" method="GET" action="{{ route('IGCheck.index')}}">
  <a class="flex-sm-fill text-sm-center nav-link "><input value="" name="q" class="form-control mr-2" type="search" placeholder="Search Name or Code">  <a class="flex-sm text-sm-center nav-link my-auto active mr-3" href="{{url('IGCheck/')}}">X</a></a></form>

</nav>

<hr />
    <div class="row justify-content-center">


        <div class="col-md-12">
            
                <div class="header"> 
    
   
<div class="table-responsive shadow-sm">
<table class="table table-bordered table-sm table-striped">
  <thead>

    <tr>
      <th>Date</th>
      <th>Item Code</th>
      <th>Item Name</th>
      <!-- <th>Created At</th> -->
      <th>IG Check ( {{$igcount}} / {{$allcount}} )</th>
      <th>RM Specification  ( {{$rmcount}} / {{$allcount}} )</th>
      <th>Release  ( {{$vercount}} / {{$allcount}} ) </th>
     
    </tr>
  </thead>
  <tbody>


      @foreach ($alligchecks as $igcheck)


    <tr id="{{$igcheck->id}}">
      <td>{{$igcheck->created_at}}
        @if($igcheck->created_at->format('d-m-Y') == $today->format('d-m-Y'))
        <small> <span class="badge badge-danger">Today</span></small>
      @endif</td>
      <td>{{$igcheck->item_code}}</td>
      <td>{{$igcheck->item_name}}</td>
   <!--    <td>{{$igcheck->created_at}}</td> -->

      
    <td>
      @if(empty($igcheck->completed))
       <small class="d-block mt-1">
      <a href="{{ route('igcheck_igs.create',$igcheck->id)}}"><svg class="bi bi-file-text" width="2em" height="2em" viewBox="0 0 16 16" fill="red" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
  <path fill-rule="evenodd" d="M4.5 10.5A.5.5 0 0 1 5 10h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
</svg><strong> - IG Check</strong></a>
    </small>
      @else(!empty($igcheck->completed))
       <small class="d-block mt-1">
        <a><svg class="bi bi-file-check" width="2em" height="2em" viewBox="0 0 16 16" fill="green" xmlns="http://www.w3.org/2000/svg">
  <path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8h-1v5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5V1z"/>
  <path fill-rule="evenodd" d="M15.854 2.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 4.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg></a>
    <span class="badge badge-secondary">{{$igcheck->igs_done_by}}</span></small>
       
      @endif
    </td>

    <td>
    @if(!empty($igcheck->completed) && empty($igcheck->rms_completed))
     <small class="d-block mt-1">
     <a href="{{ route('igcheck_rms.create',$igcheck->id)}}"><svg class="bi bi-file-text" width="2em" height="2em" viewBox="0 0 16 16" fill="red" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
  <path fill-rule="evenodd" d="M4.5 10.5A.5.5 0 0 1 5 10h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
</svg><strong> - RM Spec</strong></a>
     @elseif(!empty($igcheck->rms_completed))
   </small>
     <small class="d-block mt-1">
        <a><svg class="bi bi-file-check" width="2em" height="2em" viewBox="0 0 16 16" fill="green" xmlns="http://www.w3.org/2000/svg">
  <path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8h-1v5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5V1z"/>
  <path fill-rule="evenodd" d="M15.854 2.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 4.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg></a>
    <span class="badge badge-secondary">{{$igcheck->rms_done_by}}</span></small>

     @endif

    </td>

    <td>
      @if(!empty($igcheck->completed) && !empty($igcheck->rms_completed) && empty($igcheck->release_completed))
      <small class="d-block mt-1">
     <a href="{{ route('igcheck_release',$igcheck->id)}}"><svg class="bi bi-file-text" width="2em" height="2em" viewBox="0 0 16 16" fill="red" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
  <path fill-rule="evenodd" d="M4.5 10.5A.5.5 0 0 1 5 10h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
</svg><strong> - Release</strong></a>
   </small>
      @elseif(!empty($igcheck->verified_status) && !empty($igcheck->release_completed))
       <small class="d-block mt-1">
     <a href="{{ route('igcheck.review', $igcheck->id)}}"><svg class="bi bi-file-check" width="2em" height="2em" viewBox="0 0 16 16" fill="green" xmlns="http://www.w3.org/2000/svg">
  <path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8h-1v5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5V1z"/>
  <path fill-rule="evenodd" d="M15.854 2.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 4.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg><strong> - Verified</strong></a>
      <span class="badge badge-secondary">{{$igcheck->verified_by}}</span></small>
      @elseif(!empty($igcheck->release_completed))
        <small class="d-block mt-1">
     <a href="{{ route('igcheck.review', $igcheck->id)}}"><svg class="bi bi-file-check" width="2em" height="2em" viewBox="0 0 16 16" fill="green" xmlns="http://www.w3.org/2000/svg">
  <path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V8h-1v5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5V1z"/>
  <path fill-rule="evenodd" d="M15.854 2.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 4.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg><strong> - Review</strong></a>
     <span class="badge badge-secondary">{{$igcheck->release_done_by}}</span></small>
      @endif
    </td>

@if (Auth::user()->is_admin == "1" )
<td id="removeBtn"><svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></td>

<td ><a href="{{ route('igcheck_ax',$igcheck->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
  <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg></a></td>
@endif
   
  


    </tr>
   
 

      @endforeach


  </tbody>
</table>
{{$alligchecks->links()}}

<!--                           <div class="col-md-12">

                              <div class="my-3 p-3 bg-white rounded shadow-sm">
            
           
           @foreach ($alligchecks as $igcheck)

           <div class="media text-muted pt-3">

                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">{{$igcheck->item_code}}</strong>
                {{$igcheck->created_at}}<br/>
                {{$igcheck->PO_number}}
                </p>

              </div>



           @endforeach
              
             
            </div>

          

          </div> -->





<!--                         <ul class="list-group ">
                          @foreach ($alligchecks as $igcheck)

                          <li class="list-group-item "> 
                            <div class="container">
                              <div class="row">
                                <div class="col">
                                  <p>Item : {{$igcheck->item_code}} -   {{$igcheck->item_name}}</p>
                                  <p>Date Received : {{$igcheck->created_at}}</p>
                                  <p>PO Number : {{$igcheck->PO_number}}</p>
                                  

                                </div>
                                  <div  class="btn-group" role="group"  col-md text-right >
                                    <button  type="button" class="btn btn-md btn-outline-secondary"><a href="{{ route('igcheck_igs.create',$igcheck->id)}}"> Inwards Goods Inspection</a></button>
                                     <button type="button" class="btn btn-md btn-outline-secondary"><a href="/igcheck_rms">Specification</a></button>
                                      <button type="button" class="btn btn-md btn-outline-secondary">Release</button>



                                  </div>
                                  </div>
                                
                              </div>


                              
                            
                               
                           
                          </li>


                     
                  
                          @endforeach

                        </ul> -->
                      
                   
                </div>
           
        
    </div>
</div>
</div>

<script>
$(document).on('click', "#removeBtn", function() {
  var lineID = $(this).closest('tr').attr('id');
  var lineTR =  $(this).closest('tr');
  var confirmation = confirm("Are you sure?");
  if (confirmation == true){
    console.log("deleted");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       $.ajax({
           type:'POST',
           url:'/ajaxRequest_removeIGLine',
           data:{
            line_selected: lineID
           },
           success:function(data){
            console.log("Line Removed");
            lineTR.remove();
  
         }
        });

  }
  
  });
</script>

@endsection
