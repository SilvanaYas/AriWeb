
<div id="modalExcel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header alert alert-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">IMPORTAR ARCHIVO CSV</h4>
      </div>
      <div class="modal-body">
        
        <form action="postImport" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="file" name="customer" accept=".csv">
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
      </form>
      </div>
    </div>

  </div>
</div>


                                        


  
      
                                        
                                        