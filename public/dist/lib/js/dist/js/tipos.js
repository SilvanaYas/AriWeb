   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#types').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/tipoProductos",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreTipoProducto', name: 'nombreTipoProducto'},
                            {data: 'idGrupo', name: 'idGrupo'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }
        //eliminar
                 function Eliminar(btn){
                      if(window.confirm("Está seguro de eliminar este registro?")){
                        var route = "type/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#types').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }    

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato1 = $("#idGrupo").val();
                      var dato = $("#nombreTipoProducto").val();
                      var route = "/type/"+value+"";
                      var token = $("#token").val();

                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data:{nombreTipoProducto: dato, idGrupo:dato1},
                        success: function(){
                          $('#types').DataTable().ajax.reload();
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
                        var route = "/type/"+id+"/edit";

                        $.get(route, function(res){
                            $("#nombreTipoProducto").val(res.nombreTipoProducto);
                            $("#id").val(res.idTipoProducto);
                        });
                    }
       
