$(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#sucursal').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/sucursales",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreSucursal', name: 'nombreSucursal'},
                            {data: 'direccion', name: 'direccion'},
                            {data: 'telefono', name: 'telefono'},
                            {data: 'activo', name: 'activo'},
                            {data: 'propietario', name: 'propietario'},
                            {data: 'email', name: 'email'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
            }

                  function Eliminar(btn){
                      if(window.confirm("Está seguro de eliminar este registro?")){
                        var route = "adminbranch/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#sucursal').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                    }