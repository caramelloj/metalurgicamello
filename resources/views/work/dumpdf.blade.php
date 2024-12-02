<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <style type="text/css">
    *{
      font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
      font-size: 12px;
    }
    .tables{
        justify-content: center;
    }
    #obs{
        text-align: right;
    }
    th{
      border: 1px solid black;
      text-align: center;
    }

    tr,td {
      border: 1px solid black;
      text-align: center;
    }
    h2{
      font-size: 14px;
      text-align: center;
    }
    .thead-intervencion{
        background: rgba(255, 0, 0, 0.918);
        color: white;
    }
    body {
        min-height : 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

  </style>

  <title>Impresion de Registro</title>
</head>
<body>
  {{--
  <img src="{{ asset('img/ypf.png')}}" width="130" height="50">
  <img src="{{ asset('img/mannfilter.png')}}" width="130" height="50">
  <img src="{{ asset('img/firestone.png')}}" width="130" height="50">
  <img src="{{ asset('img/bridgestone.png')}}" width="130" height="50">
 --}}

{{--
  <div id="customer">
    <p><b>Propietario: </b>{{ $vehicleData[0]->NPropietario  }}</p>
    <p><b>Cuit-Cuil </b>{{ $vehicleData[0]->CuitCuil }}</p>
    <p><b>Modelo: </b>{{ $vehicleData[0]->Modelo }}</p>
    <p><b>Aceite: </b>{{ $vehicleData[0]->Aceite }}</p>
    <p><b>Patente: </b>{{ $vehicleData[0]->Dominio }}</p>
    <p><b>Cubiertas: </b>{{ $vehicleData[0]->NCubiertas }}</p>

  </div> --}}

  <h2>Detalle de trabajo realizado</h2>

  <table class="tables" cellspacing="0" cellpadding="0" style="text-align: center" width="100%">
      <thead class="thead-intervencion">
          <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Titulo</th>
            <th>Detalle</th>
            <th>C.material</th>
            <th>C.trabajo</th>
            <th>Hs</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Materiales</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($works as $work)
            <tr>
                <td>{!!$work->id!!}</td>
                <td>{!!$work->nombre_cliente!!}</td>
                <td>{!!$work->titulo !!}</td>
                <td>{!!$work->detalle!!}</td>
                <td>{!!$work->costo_materiales !!}</td>
                <td>{!!$work->costo_trabajo!!}</td>
                <td>{!!$work->horas_trabajadas!!}</td>
                <td>{!!$work->fecha_inicio->format('d/m/Y')!!}</td>
                <td>{!! $work->fecha_fin->format('d/m/Y')!!}</td>
                <td>{!! $work->materiales !!}</td>
            </tr>
          @endforeach
      </tbody>
      </table>

    <br>
    <h2> Fotos del trabajo</h2>


      @foreach (json_decode($work->imagenes) as $imagen)

      @php

      $path = 'storage/'.$imagen;
      $type = pathinfo($path, PATHINFO_EXTENSION);
      $data = file_get_contents($path);
      $base64 = 'data:img/' . $type . ';base64,' . base64_encode($data);

      @endphp
      <div style="text-align: center">
        <img src= "<?php echo $base64?>" width="450" height="400">
      </div>
      <br>
      @endforeach

</body>
</html>

