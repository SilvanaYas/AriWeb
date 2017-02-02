<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Creditos</title>
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
              Creditos Registrados
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

    <strong class="blue">Reporte:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">Créditos Registrados</span><br>

    <strong class="blue">Solicitado por:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{!!Auth::user()->nombreUsuario!!}&nbsp;{!!Auth::user()->apellidoUsuario!!}</span><br>

    <strong class="blue">Fecha Reporte:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">{{ $date }}</span><br><br><br>
  @endforeach
        
        <table class="datatable table table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Crédito</th>                            
                                                <th>Monto mínino</th>
                                                <th>Monto máximo</th>
                                                <th>Plazo mínimo</th>
                                                <th>Plazo máximo</th>
                                                <th>Interés</th>
                                            </tr>
                                        </thead>
                                <tbody>
                                        @foreach($credits as $credit)

                                            <tr>
                                                <td>{{$credit->nombreCategoria}}</td>
                                                <td>{{$credit->montoMinimo}}</td>
                                                <td>{{$credit->montoMaximo}}</td>
                                                <td>{{$credit->plazoMinimo}}</td>
                                                <td>{{$credit->plazoMaximo}}</td>
                                                <td>{{$credit->tasaInteres}} %</td>
                                            </tr>                                              
                                              @endforeach
                                            </tbody>
                                    </table><br><br>
          <strong class="blue">Número total de tipos de créditos:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="number">{{ count($credits) }}</span><br>
                      
      </main>
      
  </body>
</html>