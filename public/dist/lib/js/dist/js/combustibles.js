   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#prod').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/productGaso",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreProducto', name: 'nombreProducto'},
                            {data: 'nombreTipoProducto', name: 'nombreTipoProducto'},
                            {data: 'nombrePresentacion', name: 'nombrePresentacion'},
                            {data: 'precioPresentacion', name: 'precioPresentacion'},
                            {data: 'fabricante', name: 'fabricante'},
                            {data: 'promotion', name: 'promotion', orderable: false, searchable: false},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }

        //eliminar
                function Eliminar(btn){

                  var id = btn.value.split(",");
                  if(window.confirm("deseas eliminar")){

                        var route = "product/"+id[0]+"";
                        var route1 = "presentation/"+id[1]+"";

                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#prod').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });

                        $.ajax({
                          url: route1,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#prod').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });

                      }
                    }

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var value1 = $("#idPresentacion").val();
                      var dato = $("#nombreProducto").val();
                      var dato1 = $("#idTipoProducto").val();
                      var dato2 = $("#nombrePresentacion").val();
                      var dato3 = $("#precioPresentacion").val();
                      var dato4 = $("#fabricante").val();

                      var route = "/product/"+value+"";
                      var route1 = "/presentation/"+value1+"";
                      var token = $("#token").val();

                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {nombreProducto: dato, idTipoProducto: dato1},
                        success: function(){
                          //$('#prod').DataTable().ajax.reload();
                          //$("#myModal").modal('toggle');
                          //$("#msj-edit-success").fadeIn();
                        },
                        error:function(msj){
                              $.each(msj.responseJSON, function(i, field){
                               $("#msj").append("<ul><li>"+field+"</li></ul>");
                               $("#msj-error").fadeIn();
                            });
                          }
                        
                      });

                      $.ajax({
                        url: route1,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {nombrePresentacion: dato2, precioPresentacion: dato3, fabricante:dato4, unidadesPresentacion:0, precioUnidad:0.00},
                        success: function(){
                          $('#prod').DataTable().ajax.reload();
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

                function Mostrar(id, id1){
                        var route = "/product/"+id+"/edit";
                        var route1 = "/presentation/"+id1+"/edit";

                        $.get(route, function(res){
                            //console.log(res);
                            $("#nombreProducto").val(res.nombreProducto);
                            $("#id").val(res.idProducto);
                        });
                        $.get(route1, function(res){
                            //console.log(res);
                            $("#nombrePresentacion").val(res.nombrePresentacion);
                            $("#precioPresentacion").val(res.precioPresentacion);
                            $("#fabricante").val(res.fabricante);
                            $("#idPresentacion").val(res.idPresentacion);
                        });
                    }