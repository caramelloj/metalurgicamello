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
        background: rgba(146, 24, 29,1);
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

@php
    $path = 'img/logo.jpeg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $b64 = 'data:img/' . $type . ';base64,' . base64_encode($data);
@endphp
<div style="text-align: center">
    <img src= "<?php echo $b64?>" width="200" height="200">
</div>

<hr>
<div id="aboutus" style="text-align: center">
    <p><b>Dirección: </b>Córdoba, Tránsito, República Argentina 421</p>
    <p><b>Telefonos: </b>3576411567 / 3576411524</p>
    <p><b>Instagram: </b>tallercaramello</p>
</div>
<hr>
  <h2>Detalle de trabajo realizado</h2>

  <table class="tables" cellspacing="0" cellpadding="0" style="text-align: center" width="100%">
      <thead class="thead-intervencion">
          <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Titulo</th>
            <th>Detalle</th>
            <th>Hs</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
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

