<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Farmacias</title>
    <link rel="stylesheet" type="text/css" href="dist/css/pdf.min.css">
  </head>
  <body>

  <header>
    <img src="img/scpmr.png" align="left">
    <h4>Superintendencia de Control del Poder de Mercado</h4>
    <strong><small>Quito  -  Ecuador</small></strong><br>
    <strong>&nbsp;&nbsp;&nbsp;<small>2 39 56 010 ext: 1111</small></strong><br>
    <a href="http://www.scpm.gob.ec/">www.scpm.gob.ec</a>
  </header><br><br><br>
  <footer>
    <table>
      <tr>
        <td>
            <p class="izq blue">
              Farmacias Registradas
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>

    <main>
    <strong class="blue">Reporte:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">Farmacias Registradas</span><br>

    <strong class="blue">Solicitado por:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{!!Auth::user()->nombreUsuario!!}&nbsp;{!!Auth::user()->apellidoUsuario!!}</span><br>

    <strong class="blue">Fecha Reporte:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{{ $date }}</span><br><br><br>
        
        <table class="datatable table table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>Empresa</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>
                                <tbody>
                                        @foreach($farmacias as $data)

                                            <tr>
                                                <td>{{$data->nombreSucursal}}</td>
                                                <td>{{$data->direccion}}</td>
                                                <td>{{$data->telefono}}</td>
                                                <td>{{$data->activo==1? "Activo":"Desactivo"}}</td>
                                            </tr>                                              
                                              @endforeach
                                            </tbody>
                                    </table><br><br>
          <strong class="blue">Número total de Farmacias:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="number">{{ count($farmacias) }}</span><br>
                      
      </main>
      
  </body>
</html>