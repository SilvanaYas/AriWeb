$("#registro").click(function(){
	var dato = $("#nombreTipoProducto").val();
	var dato1 = $("#idGrupo").val();
	var route = "/type";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{nombreTipoProducto: dato, idGrupo:dato1},

		success:function(){
			window.location='/type';
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