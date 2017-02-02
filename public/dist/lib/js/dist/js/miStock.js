   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#miStock').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/miStock",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreProducto', name: 'nombreProducto'},
                            {data: 'similarProducto', name: 'similarProducto'},
                            {data: 'nombreTipoProducto', name: 'nombreTipoProducto'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }
        //eliminar
                 function Eliminar(btn){
                        var route = "products/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#miStock').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          },
                          error: function(){
                            alert('Hubo un error al Quitar el registro seleccionado');
                          }
                        });
                    }    
                