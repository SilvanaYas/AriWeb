$(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#socio').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/operadoresTrash",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreUsuario', name: 'nombreUsuario'},
                            {data: 'apellidoUsuario', name: 'apellidoUsuario'},
                            {data: 'telefonoUsuario', name: 'telefonoUsuario'},
                            {data: 'email', name: 'email'},
                            {data: 'deleted_at', name: 'deleted_at'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
            }
              

                    function Eliminar(btn){
                      if(window.confirm("Desea dar de alta este Usuario?")){
                        var route = "operadoresTrash/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#socio').DataTable().ajax.reload();
                            $("#msj-habilitar-success").fadeIn();
                          }
                        });
                       }
                      }