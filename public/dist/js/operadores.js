   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#users').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/usuarios",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreUsuario', name: 'nombreUsuario'},
                            {data: 'apellidoUsuario', name: 'apellidoUsuario'},
                            {data: 'telefonoUsuario', name: 'telefonoUsuario'},
                            {data: 'email', name: 'email'},

                            {data: 'idRol', name: 'idRol'},
                            {data: 'activo', name: 'activo'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
            }
            //eliminar
                  function Eliminar(btn){
                      if(window.confirm("Desea dar de BAJA este registro?")){
                        var route = "admin/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#users').DataTable().ajax.reload();
                            $("#msj-baja-success").fadeIn();
                          }
                        });
                       }
                      }     

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato1 = $("#nombreUsuario").val();
                      var dato2 = $("#apellidoUsuario").val();
                      var dato3 = $("#telefonoUsuario").val();
                      var dato4 = $("#email").val();
                      var dato5 = $("#password").val();
                      var dato6 = $("#idRol").val();

                      var route = "/admin/"+value+"";
                      var token = $("#token").val();

                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data:{nombreUsuario: dato1,apellidoUsuario: dato2,telefonoUsuario: dato3,email: dato4,password: dato5,idRol: dato6},
                        success: function(){
                         //location.reload();
                          $('#users').DataTable().ajax.reload();
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
                        var route = "/admin/"+id+"/edit";

                        $.get(route, function(res){
                            $("#nombreUsuario").val(res.nombreUsuario);
                            $("#apellidoUsuario").val(res.apellidoUsuario);
                            $("#email").val(res.email);
                            $("#password").val(res.password);
                            $("#telefonoUsuario").val(res.telefonoUsuario);
                            $("#id").val(res.idUsuario);
                        });
                    }
