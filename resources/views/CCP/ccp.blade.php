@extends('layouts.app')
@section('content')



<div class="container">

	<h3>Critical Control Point Check</h3>

		<form class="form">
			
			<select class="form-control">
				<option>Carton M.D - Line 1</option>
				<option>Carton M.D - Line 2</option>
				<option>Online Cookie</option>
				<option>Online Bar</option>
				<option>X4 - X-Ray</option>
			</select>

			<label>Date & Time</label>

			<div class="form-group">
		    <label for="exampleInputEmail1">Select line  </label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <div class="form-check">
		    <input type="checkbox" class="form-check-input" id="exampleCheck1">
		    <label class="form-check-label" for="exampleCheck1">Check me out</label>
		  </div>

		</form>

</div>

@endsection