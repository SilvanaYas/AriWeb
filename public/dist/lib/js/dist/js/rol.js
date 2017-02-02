$("#rol").click(function(){
	var dato = $("#nombreRol").val();
	var route = "/perfil";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{nombreRol: dato},

		success:function(){
			window.location='/perfil';
			$("#msj-success").fadeIn();
		},
		error:function(msj){
			$("#msj").html(msj.responseJSON.nombreRol);
			$("#msj-error").fadeIn();
		}
	});
});