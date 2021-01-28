
$(document).ready( function() {

//hide retest box
// $("#retest").hide();
$("#retest_weights").hide();
$(".weights2").prop("disabled", true);

//set last used sku to default 
	var LUS = $("#hidden").val();
	$("#input1").val(LUS);

	 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
        var product_selected = $("#input1").val();
   
        $.ajax({
           type:'GET',
           url:'/getSkus',
           data:{prod:product_selected},
           success:function(data){
    
           	var min = data[0].pouch_min;
           	var max = data[0].pouch_max;
           	var target = data[0].pouch_target;
           	var name = data[0].Code;
           	var doobie = data[0].id;
           	var days = data[0].best_before_days;
           	var filmp = data[0].film_part_no;
           	var filmv = data[0].pouch_version;
           	

           	$("#minbox").text(min);
           	$("#maxbox").text(max);
           	$("#targetbox").text(target);
           	$("#displaysku").text(name);
           	$("#doobie").val(doobie);
           	$("#plusdays").text(days);
           	$("#last_used_days").val(days);
           	$("#film_box").val(filmp);
   			$("#film_version_box").val(filmv);
   			$("#scoobiedoobie").val(name);

           }
        });
  


//pretty average
var avg = $("#avgbox");

$(".weights").on('change', function(){

	var inputArray = [];
	var total = 0;

	$(".weights").each(function(e){
		inputArray.push(parseFloat(this.value));
		total+= inputArray[e];
		var average = (total/5);
		avg.val(average);
	});
});

//average box retest

var avg2 = $("#avgbox2");

$(".weights2").on('change', function(){

	var inputArray = [];
	var total = 0;

	$(".weights2").each(function(e){
		inputArray.push(parseFloat(this.value));
		total+= inputArray[e];
		var average = (total/5);
		avg2.val(average);
	});
});


//clicky buttons change colour
$(".asdf").click(function(){
	var x = $(this).attr("value");
	if(x == "No"){
		$(this).attr("value","Yes");
		$(this).removeClass("btn-danger");
		$(this).addClass("btn-success active");
		
	}
	if(x == "Yes"){
		$(this).attr("value","No");
		$(this).removeClass("btn-success");
		$(this).addClass("btn-danger active");
		
	}
	
});

//make text beeg beeger
// $("#input1").on('change', function(e){
// 	var x = $("#input1 option:selected");
// 	console.log(x.text());
// 	$("#displaysku").html(x.text());
// });

//ajax to get min/max/target and populate fields
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $("#input1").change(function(e){
  
        e.preventDefault();
  
        var product_selected = $("#input1").val();
   
        $.ajax({
           type:'GET',
           url:'/getSkus',
           data:{prod:product_selected},
           success:function(data){
    
           	var min = data[0].pouch_min;
           	var max = data[0].pouch_max;
           	var target = data[0].pouch_target;
           	var name = data[0].Code;
           	var doobie = data[0].id;
           	var days = data[0].best_before_days;
           	var filmp = data[0].film_part_no;
           	var filmv = data[0].pouch_version;



           	$("#minbox").text(min);
           	$("#maxbox").text(max);
           	$("#targetbox").text(target);
           	$("#displaysku").text(name);
           	$("#doobie").val(doobie);
   			$("#plusdays").text(days);
   			$("#last_used_days").val(days);
   			$("#film_box").val(filmp);
   			$("#film_version_box").val(filmv);
   			$("#scoobiedoobie").val(name);

           }
        });
  
	}); 

//timepicker for Somaly Check pages - toyo pouch and cavanna


          $(function () {
                $('.date_only').datetimepicker({
                	 format: 'YYYY-MM-DD',
                });
            });

           $(function () {
                $('#time').datetimepicker({
                	 format: 'HH:mm:ss',
                });
            });

//auto-populate best before date on somaly pouch checks

  $("#doob").on('focusout', function(){
console.log("changed");
 	var dateSelected = this.value;	
 	var hmm = $("#plusdays").text();
 	console.log(hmm);
	var mdate = moment(dateSelected).add(hmm,'day').format('YYYY-MM-DD');

 	$("#doobs").val(mdate);
 });


  //green red boxes

  $(".weightall").on('focusout', function(e){

  	var m = $("#minbox").text();
  	var mx = $("#maxbox").text();
  	var r_trigger = 0;

  	var x = this.value;

  	if(parseFloat(x) < parseFloat(m) || parseFloat(x) > parseFloat(mx)){
  		// console.log('out of range');
  		$(this).removeClass('border border-success');
  		$(this).addClass('border border-danger');

  	}
  	else{
  		// console.log('in range');
		$(this).removeClass('border border-danger');
  		$(this).addClass('border border-success');

  	}


})

  //retest check box

  $("#recheckbox").change(function(){
  	if(this.checked){
  			$("#retest_weights").show();
  			$(".weights2").prop("disabled", false);
  	}
  	else{
  		$(".weights2").prop("disabled", true);
  			$("#retest_weights").hide();
  			
  	}
  
  })


  //ajax get mo for water activity

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $("#sku_selector").change(function(e){

        e.preventDefault();


        var product_selected = $("#sku_selector").val();
        console.log(product_selected);


     $("#motable tbody").empty();
        $.ajax({
           type:'GET',
           url:'/getMos',
           data:{prod:product_selected},
           success:function(data){

           	$("#submitMO").prop('disabled',true);
           	$("#addLine").prop('disabled',true);


           	$("#mo_selector").empty();
           	$("#mo_selector").append("<option>Choose...</option>");


    
           	for(i=0 ; i < data.length ; i++)
           	{
           		var mon = data[i]['mo_number'];
           		var eyed = data[i]['id'];
           		 	console.log(mon + eyed);

           		$("#mo_selector").append("<option value='"+eyed+"'>"+mon+"</option>");
           	}

           }
        });

	}); 

	//get mo lines

	  $("#mo_selector").change(function(e){

	  		$("#motable tbody").empty();


	  	var selected_mo = $("#mo_selector").val();
	  	console.log(selected_mo);
	  	if(selected_mo !== "Choose..."){
	  			

	  	   $.ajax({
           type:'GET',
           url:'/getMosLines',
           data:{mo:selected_mo},
           success:function(data){

           	$("#submitMO").prop('disabled',false);
           	$("#addLine").prop('disabled',false);

  

           	$("#motable tbody").empty();

           	$.each(data, function(index,obj){



           		var row = $('<tr class="doobie">');

           		row.append('<td>' + obj.created_by + '<input style="display:none" name="ids[]" value="' + obj.id + '"</td>');
           		row.append('<td>' + obj.type + '</td>');
           		row.append('<td><input class="form-control" step="0.001" name="'+obj.id+'[]" type="number" value="'+obj.c1+'"></td>');
           		row.append('<td><input class="form-control" step="0.001" name="'+obj.id+'[]" type="number" value="'+obj.c2+'"></td>');
           		row.append('<td><input class="form-control" step="0.001" name="'+obj.id+'[]" type="number" value="'+obj.c3+'"></td>');
           		row.append('<td>' + obj.avg + '</td>');

           		$('#motable').append(row);
           	})


           }
        });

	  	}
	  

	  });

//get existing syrups

 $("#syrup_selector").change(function(e){
 $("#stable tbody").empty();

 var selected_syrup = $("#syrup_selector").val();
 var syrupn = $("#syrup_selector > option:selected").text();

 $("#syrupname").val(syrupn);

 console.log(selected_syrup);


  	   $.ajax({
       type:'GET',
       url:'/getSyrupLines',
       data:{mo:selected_syrup},
       success:function(data){


       	$("#stable tbody").empty();

       	$.each(data, function(index,obj){

       		var row = $('<tr class="doobie">');

       		row.append('<td><select name="'+obj.id+'[]" class="bbox'+index+' form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></td');
       		row.append('<td><input name="'+obj.id+'[]" class="form-control datepicker_recurring_start" value="'+obj.made_date+'"/></td>');
       		row.append('<td><select name="'+obj.id+'[]" class="form-control tbox'+index+'"><option value="Start">Start</option><option value="Middle">Middle</option><option value="End">End</option><option value="Retest">Retest</option><option value="NA">N/A</option></select></td>');
			row.append('<td><input class="form-control" step="0.001" name="'+obj.id+'[]" type="number" value="'+obj.c1+'"></td>');
           	row.append('<td><input class="form-control" step="0.001" name="'+obj.id+'[]" type="number" value="'+obj.c2+'"></td>');
           	row.append('<td><input class="form-control" step="0.001" name="'+obj.id+'[]" type="number" value="'+obj.c3+'"></td>');
           	row.append('<td>' + obj.avg + '<input style="display:none" name="ids[]" value="' + obj.id + '"</td>');
       		$('#stable').append(row);

       		$(".bbox"+index).val(obj.batch_number);
       		$(".tbox"+index).val(obj.type);
       	})




       }
    });

  	});

  

//end on document ready
});





