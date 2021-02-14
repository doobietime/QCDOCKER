@extends('layouts.app')

@section('content')
<div class="container">
<!--   <p>Hi   {{ Auth::user()->name }}!</p> -->
    <div class="row ">
        <div class="col-md-6">
        <h5>Quality Checks</h5><hr />
                    <div class="card mb-2">
                   
              <div class="card-body shadow">

                <div class="row">
                    <div class="col-md-12">
                        <div class="my-1 p-2 bg-white rounded shadow-sm border-gray">
                  
    <h5 class="border-bottom border-gray pb-1 mb-0">Toyo - <a href="{{ route('somaly.report','Toyo')}}"><span class="badge badge-primary">{{$tcount}}</span></a></h5>
 

   
  </div>
                    </div>

                         <div class="col-md-12">
                        <div class="my-1 p-2 bg-white rounded shadow-sm border-gray">
            
    <h5 class="border-bottom border-gray pb-1 mb-0">VFFS - <a href="{{ route('somaly.report','VFFS')}}"><span class="badge badge-primary">{{$vcount}}</span></a></h5>
 

   
  </div>
                    </div>


                         <div class="col-md-12">
                        <div class="my-1 p-2 bg-white rounded shadow-sm border-gray">
                    
    <h5 class="border-bottom border-gray pb-1 mb-0">Cavanna  - <a href="{{ route('somaly.report','Cavanna')}}"><span class="badge badge-primary">{{$cavcount}}</span></a></h5>
 
 
   
  </div>
                    </div>

                    <div class="col-md-12">
                        <div class="my-1 p-2 bg-white rounded shadow-sm border-gray">
                       
    <h5 class="border-bottom border-gray pb-1 mb-0">Water Activity - <a href="{{ route('somaly.report','WaterA')}}"> <span class="badge badge-primary">{{$watercount}}</span></a></h5>
 
 
   
  </div>
                    </div>

                    <div class="col-md-12">
                        <div class="my-1 p-2 bg-white rounded shadow-sm border-gray">
                       
    <h5 class="border-bottom border-gray pb-1 mb-0">Scale Calibration - <a href="{{ route('somaly.report','ScaleC')}}"><span class="badge badge-primary">{{$scount}}</span></a></h5>
 

   
  </div>
                    </div>


                    <div class="col-md-12">
                        <div class="my-1 p-2 bg-white rounded shadow-sm border-gray">
                       
    <h5 class="border-bottom border-gray pb-1 mb-0">Syrup Results - <a href="{{ route('somaly.report','Syrup')}}"><span class="badge badge-primary">{{$sycount}}</span></a></h5>
 
 
   
  </div>
                    </div>

                    
                  </div>




              </div>

          </div>


      




              </div>
<!--END 1st column-->

<div class="col-md-6">
<h5>Process Checks</h5>
<hr />
            <div class="card ">
          <!--     <div class="card-header">adf</div> -->
  
                <div class="card-body shadow">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   


                 <div>
                   <!-- <span class="badge badge-success">Factory Induction Quiz Completed</span>-->
                  </div>
                  


          <!--QC CHECK SECTION-->
        <div class="row">
      <div class="col-md-12">

                    <div class="my-1 p-2 bg-white rounded shadow-sm border-gray">
                     <!--   <small class="d-block text-right mt-1">
    <a href="/reportforcheck">To Verify <span class="badge badge-primary">{{$ccount}}</span></a></small> -->
    <h5 class="border-bottom border-gray pb-1 mb-0">Deposit Weight - <a href="/reportforcheck"> <span class="badge badge-primary">{{$ccount}}</span></a></h5>
 
 @foreach ($allChecks as $check)

 <div class="media text-muted pt-3">

      <p class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">{{$check->check_product}}</strong>
      {{$check->created_at}}
      </p>
    </div>


 @endforeach
    
   
  </div>

  <!-- <small class="d-block text-right mt-3">
    <a href="/checkPage">Details </a></small> -->

</div>

<div class="col-md-12">
  
                    <div class="my-1 p-2 bg-white rounded shadow-sm">
                   
    <h5 class="border-bottom border-gray pb-1 mb-0">Mixing - <a href="/reportformixing"> <span class="badge badge-primary">{{$mcount}}</span></a></h5>

    @foreach ($allMixing as $mixing)
    <div class="media text-muted pt-3">
  
      <p class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">{{$mixing->mixing_product}}</strong>
{{$mixing->created_at}}
      </p>
    </div>

 @endforeach
   
  </div>
  <!-- <small class="d-block text-right mt-3">
    <a href="/mixing">Details </a></small> -->

</div>


   
<div class="col-md-12">

                    <div class="my-1 p-2 bg-white rounded shadow-sm">
                       
    <h5 class="border-bottom border-gray pb-1 mb-0">Weigh-Up - <a href="/reportforweighup"> <span class="badge badge-primary">{{$wcount}}</span></a></h5>
       @foreach ($Weighups as $weighup)
    <div class="media text-muted pt-3">

      <p class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">{{$weighup->type}}</strong>
 {{$weighup->created_at}}
      </p>
    </div>
@endforeach
  </div>

  <!-- <small class="d-block text-right mt-3">
    <a href="/weighup">Details </a></small> -->

</div>




<div class="col-md-12">
  
                    <div class="my-1 p-2 bg-white rounded shadow-sm">
                      
    <h5 class="border-bottom border-gray pb-1 mb-0">Oven - <a href="/reportforoven"><span class="badge badge-primary">{{$ocount}}</span></a> </h5>
    @foreach ($Oven as $oven)
    <div class="media text-muted pt-3">
 
      <p class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">{{$oven->oven_product}}</strong>
 {{$oven->created_at}}
      </p>

    </div>
@endforeach
   
  </div>

</div>

<div class="col-md-12">
  
                    <div class="my-1 p-2 bg-white rounded shadow-sm">
                      
    <h5 class="border-bottom border-gray pb-1 mb-0">CCP - <a href="{{ route('somaly.report','CCP')}}"><span class="badge badge-primary">{{$ccpcount}}</span></a> </h5>

   
  </div>

</div>


</div>





                   
                   

                </div>
            </div>
        </div>

</div>

          </div>
         

    </div>
</div>
@endsection
