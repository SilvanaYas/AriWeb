<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Turnos</title>
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
              Turnos Registrados
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


  @foreach ($perfil as $data)         

    <strong class="blue">Empresa:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{{$data->nombreSucursal}}</span><br>

    <strong class="blue">Dirección:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{{$data->direccion}}</span><br>

    <strong class="blue">Teléfonos:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{{$data->telefono}}</span><br>

    <strong class="blue">Reporte:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">Turnos Registrados</span><br>

    <strong class="blue">Propietario:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{!!Auth::user()->nombreUsuario!!}&nbsp;{!!Auth::user()->apellidoUsuario!!}</span><br>

    <strong class="blue">Fecha Reporte:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{{ $date }}</span><br><br><br>
  @endforeach
        
        <table class="datatable table table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($turnos as $turno)

                                            <tr>
                                                <td>{{$turno->fechaInicio}}</td>
                                                <td>{{$turno->fechaFin}}</td>
                                                <td>{{$turno->horaInicio}}</td>        
                                                <td>{{$turno->horaFin}}</td>
                                            </tr>                                              
                                              @endforeach
                                            </tbody>
                                    </table><br><br>
          <strong class="blue">Número total de turnos registrados:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="number">{{ count($turnos) }}</span><br>
                      
      </main>
      
  </body>
</html>