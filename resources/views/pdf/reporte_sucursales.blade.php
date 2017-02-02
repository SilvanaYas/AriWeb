<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Sucursales</title>
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
              Sucursales Registradas
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

    <strong class="blue">Empresa:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{{$data->nombreEmpresa}}</span><br>

    <strong class="blue">Reporte:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">Sucursales Registradas</span><br>

    <strong class="blue">Solicitado por:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{!!Auth::user()->nombreUsuario!!}&nbsp;{!!Auth::user()->apellidoUsuario!!}</span><br>

    <strong class="blue">Fecha Reporte:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{{ $date }}</span><br><br><br>
  @endforeach
        
        <table class="datatable table table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>Representante</th>
                                            <th>Sucursal</th>
                                            <th>Direccion</th>
                                            <th>Teléfono</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sucursales as $sucursal)

                                            <tr>
                                                <td>{{$sucursal->propietario}}</td>
                                                <td>{{$sucursal->nombreSucursal}}</td>
                                                <td>{{$sucursal->direccion}}</td>
                                                <td>{{$sucursal->telefono}}</td>
                                                <td>{{$sucursal->activo==1? "Activo":"Inactivo"}}</td>
                                            </tr>                                              
                                              @endforeach
                                            </tbody>
                                    </table><br><br>
          <strong class="blue">Número total de Sucursales:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="number">{{ count($sucursales) }}</span><br>
                      
      </main>
      
  </body>
</html>