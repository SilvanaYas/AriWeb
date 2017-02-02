$(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#datas').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/grupos",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreGrupo', name: 'nombreGrupo'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }
        //eliminar
                    function Eliminar(btn){
                      if(window.confirm("deseas eliminar")){
                        var route = "group/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#datas').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#nombreGrupo").val();
                      var route = "/group/"+value+"";
                      var token = $("#token").val();
                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {nombreGrupo: dato},
                        success: function(){
                          $('#datas').DataTable().ajax.reload();
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
                        var route = "/group/"+id+"/edit";
                        $.get(route, function(res){
                            $("#nombreGrupo").val(res.nombreGrupo);
                            $("#id").val(res.idGrupo);
                        });
                    }