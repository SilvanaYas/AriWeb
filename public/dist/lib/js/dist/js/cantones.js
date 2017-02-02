$("#idProvincia").change(function(event){

	$ .get("/cantons/"+event.target.value+"",function(response,idProvincia){

		$("#idCanton").empty();
		for(i=0; i<response.length; i++){
			$("#idCanton").append("<option value='"+response[i].idCanton+"'>"+response[i].nombreCanton+"</option>");
		}
	});
});

