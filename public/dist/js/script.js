$("#registro").click(function(){
	var dato = $("#nombreGrupo").val();
	var route = "/group";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{nombreGrupo: dato},

		success:function(){
			window.location='/group';
			$("#msj-success").fadeIn();
		},
		error:function(msj){
			$("#msj").html(msj.responseJSON.nombreGrupo);
			$("#msj-error").fadeIn();
		}
	});
});