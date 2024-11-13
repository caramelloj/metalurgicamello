@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="card-header">
        <h2>Formulario de Registro</h2>
    </div>
    <div class="card-body">
        <form action="{{route('clientes.store')}}" method="POST">
            @csrf
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="customerName" name="customerName" required><br><br>

            <label for="cuit">CUIT/CUIL:</label><br>
            <input type="text" id="customerCuit" name="customerCuit" pattern="\d{2}-\d{8}-\d" placeholder="20-12345678-9" required><br><br>

            <label for="telefono">Teléfono:</label><br>
            <input type="tel" id="customerPhone" name="customerPhone" pattern="[\+]?[0-9]{1,4}?[ -]?[0-9]{3}[ -]?[0-9]{4}" placeholder="Ej: +54 9 11 1234-5678" required><br><br>

            <label for="direccion">Dirección:</label><br>
            <input type="text" id="customerAddress" name="customerAddress" required><br><br>

            <label for="saldo">Saldo:</label><br>
            <input type="number" id="saldo" name="saldo" step="0.01" min="0" required><br><br>

            <input type="submit" value="Enviar">
        </form>
    </div>

</div>

@endsection
