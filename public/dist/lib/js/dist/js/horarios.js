   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#horarios').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/horarios",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'descripcion', name: 'descripcion'},
                            {data: 'horaInicioHorario', name: 'horaInicioHorario'},
                            {data: 'horaFinHorario', name: 'horaFinHorario'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }

        //eliminar
                 function Eliminar(btn){
                      if(window.confirm("Seguro de eliminar este registro?")){
                        var route = "schedule/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#horarios').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }  

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#descripcion").val();
                      var dato1 = $("#descripcion2").val();
                      var dato2= $("#horaInicioHorario").val();
                      var dato3 = $("#horaFinHorario").val();
                      var dato4 = dato+' a '+dato1;

                      var route = "/schedule/"+value+"";
                      var token = $("#token").val();
                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {descripcion: dato4,horaInicioHorario:dato2, horaFinHorario: dato3},
                        success: function(){
                          $('#horarios').DataTable().ajax.reload();
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
                        var route = "/schedule/"+id+"/edit";
                        $.get(route, function(res){
                            $("#horaInicioHorario").val(res.horaInicioHorario);
                            $("#horaFinHorario").val(res.horaFinHorario);
                            $("#id").val(res.idHorario);
                        });
                    }