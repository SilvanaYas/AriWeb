$("#registrar").click(function(){
	var dato = $("#nombreCategoria").val();
	var route = "/category";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{nombreCategoria: dato},

		success:function(){
			window.location='/category';
			$("#msj-success").fadeIn();
		},
		error:function(msj){
			$("#msj").html(msj.responseJSON.nombreCategoria);
			$("#msj-error").fadeIn();
		}
	});
});