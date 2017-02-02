$(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#socios').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/operadores",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreUsuario', name: 'nombreUsuario'},
                            {data: 'apellidoUsuario', name: 'apellidoUsuario'},
                            {data: 'telefonoUsuario', name: 'telefonoUsuario'},
                            {data: 'email', name: 'email'},
                            {data: 'activo', name: 'activo'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
            }
              

                    function Eliminar(btn){
                      if(window.confirm("Desea dar de BAJA este registro?")){
                        var route = "admincompany/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#socios').DataTable().ajax.reload();
                            $("#msj-baja-success").fadeIn();
                          }
                        });
                       }
                      }

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#nombreUsuario").val();
                      var dato1 = $("#apellidoUsuario").val();
                      var dato2 = $("#telefonoUsuario").val();
                      var dato3 = $("#email").val();
                      var dato4 = $("#password").val();
                      var route = "/admincompany/"+value+"";
                      var token = $("#token").val();
                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {nombreUsuario: dato, 
                               apellidoUsuario: dato1,
                               telefonoUsuario: dato2,
                               email: dato3,
                               password: dato4,
                              },
                        success: function(){
                          $('#socios').DataTable().ajax.reload();
                          $("#myModal").modal('toggle');
                          $("#msj-edit-success").fadeIn();
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
                        var route = "/admincompany/"+id+"/edit";
                        $.get(route, function(res){
                            $("#nombreUsuario").val(res.nombreUsuario);
                            $("#apellidoUsuario").val(res.apellidoUsuario);
                            $("#telefonoUsuario").val(res.telefonoUsuario);
                            $("#email").val(res.email);
                            $("#id").val(res.idUsuario);
                        });
                    }