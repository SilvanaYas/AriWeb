            //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato1 = $("#nombreUsuario").val();
                      var dato2 = $("#apellidoUsuario").val();
                      var dato3 = $("#telefonoUsuario").val();
                      var dato4 = $("#email").val();
                      var dato5 = $("#password").val();

                      var route = "/profile/"+value+"";
                      var token = $("#token").val();

                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data:{nombreUsuario: dato1,
                              apellidoUsuario: dato2,
                              telefonoUsuario: dato3,
                              email: dato4,password: 
                              dato5},
                        success: function(){
                          //location.reload();
                          $("#myModal").modal('toggle');
                          $("#msj-edit-success").fadeIn();
                        setTimeout('document.location.reload()',3000);

                        },
                        error:function(msj){
                $.each(msj.responseJSON, function(i, field){
                 $("#msj").append("<ul><li>"+field+"</li></ul>");
                 $("#msj-error").fadeIn();
              });
            }
                        
                      });

                    });       

                function Mostrar(id){
                        var route = "/profile/"+id+"/edit";

                        $.get(route, function(res){
                            $("#nombreUsuario").val(res.nombreUsuario);
                            $("#apellidoUsuario").val(res.apellidoUsuario);
                            $("#email").val(res.email);
                            $("#password").val(res.password);
                            $("#telefonoUsuario").val(res.telefonoUsuario);
                            $("#id").val(res.idUsuario);
                        });
                    }
