$(document).ready( function() {

$(".p5").each(function(){
	// alert($(this).text());

	if( $(this).text() > 0.503 ||  $(this).text() < 0.497)
	{
		$(this).closest('tr').addClass("alert-danger");

	}
})

$(".p7").each(function(){
	// alert($(this).text());

	if( $(this).text() > 0.763 ||  $(this).text() < 0.757)
	{
		$(this).closest('tr').addClass("alert-danger");

	}
})

});