@extends('adminlte::page')
@section('title', 'Crear cliente')
@section('content')
<br>
    <x-adminlte-card title="Formulario de Registro" theme="dark" icon="fas fa-lg fa-user">
        <form action="{{route('clientes.store')}}" method="POST">
            @csrf
            <label for="nombre">Nombre:</label><br>
            <x-adminlte-input type="text" id="customerName" name="customerName" required/><br><br>

            <label for="cuit">CUIT/CUIL:</label><br>
            <x-adminlte-input type="text" id="customerCuit" name="customerCuit" pattern="\d{2}-\d{8}-\d" placeholder="20-12345678-9" required/><br><br>

            <label for="telefono">Teléfono:</label><br>
            <x-adminlte-input type="tel" id="customerPhone" name="customerPhone" pattern="[\+]?[0-9]{1,4}?[ -]?[0-9]{3}[ -]?[0-9]{4}" placeholder="Ej: +54 9 11 1234-5678" required/><br><br>

            <label for="direccion">Dirección:</label><br>
            <x-adminlte-input type="text" id="customerAddress" name="customerAddress" required/><br><br>

            <label for="saldo">Saldo:</label><br>
            <x-adminlte-input type="number" id="saldo" name="saldo" step="0.01" min="0" required/><br><br>

            <x-adminlte-button class="btn-flat" type="submit" label="Enviar" theme="success" icon="fas fa-lg fa-save"/>
        </form>
    </x-adminlte-card>
@endsection
