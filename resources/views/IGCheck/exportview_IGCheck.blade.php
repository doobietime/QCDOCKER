@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Inwards Goods Backup Forms  <button onclick="window.print()" style="margin-left:5px;"  class="btn btn-success btn-sm float-right"><a style="color:inherit; text-decoration:none;">Print</a></button>
                 </div>
 
                <div class="card-body shadow-sm">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
 @endif
<div class="d-print-none">
<label  for="input1">Select Item :</label>
  <select class="form-control form-control-lg" id="input1" name="selected_product">
            @foreach ($rms as $rm)
            <option value="{{$rm->id}}">{{$rm->Code}}::::{{$rm->Description}}::::{{$rm->supplier}}</option>
            @endforeach

          </select>


          <hr />
        </div>


<div class="alert">
         <!--    //  *show inwards goods inspection details - igchecks','parameters','getBatch// -->
              <h5>Item Code: <span id="itemcodebox"></span> </h5>
               <h5>Item name:   <span id="itemdesbox"></span>  </h5>
                <h5>PO Number:  </h5>
                <h5>Supplier:  <span id="itemsupbox"></span>  </h5>
               <h5>Date: </h5>
      

             
</div>
<div class="float-right">Document Version - <span id="docversion"></span></div>

      <h5>Inwards Goods Inspection <small>(To be completed by Store Person)</small></h5>
             

                    <table class="table table-sm table-bordered batchTable">

                    <thead class="thead-light">
                      <tr>
                        <th>Batch Code</th>
                        <th>Best Before Date</th>
                        <th>Quantity</th>
                        <th>Temperature</th>
                  

                      </tr>
                    </thead>

                    <tbody>
                     
                      <tr>
                        
                        <td>&nbsp; </td>
                        <td>&nbsp; </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                       <tr>
                         <td>&nbsp; </td>
                        <td>&nbsp; </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                         <td>&nbsp; </td>
                        <td>&nbsp; </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                         <td>&nbsp; </td>
                        <td>&nbsp; </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                         <td>&nbsp; </td>
                        <td>&nbsp; </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    


                    </tbody>
                  </table>

                     <table id="paramtable1" class="table table-sm table-bordered">

                    <thead class="thead-light">
                      <tr>
                        <th>Parameters</th>
                        <th>Specification</th>
                        <th>Result in Spec</th>
                        <th>Comments</th>
                      </tr>
                    </thead>
                    <tbody>



          
   


                    </tbody>

                  
                  </table>
<hr />
<div class="float-right">Specification Version - <span id="specversion"></span></div>
<!--Parameter Table -->
<h5>Raw Material Specification <small>(To be completed by QC)</small></h5>
                  <table id="paramtable2" class="table table-sm table-bordered">

                    <thead class="thead-light">
                      <tr>
                        <th>Parameters</th>
                        <th>Specification</th>
                        <th>Result in Spec</th>
                        <th>Comments</th>
                      </tr>
                    </thead>
                    <tbody>



              <tr>
              <td></td>
              <td></td>
              <td>&nbsp;</td>
              <td></td>
              </tr>
   


                    </tbody>

                  
                  </table>



  <h5>Release</h5>

        <table id="HistoryTable" class="table table-sm table-bordered">
                  <thead class="thead-light">
                      <tr>
                        <th>Quantity Released</th>
                        <th>Date Released</th>
                
                      </tr>
                    </thead>

                    <tbody>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                  </tr>
               
                    </tbody>
                  </table>

</div>

</div>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function() {
    $('#input1').select2();
});

$('#input1').on('change', function (e){
      var x = $('option:selected',this).val();

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
        $.ajax({
           type:'GET',
           url:'/ajaxRequest_getDataforOfflineForm',
           data:{
           p_selected: x
           },
           success:function(data){

             $("#paramtable1 tbody").empty();
             $("#paramtable2 tbody").empty();


            console.log(data);
            var skuName = data.sku['Code'];
            var skuDes = data.sku['Description'];
            var skuSup = data.sku['supplier'];
            var docver = data.version;
            var specver = data.sversion;

          

          $("#itemcodebox").text(skuName);
          $("#itemdesbox").text(skuDes);
          $("#itemsupbox").text(skuSup);
          $("#docversion").text(docver);
           $("#specversion").text(specver);



               data.gparams.forEach(function (line) {
        $("#paramtable1 tbody").append(
            "<tr id='"+line.id+"'>"
                
                 +"<td>"+line.parameter_name+"</td>"
                  +"<td>"+line.specification+"</td>"
                  +"<td></td>"
                   +"<td></td>"
                 
               
            +"</tr>" )
    });

                   data.params.forEach(function (line) {
        $("#paramtable2 tbody").append(
            "<tr id='"+line.id+"'>"
                
                 +"<td>"+line.parameter_name+"</td>"
                  +"<td>"+line.specification+"</td>"
                  +"<td></td>"
                   +"<td></td>"
                 
               
            +"</tr>" )
    });

       



          
           
           }
        });

    });


</script>



@endsection
