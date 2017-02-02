$("#registro").click(function(){
	var dato = $('#form_presen').serialize();
	var route = "/presentation";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:dato,

		success:function(){
			window.history.go(-2);
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

