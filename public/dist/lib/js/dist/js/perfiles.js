   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#rols').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/perfiles",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreRol', name: 'nombreRol'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }
        //eliminar
                 function Eliminar(btn){
                      if(window.confirm("Está seguro de eliminar este registro?")){
                        var route = "perfil/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#rols').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }  

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#nombreRol").val();
                      var route = "/perfil/"+value+"";
                      var token = $("#token").val();

                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {nombreRol: dato},
                        success: function(){
                          $('#rols').DataTable().ajax.reload();
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
                        var route = "/perfil/"+id+"/edit";
                        $.get(route, function(res){
                            $("#nombreRol").val(res.nombreRol);
                            $("#id").val(res.idRol);
                        });
                    }