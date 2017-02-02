   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#credits').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/creditos",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreCategoria', name: 'nombreCategoria'},
                            {data: 'montoMinimo', name: 'montoMinimo'},
                            {data: 'montoMaximo', name: 'montoMaximo'},
                            {data: 'plazoMinimo', name: 'plazoMinimo'},
                            {data: 'plazoMaximo', name: 'plazoMaximo'},
                            {data: 'tasaInteres', name: 'tasaInteres'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }

        //eliminar
                 function Eliminar(btn){
                      if(window.confirm("Está seguro de eliminar este registro?")){
                        var route = "credit/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#credits').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }  

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#montoMinimo").val();
                      var dato1 = $("#montoMaximo").val();
                      var dato2 = $("#plazoMinimo").val();
                      var dato3 = $("#plazoMaximo").val();
                      var dato4 = $("#tasaInteres").val();
                      var dato5 = $("#idCategories").val();
                      alert(dato5);
                      var route = "/credit/"+value+"";
                      var token = $("#token").val();

                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {montoMinimo:dato,
                               montoMaximo:dato1, 
                               plazoMinimo:dato2,
                               plazoMaximo:dato3,
                               tasaInteres:dato4,
                               idCategoria:dato5
                             },
                        success: function(){
                          $('#credits').DataTable().ajax.reload();
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
                        var route = "credit/"+id+"/edit";
                        $.get(route, function(res){
                            $("#montoMinimo").val(res.montoMinimo);
                            $("#montoMaximo").val(res.montoMaximo);
                            $("#plazoMinimo").val(res.plazoMinimo);
                            $("#plazoMaximo").val(res.plazoMaximo);
                            $("#tasaInteres").val(res.tasaInteres);
                            $("#id").val(res.idCredito);
                        });
                    }