   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#products').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/products",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreProducto', name: 'nombreProducto'},
                            {data: 'similarProducto', name: 'similarProducto'},
                            {data: 'nombreTipoProducto', name: 'nombreTipoProducto'},
                            {data: 'presentation', name: 'presentation', orderable: false, searchable: false},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }

        //eliminar
                  function Eliminar(btn){
                      if(window.confirm("Está seguro de eliminar este registro?")){
                        var route = "product/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#products').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }  

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#nombreProducto").val();
                      var dato2 = $("#similarProducto").val();
                      var route = "/product/"+value+"";
                      var token = $("#token").val();
                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {nombreProducto: dato, similarProducto: dato2},
                        success: function(){
                          $('#products').DataTable().ajax.reload();
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
                        var route = "/product/"+id+"/edit";
                        $.get(route, function(res){
                            $("#nombreProducto").val(res.nombreProducto);
                            $("#similarProducto").val(res.similarProducto);
                            $("#id").val(res.idProducto);
                        });
                    }