   $(document).ready(function(){
                 Carga();
                 function mostrarAlerta(){
                    $("#msj-success").fadeIn();
                 }

                 function Carga(){

           $('#category').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/categorias",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreCategoria', name: 'nombreCategoria'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                });
            }
        });

        
            //eliminar
                function Eliminar(btn){
                      if(window.confirm("Está seguro de eliminar este registro?")){
                        var route = "category/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#category').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }    

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#nombreCategoria").val();
                      var route = "/category/"+value+"";
                      var token = $("#token").val();

                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {nombreCategoria: dato},
                        success: function(){
                          $('#category').DataTable().ajax.reload();
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
                        var route = "/category/"+id+"/edit";

                        $.get(route, function(res){
                            $("#nombreCategoria").val(res.nombreCategoria);
                            $("#id").val(res.idCategoria);
                        });
                    }