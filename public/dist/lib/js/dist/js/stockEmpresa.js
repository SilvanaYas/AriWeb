   $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#stock').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "api/stockEmpresa",
                    "language": {
                    "url": "dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'nombreProducto', name: 'nombreProducto'},
                            {data: 'similarProducto', name: 'similarProducto'},
                            {data: 'nombreTipoProducto', name: 'nombreTipoProducto'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                }); 
                      //table.ajax.reload ();
        }
            
  $('#btn_delete').click(function(){
    if(confirm("Seguro de agregar todos estos productos"))
    {
      var id = [];
      $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
        console.log("id seleccionado = "+id[i]+"en la posicion"+i);
      });
      if(id.length ===0)
      {
        alert("Ningún elemento seleccionado");
      }else
      {
        var token = $("#token").val();
        console.log(id);
        $.ajax({
          url: '/stock',
          headers: {'X-CSRF-TOKEN': token},
          method: 'POST',
          data:{id:id},

         success:function()
          {
            for(var i=0; i<id.length; i++)
            {
              $('tr#'+id[i]+'').css('background-color', '#ccc');
              $('tr#'+id[i]+'').fadeOut('slow');
            }
            $('#stock').DataTable().ajax.reload();
            
          },
          error:function(msj){
             $("#msj").html(msj.responseJSON);
             $("#msj-error").fadeIn();
          }

        });
      }

    }else
      {
        return false;
      }
    
  });
