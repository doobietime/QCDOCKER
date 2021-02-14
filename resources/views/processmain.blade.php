@extends('layouts.app')

@section('content')



<div class="container pl-4">
<h3><strong>Process Checks</strong></h3>

<hr />

	<!--Row 1-->
	<div class="row pb-2 pt-2 justify-content-center ">
		<div class="col-md-8 ">
			<a href="{{ url('newCheck/create') }}"><button  class="btn btn-primary btn-block" ><h3>Deposit Weight</h3></button></a>
		</div>
	
	</div>

		<!--Row 2-->
	<div class="row pb-2 pt-2 justify-content-center">
		<div class="col-md-8">
			<a href="{{ url('mixing/create') }}"><button  class="btn btn-primary btn-block" ><h3>Mixing</h3></button></a>	
		</div>
		
	</div>

		<!--Row 3-->
	<div class="row pb-2 pt-2 justify-content-center">
		<div class="col-md-8">
			<a href="{{ url('weighup/create') }}"><button  class="btn btn-primary btn-block" ><h3>Weigh-Up</h3></button></a>
		</div>
		
	</div>

    <div class="row pb-2 pt-2 justify-content-center">
		<div class="col-md-8">
			<a href="{{ url('oven/create') }}"><button  class="btn btn-primary btn-block" ><h3>Oven</h3></button></a>
		</div>
		
	</div>

    <div class="row pb-2 pt-5 justify-content-center">
		<div class="col-md-8">
			<a href="{{ url('/dev02') }}"><button  class="btn btn-primary btn-block" ><h3>Critical Control Point (CCP)</h3></button></a>
		</div>
		
	</div>



</div>


</div>

@endsection