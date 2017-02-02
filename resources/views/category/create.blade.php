 @extends('layouts.templateAdmin')
 @section('title', 'Registro de categorias')
    @section('content')


           <div class="container">  
                <br />  
                <br />  
                <h2 align="center">Dynamically Add or Remove input fields in PHP with JQuery</h2>  
                <div class="form-group">  
                     <form name="add_name" id="add_name"> 
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
 
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td>
                                         	<input title="nombre Producto" type="text" name="name[]" placeholder="nombre del producto" class="form-control name_list" required/>
                                         	<input title="nombre similar " type="text" name="name[]" placeholder="nombre del producto" class="form-control name_list" required/>
                                         	<input title="Tipo" type="text" name="name[]" placeholder="nombre del producto" class="form-control name_list" required/>
                                         </td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                     </form>  
                </div>  
           </div>  
     
     @endsection

@section('scripts')


 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="nombre del tipo de crédito" class="form-control name_list" required /><input type="text" name="name[]" placeholder="nombre del tipo de crédito" class="form-control name_list" required /><input type="text" name="name[]" placeholder="nombre del tipo de crédito" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
			var token = $("#token").val();

			$.ajax({
				url:'/category', 
                headers: {'X-CSRF-TOKEN': token}, 
                method:"POST",  
                data:$('#add_name').serialize(),

				success:function(){
					alert('BINGO');
					$("#msj-success").fadeIn();
				},
				error:function(msj){
					$("#msj").html(msj.responseJSON.nombreCategoria);
					$("#msj-error").fadeIn();
					alert('petro');
				}
			});  
      });  
 });  
 </script> 

@endsection
