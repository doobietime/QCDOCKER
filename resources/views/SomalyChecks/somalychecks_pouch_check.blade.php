

@extends('layouts.app')

@section('content')


<div class="container">
	@foreach ($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach

	<form method="POST" enctype="multipart/form-data" action="{!! route('somalycheck.store')!!}">	{{csrf_field()}}

<!-- {{ request()->session()->get('VF.save_mo')}}
 -->

<input hidden type="text" name="machineID" value="{{$pouch_number}}">
<input hidden type="text" id="doobie" name="product_used" value="">
<input hidden type="text" id="scoobiedoobie" name="product_used_code" value="">
<input hidden type="text" id="last_used_days" name="last_used_days" value="">
<h5 class="alert alert-primary"> Machine : {{$pouch_number}} </h5>

<div class="row">

	<!--RIGHT COLUMN -->
		<div class="col-6">
		<h6>Product : </h6>
			<select class="form-control form-control-lg" id="input1" name="selected_product">
				<option >Change SKU...</option>
					@foreach ($skus as $sku)
					<option name="sku_selected" scode="{{$sku->Code}}" value="{{$sku->id}}">{{$sku->Code}}::::{{$sku->Description}}</option>
					@endforeach

			</select>
			<br />

	<h1 style="padding: 10px;" id="displaysku" class="jumbotron text-center"></h1>

	<div style="padding:5px" class=" row">
	<div class="col-4">Min:<h3> <span id="minbox"></span></h3></div>
	<div class="col-4">Max:<h3> <span id="maxbox"></span></h3></div>
	<div class="col-4">Target:<h3> <span id="targetbox"></span></h3></div>
	</div>
	</div>


	<!--LEFT COLUMN -->
	<div class="col-6 pb-1">
		<div class="row">
        <div class="col-sm-12">
<!--            <div class="form-group">
     <div class="input-group date date_only" id="md_input" data-target-input="nearest">
                    <input name="save_md" id="doob" type="text" class="form-control datetimepicker-input " data-target="#md_input" value="{{$dumpy['save_md']}}"/>
                    <div class="input-group-append" data-target="#md_input" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>      	
                </div> -->
        <div class="col-auto">
      <div class="input-group mb-2 ">
Made Date:
    <div class="input-group date date_only" id="md_input" data-target-input="nearest">
                    <input required name="save_md" id="doob" type="text" class="form-control datetimepicker-input " data-target="#md_input" value="{{$dumpy['save_md']}}"/>
                    <div class="input-group-append" data-target="#md_input" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>      	
            
      </div>
      Best Before Date: ( <span class="text-primary">Made Date + <span id="plusdays"></span></span>)
    <div class="input-group date date_only" id="bbd_input" data-target-input="nearest">
                    <input required name="save_bbd" id="doobs" type="text" class="form-control datetimepicker-input " data-target="#bbd_input" value="{{$dumpy['save_bbd']}}"/>
                    <div class="input-group-append" data-target="#bbd_input" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>      	
            
      </div>
     Packed Date:
    <div class="input-group date date_only" id="pd_input" data-target-input="nearest">
                    <input required name="save_pd"  type="text" class="form-control datetimepicker-input " data-target="#pd_input" value="{{$dumpy['save_pd']}}"/>
                    <div class="input-group-append" data-target="#pd_input" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>      	
            
      </div>
      MO Number:
    <div class="input-group">
                 <input name="save_mo" type="text" class="form-control" id="mo_input" value="{{$dumpy['save_mo']}}">
   	
            
      </div>
    </div>

                
            </div>

        </div>
	</div>
		
			

	</div>


</div>
	<span hidden id="doobie"></span>

<hr />
<div class="row pt-3">
	<div class="col-2">
		<input required name="i1[]" style="height:60px; font-size:20px;" class="form-control weights weightall" type="number" step="any" value="{{old('i1[*]')}}">Weight
	</div>
	<div class="col-2">
		<input required name="i1[]" style="height:60px; font-size:20px;" class="form-control weights weightall" type="number" step="any">Weight 
	</div>
	<div class="col-2">
		<input required name="i1[]" style="height:60px; font-size:20px;" class="form-control weights weightall" type="number" step="any">Weight 
	</div>
	<div class="col-2">
		<input required name="i1[]" style="height:60px; font-size:20px;" class="form-control weights weightall" type="number" step="any">Weight
	</div>
	<div class="col-2">
		<input required name="i1[]" style="height:60px; font-size:20px;" class="form-control weights weightall" type="number" step="any">Weight 
	</div>
<div class="col-2">
		<input step="0.01" readonly name="average" id="avgbox"  style="height:60px; font-size:20px;" class="form-control" type="number">Avg <span class="alert-danger">  </span>
	</div>
	
</div>
<!--restest div -->
<div class="row " id="retest">
	<div class="col-12">
		
		
		<label class="form-check-label float-right" for="recheckbox">
			<input class="form-check-input" type="checkbox" id="recheckbox">
		Re-Test
		</label>
	</div>
</div>
<!--retest weights-->

<div  class="row pt-3" id="retest_weights">

	<div class="col-2">
		<input   name="i2[]" style="height:60px; font-size:20px;" class="form-control weights2 weightall" type="number" step="any">Weight
	</div>
	<div class="col-2">
		<input   name="i2[]" style="height:60px; font-size:20px;" class="form-control weights2 weightall" type="number" step="any">Weight 
	</div>
	<div class="col-2">
		<input   name="i2[]" style="height:60px; font-size:20px;" class="form-control weights2 weightall" type="number" step="any">Weight 
	</div>
	<div class="col-2">
		<input   name="i2[]" style="height:60px; font-size:20px;" class="form-control weights2 weightall" type="number" step="any">Weight
	</div>
	<div class="col-2">
		<input   name="i2[]" style="height:60px; font-size:20px;" class="form-control weights2 weightall" type="number" step="any">Weight 
	</div>
<div class="col-2">
		<input step="0.01" readonly name="average2" id="avgbox2"  style="height:60px; font-size:20px;" class="form-control" type="number">Avg <span class="alert-danger">  </span>
	</div>
	
</div>


<!--end retest weights-->

<hr />
<input hidden id="hidden" value="{{$lastsku}}"/>
<div class="row pt-3">
	<div class="col-md-6 d-flex">
		<h4>Film Part:</h4>
		 <input readonly class="form-control" id="film_box" name="film_part" type="text" value="{{$dumpy['film_part']}}">
	</div>
	<div class="col-md-6 d-flex">
		<h4>Version: </h4>
		<input class="form-control" id="film_version_box" name="film_version" type="text" value="{{$dumpy['film_version']}}">
	</div>

</div>
<div class="row pt-3">
<div class="col-12">
	<table class="table table-sm table-bordered">
               				<thead class="thead-light">
               				<tr>
               					
               					<th>Specification</th>
               					<th>Result in Spec</th>
               					<th>Comments</th>
               				</tr>
               			</thead>
               			<tbody>

               				<tr>
               					<td >Seal Test<input name="p2[]" type="hidden" class="form-control" value="Seal Test"></td>
               					<td style="max-width:100px;">
               						<input readonly name="ris[]" class="asdf btn btn-danger active form-control"  aria-pressed="false" autocomplete="off" value="No"></input>
               					</td>
               					<td><input name="coms[]" type="text" class="form-control"></td>
              
               				</tr>
               				<tr>
               					<td >Fin Seal Even & Aligned<input name="p2[]" type="hidden" class="form-control" value="Fin Seal Even and Aligned"></td>
               					<td style="max-width:100px;">
               						<input readonly name="ris[]" class="asdf btn btn-danger active form-control"  aria-pressed="false" autocomplete="off" value="No"></input>
               					</td>
               					<td><input name="coms[]" type="text" class="form-control"></td>
              
               				</tr>
               				<tr>
               					<td >BBD Correct<input name="p2[]" type="hidden" class="form-control" value="BBD Correct"></td>
               					<td style="max-width:50px;">
               						<input readonly name="ris[]" class="asdf btn btn-danger active form-control"  aria-pressed="false" autocomplete="off" value="No"></input>
               					</td>
               					<td><input name="coms[]" type="text" class="form-control"></td>
              
               				</tr>
               				<tr>
               					<td >BBD Quality & Alignment<input name="p2[]" type="hidden" class="form-control" value="BBD Quality & Alignment"></td>
               					<td style="max-width:100px;">
               						<input readonly name="ris[]" class="asdf btn btn-danger active form-control"  aria-pressed="false" autocomplete="off" value="No"></input>
               					</td>
               					<td><input name="coms[]" type="text" class="form-control"></td>
              
               				</tr>
               				<tr>
               					<td >Carton Label<input name="p2[]" type="hidden" class="form-control" value="Carton Label"></td>
               					<td style="max-width:100px;">
               						<input readonly name="ris[]" class="asdf btn btn-danger active form-control"  aria-pressed="false" autocomplete="off" value="No"></input>
               					</td>
               					<td><input name="coms[]" type="text" class="form-control"></td>
              
               				</tr>
               				
               			</tbody>
               		</table>
               	</div>
</div>
<button type="submit" class=" btn btn-primary btn-lg float-right">Submit</button>
</form>
</div>



@endsection

@section('somalyjs')
<script src="/js/somaly.js"></script>
@endsection



