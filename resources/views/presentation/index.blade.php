@extends('layouts.templateFarmacia')
@section('title', 'Presentaciones')
@section('content')
@include('presentation.forms.modal')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')


                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Lista de presentaciones</div>
                                    </div>
                                    <div class="pull-right"> <a class="btn btn-success" href="{!!URL::to('presentation/create')!!}"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="presentations">
                                        <thead>
                                            <tr>
                                            <th>Presentación</th>
                                            <th>Fabricante</th>
                                            <th>Unidades Presentación</th>
                                            <th>Precio Presentación</th>
                                            <th>Precio por Unidad</th>
                                            <th>Observaciones</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection
  
@section('scripts')
<script>
       $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#presentations').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "/api/presentation/{{$id}}",
                    "language": {
                    "url": "/dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombrePresentacion', name: 'nombrePresentacion'},
                            {data: 'fabricante', name: 'fabricante'},
                            {data: 'unidadesPresentacion', name: 'unidadesPresentacion'},
                            {data: 'precioPresentacion', name: 'precioPresentacion'},
                            {data: 'precioUnidad', name: 'precioUnidad'},
                            {data: 'observacion', name: 'observacion'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }

        //eliminar
                  function Eliminar(btn){
                      if(window.confirm("Está seguro de eliminar este registro?")){
                        var route = "/presentation/"+btn.value+"";
                        var token = $("#token").val();

                        $.ajax({
                          url: route,
                          headers: {'X-CSRF-TOKEN': token},
                          type: 'DELETE',
                          dataType: 'json',
                          success: function(){
                            $('#presentations').DataTable().ajax.reload();
                            $("#msj-delete-success").fadeIn();
                          }
                        });
                       }
                      }  

                    //editar
                $("#actualizar").click(function(){
                      var value = $("#id").val();
                      var dato = $("#nombrePresentacion").val();
                      var dato1 = $("#fabricante").val();
                      var dato2 = $("#unidadesPresentacion").val();
                      var dato3 = $("#precioPresentacion").val();
                      var dato4 = $("#precioUnidad").val();
                      var dato5 = $("#observacion").val();
                      var route = "/presentation/"+value+"";
                      var token = $("#token").val();
                      $.ajax({
                        url: route,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'PUT',
                        dataType: 'json',
                        data: {nombrePresentacion: dato, 
                              fabricante: dato1, 
                              unidadesPresentacion: dato2, 
                              precioPresentacion:dato3, 
                              precioUnidad: dato4,
                              observacion: dato5},
                        success: function(){
                          $('#presentations').DataTable().ajax.reload();
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
                        var route = "/presentation/"+id+"/edit";
                        $.get(route, function(res){
                            $("#nombrePresentacion").val(res.nombrePresentacion);
                            $("#fabricante").val(res.fabricante);
                            $("#unidadesPresentacion").val(res.unidadesPresentacion);
                            $("#precioPresentacion").val(res.precioPresentacion);
                            $("#precioUnidad").val(res.precioUnidad);
                            $("#observacion").val(res.observacion);
                            $("#id").val(res.idPresentacion);
                        });
                    }
</script>
@endsection