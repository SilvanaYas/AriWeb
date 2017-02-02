   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#user').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/bajaUsuarios",
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
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
            }
            //eliminar
                  function Eliminar(btn){
                      if(window.confirm("Está seguro de Habilitar este registro?")){
                        var route = "userTrash/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#user').DataTable().ajax.reload();
                            $("#msj-habilitar-success").fadeIn();
                          },
                          error: function(){
                            alert('Hubo un error al Hablitar el registro');
                          }
                        });
                       }
                      }     

        
