@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Inwards Goods Inspection</div>

                <div class="card-body shadow-sm">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
 					@endif

 					<form method="POST" action="{{ url('/') }}/IGCheck">
 						{{csrf_field()}}

 						<div class="form-group">
 						<label for="input1">Select Item :</label>

 					<select class="form-control form-control-lg" id="input1" name="selected_product">
 						@foreach ($rms as $rm)
 						<option value="{{$rm->id}}">{{$rm->Code}}::::{{$rm->Description}}::::{{$rm->supplier}}</option>
 						@endforeach

 					</select>
<!-- <hr />
 					<label>Supplier :</label>
 				<input required class="form-control" type="text" name="selected_supplier">
 		 -->


</div>
 				<hr />
 					<button type="submit" class="btn btn-primary btn-lg btn-block">Create</button>
 		
 					</form>

                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#input1').select2();
});
</script>


@endsection