$("#stock").click(function(){
	var dato = $("#gro_nom").val();
	var route = "/stocks";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{gro_nom: dato},

		success:function(){
			$("#msj-success").fadeIn();
		},
		error:function(msj){
			$("#msj").html(msj.responseJSON.nombre);
			$("#msj-error").fadeIn();
		}
	});
});