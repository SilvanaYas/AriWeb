   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#farmacias').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "/api/farmacias/{{$id}}",
                    "language": {
                    "url": "/dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreSucursal', name: 'nombreSucursal'},
                            {data: 'direccion', name: 'direccion'},
                            {data: 'telefono', name: 'telefono'},
                            {data: 'nombreGrupo', name: 'nombreGrupo'},
                            {data: 'active', name: 'active'},
                        ]
                }); 
                      //table.ajax.reload ();
        }
