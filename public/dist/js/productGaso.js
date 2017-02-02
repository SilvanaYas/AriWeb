$("#registro").click(function(){
	var dato = $('#form-product').serialize();
	var route = "/product";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:dato,

		success:function(){
			window.location= '/product';
			$("#msj-success").fadeIn();
		},
		error:function(msj){
			  $.each(msj.responseJSON, function(i, field){
			   $("#msj").append("<ul><li>"+field+"</li></ul>");
			   $("#msj-error").fadeIn();
			});
		}
	});
});