@extends('adminlte::page')
@section('title', 'Cargar trabajo')

@section('content')
<br>
<div class="container">
    <x-adminlte-card title="Formulario de Registro de trabajo" theme="dark">

        <form action="{{route('trabajos.store')}}" method="POST">
            <label for="nombre">Nombre del Cliente:</label>
            <x-adminlte-input type="text" id="nombre" name="nombre" value="{{ $customer->name}}" readonly/>

            <label for="cuit">CUIT:</label>
            <x-adminlte-input type="text" id="cuit" name="cuit" value="{{ $customer->cuit_cuil}}" readonly/>

            <label for="titulo">Título:</label>
            <x-adminlte-input type="text" id="titulo" name="titulo" required/>

            <label for="detalle">Detalle:</label>
            <x-adminlte-input type="detalle" id="detalle" name="detalle" required/>

            <label for="materiales">Materiales:</label>
            <x-adminlte-input type="materiales" id="materiales" name="materiales" required/>

            <label for="costo_materiales">Costo de Materiales (en $):</label>
            <x-adminlte-input type="number" id="costo_materiales" name="costo_materiales" min="0" step="0.01" required/>

            <label for="horas_trabajadas">Horas Trabajadas:</label>
            <x-adminlte-input type="number" id="horas_trabajadas" name="horas_trabajadas" min="0" step="0.01" required/>

            <label for="costo_trabajo">Costo de Trabajo (en $):</label>
            <x-adminlte-input type="number" id="costo_trabajo" name="costo_trabajo" min="0" step="0.01" required/>

            <label for="fecha_inicio">Fecha de Inicio:</label>
            <x-adminlte-input type="date" id="fecha_inicio" name="fecha_inicio" required/>

            <label for="fecha_fin">Fecha de Fin:</label>
            <x-adminlte-input type="date" id="fecha_fin" name="fecha_fin" required/>

            <button type="submit" class="btn-primary">Enviar</button>
        </form>
    </x-adminlte-card>

</div>

@endsection
