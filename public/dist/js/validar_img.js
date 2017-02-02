
function ValidarImagen(obj){
    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
        return;
    }

    if (!(/\.(jpg|png)$/i).test(uploadFile.name)) {
                $("#msj-img-tipo").fadeIn();
    }
    else {
        var img = new Image();
        img.onload = function () {
            if (this.width.toFixed(0) != 200 && this.height.toFixed(0) != 200) {
                $("#msj-img-size").fadeIn();
            }
            else if (uploadFile.size > 20000)
            {
                $("#msj-img-peso").fadeIn();
            }
        };
        img.src = URL.createObjectURL(uploadFile);
    }                 
}
