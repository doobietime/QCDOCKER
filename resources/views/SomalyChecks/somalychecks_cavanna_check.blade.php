
@extends('layouts.app')


@section('content')

<div class="container">

{{$cav_number}}
</div>

<div class="container">
	  <div class="row">
        <div class="col-sm-6">
            <input type="text" class="form-control datetimepicker-input" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5"/>
        </div>
</div>
   


 <script type="text/javascript">
            $(function () {
                $('#datetimepicker5').datetimepicker({
                	 format: 'HH:mm'
                });
            });
        </script>



@endsection

