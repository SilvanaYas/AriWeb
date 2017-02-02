$(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#promotions').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "/api/promotion/{{$id}}",
                    "language": {
                    "url": "/dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombrePromocion', name: 'nombrePromocion'},
                            {data: 'descripcion', name: 'descripcion'},
                            {data: 'fechaInicioPromo', name: 'fechaInicioPromo'},
                            {data: 'fechaFinPromo', name: 'fechaFinPromo'},
                            {data: 'activo', name: 'activo'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
        }

                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#nombrePromocion").val();
                      var dato1 = $("#descripcion").val();
                      var dato2 = $("#fechaInicioPromo").val();
                      var dato3 = $("#fechaFinPromo").val();

                      var route = "/promotion/"+value+"";
                      var token = $("#token").val();
                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {nombrePromocion: dato, 
                               descripcion: dato1,
                               fechaInicioPromo: dato2,
                               fechaFinPromo: dato3
                              },
                        success: function(){
                          $('#promotions').DataTable().ajax.reload();
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
                        var route = "/promotion/"+id+"/edit";
                        $.get(route, function(res){
                            $("#nombrePromocion").val(res.nombrePromocion);
                            $("#descripcion").val(res.descripcion);
                            $("#fechaInicioPromo").val(res.fechaInicioPromo);
                            $("#fechaFinPromo").val(res.fechaFinPromo);
                            $("#id").val(res.idPromocion);
                        });
                    }

                      function Eliminar(btn){
                      if(window.confirm("Está seguro de eliminar este registro?")){
                        var route = "/promotion/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#promotions').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }