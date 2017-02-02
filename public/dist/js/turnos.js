   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#turnos').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/turnos",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'fechaInicio', name: 'fechaInicio'},
                            {data: 'fechaFin', name: 'fechaFin'},
                            {data: 'horaInicio', name: 'horaInicio'},
                            {data: 'horaFin', name: 'horaFin'},
                            {data: 'activo', name: 'activo'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }

        //eliminar
                 function Eliminar(btn){
                      if(window.confirm("Está seguro de eliminar este registro?")){
                        var route = "shift/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#turnos').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#fechaInicio").val();
                      var dato1 = $("#fechaFin").val();
                      var dato2= $("#horaInicio").val();
                      var dato3 = $("#horaFin").val();

                      var route = "/shift/"+value+"";
                      var token = $("#token").val();
                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {fechaInicio: dato, fechaFin: dato1, horaInicio:dato2, horaFin: dato3},
                        success: function(){
                          $('#turnos').DataTable().ajax.reload();
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
                        var route = "/shift/"+id+"/edit";
                        $.get(route, function(res){
                            $("#fechaInicio").val(res.fechaInicio);
                            $("#fechaFin").val(res.fechaFin);
                            $("#horaInicio").val(res.horaInicio);
                            $("#horaFin").val(res.horaFin);
                            $("#id").val(res.idTurno);
                        });
                    }