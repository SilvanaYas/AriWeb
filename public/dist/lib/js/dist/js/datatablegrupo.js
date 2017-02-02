 $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           var table = $('#datas').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/users",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'id', name: 'id'},
                            {data: 'gro_nom', name: 'gro_nom'},
                            {data: 'action'}
                        ]
                }); 
                      //table.ajax.reload ();
        }
        //eliminar
                function Eliminar(id){
                  if(window.confirm("deseas eliminar")){

                        var route = "/group/"+id+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            //Carga();
                            $("#msj-success2").fadeIn();
                          }
                        });
                      }
                    }     

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#gro_nom").val();
                      var route = "/group/"+value+"";
                      var token = $("#token").val();
                      console.log('llego');

                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {gro_nom: dato},
                        success: function(){
                          Carga();
                          $("#myModal").modal('toggle');
                          $("#msj-success").fadeIn();
                        }
                        
                      });
                    });       

                function Mostrar(id){
                        var route = "/group/"+id+"/edit";
                        console.log(id);

                        $.get(route, function(res){
                            $("#gro_nom").val(res.gro_nom);
                            $("#id").val(res.id);
                        });
                    }

                
