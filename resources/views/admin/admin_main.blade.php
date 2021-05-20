@extends('layouts.app')
@section('content')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">New SKU</div>

                <div class="card-body shadow-sm">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
 					@endif

 					<div class="row">
	 					<div class="col-md-10">
	 						
	 						
	 						<form method="POST" action="{{ url('/') }}/adminpage">
	 							{{csrf_field()}}

	 						
	 								@if(session()->has('message'))
										<div class="alert alert-success" role="alert">{{session()->get('message')}}
										</div>
									@endif	

	 								@if(session()->has('error'))
										<div class="alert alert-danger" role="alert">{{session()->get('error')}}
										</div>
									@endif	

	 							<div class="form-group row">
	 								<label for="skucode" class="col-sm-2 col-form-label col-form-label-sm">SKU Code</label>
	 								<div class="col-sm-5">
	 									<input required name="sc" type="text" class="form-control from-control-sm" id="skucode" placeholder="required">
	 								</div>
	 							</div>
	 							<div class="form-group row">
	 								<label for="desc" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
	 								<div class="col-sm-5">
	 									<input required name="desc" type="text" class="form-control from-control-sm" id="desc" placeholder="required">
	 								</div>
	 							</div>

	 							<div class="form-group row">
	 								<label for="pt" class="col-sm-2 col-form-label col-form-label-sm"> Product Type</label>
	 								<div class="col-sm-5">
	 									<select required name="pt" class="form-control from-control-sm">
	 										<option value="">Select..</option>
	 										<option value="Cookie">Cookie</option>
	 										<option value="OSM">OSM</option>
	 										<option value="bumperbars">Bumper Bar</option>
	 										<option value="preweigh">Pre-Weigh</option>
	 										<option value="RM">Raw Material</option>
											 <option value="TBC">QC Checks</option>
	 									</select>
	 								</div>
	 								
	 							</div>
	 							<div class="form-group row">
	 								<label for="supplier" class="col-sm-2 col-form-label col-form-label-sm"> Supplier</label>
	 								<div class="col-sm-5">
	 									<input name="sup" type="text" class="form-control from-control-sm" id="supplier" placeholder="If SKU type is RM">
	 								</div>
	 								
	 							</div>


<hr />
	<div class="alert alert-info">For Process Checks Only</div>
	 							<h5>Individual</h5>
	 							<div class="form-group row">
	 								<label for="" class="col-sm-2 col-form-label col-form-label-sm"> Min - Max</label>
	 								<div class="col-sm-2">
	 									<input name="imin" type="number" class="form-control from-control-sm" id="">
	 								</div>
	 								<div class="col-sm-2">
	 									<input name="imax" type="number" class="form-control from-control-sm" id="">
	 								</div>
	 							</div>
	 							<h5>Row</h5>
	 							<div class="form-group row">
	 								<label for="" class="col-sm-2 col-form-label col-form-label-sm"> Min - Max</label>
	 								<div class="col-sm-2">
	 									<input name="rmin" type="number" class="form-control from-control-sm" id="">
	 								</div>
	 								<div class="col-sm-2">
	 									<input name="rmax" type="number" class="form-control from-control-sm" id="">
	 								</div>
	 							</div>
	 								
<button id="submitBtn" type="submit" class="btn btn-primary mb-2">Submit</button>
	 						</form>


	 					</div>
	 					
 				</div>

 					

 				
</div>
 				
 				
 		
 					</form>

                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection