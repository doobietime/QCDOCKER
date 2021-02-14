@extends('layouts.app')

@section('content')



<div class="container pl-4">
<h3><strong>Quality Checks</strong></h3>

<hr />

	<!--Row 1-->
	<div class="row pb-5 pt-2 ">
		<div class="col-md-3">
			<a href="{{ route('pouch.form','T2')}}"><button  class="btn btn-primary btn-block" ><h3>Toyo T2</h3></button></a>{{$latestt2}}
		</div>
		<div class="col-md-3">
			<a href="{{ route('pouch.form','T1')}}"><button  class="btn btn-primary btn-block" ><h3>Toyo T1</h3></button></a>{{$latestt1}}
		</div>
		<div class="col-md-3">
			<a href="{{ route('pouch.form','VF')}}"><button  class="btn btn-primary btn-block" ><h3>VFFS</h3></button></a>{{$latestvf}}
		</div>
		<div class="col-md-3">
			<a href="{{ route('pouch.form','C1')}}"><button  class="btn btn-primary btn-block" ><h3> Cavanna 1</h3></button></a>{{$latestc1}}
		</div>
	</div>

		<!--Row 2-->
	<div class="row pb-5 pt-5">
		<div class="col-md-3">
			<a href="{{ route('water.form_prod','Product')}}"><button  class="btn btn-primary btn-block" ><h3>Product WA</h3></button></a>	
		</div>
		<div class="col-md-3">
			
		</div>
		<div class="col-md-3">
			
		</div>
		<div class="col-md-3">
			<a href="{{ route('pouch.form','C3')}}"><button  class="btn btn-primary btn-block" ><h3> Cavanna 3</h3></button></a>{{$latestc3}}
		</div>
	</div>

		<!--Row 3-->
	<div class="row pb-5 pt-5">
		<div class="col-lg-3">
			<a href="{{ route('water.form')}}"><button  class="btn btn-primary btn-block" ><h3>Water Activity</h3></button></a>
		</div>
		<div class="col-lg-3">
			<a href="{{ route('cali.form')}}"><button  class="btn btn-primary btn-block" ><h3>Scale Calibration</h3></button></a>
		</div>
		<div class="col-lg-3">
			
		</div>
		<div class="col-lg-3">
			<a href="{{ route('pouch.form','C2')}}"><button  class="btn btn-primary btn-block" ><h3> Cavanna 2</h3></button></a>{{$latestc2}}
		</div>
	</div>



</div>


</div>

@endsection