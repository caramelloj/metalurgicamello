@extends('adminlte::page')
@section('title', 'Editar trabajo')

@section('content')
<br>
<div class="container">
    <x-adminlte-card title="Formulario de edición de trabajo" theme="dark">

        <form action="{{route('trabajos.update', $work->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="titulo">Título:</label>
            <x-adminlte-input type="text" id="titulo" name="titulo" value="{{ $work->titulo}}" required/>

            <label for="detalle">Detalle:</label>
            <x-adminlte-input type="detalle" id="detalle" name="detalle" value="{{ $work->detalle}}" required/>

            <label for="materiales">Materiales:</label>
            <x-adminlte-input type="materiales" id="materiales" name="materiales" value="{{ $work->materiales}}"required/>

            <label for="costo_materiales">Costo de Materiales (en $):</label>
            <x-adminlte-input type="number" id="costo_materiales" name="costo_materiales" min="0" step="0.01" value="{{ $work->costo_materiales}}" required/>

            <label for="horas_trabajadas">Horas Trabajadas:</label>
            <x-adminlte-input type="number" id="horas_trabajadas" name="horas_trabajadas" min="0" step="0.01" value="{{ $work->horas_trabajadas}}"required/>

            <label for="costo_trabajo">Costo de Trabajo (en $):</label>
            <x-adminlte-input type="number" id="costo_trabajo" name="costo_trabajo" min="0" step="0.01" value="{{ $work->costo_trabajo}}" required/>

            <label for="fecha_inicio">Fecha de Inicio:</label>
            <x-adminlte-input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ $fecha_inicio}}" required/>

            <label for="fecha_fin">Fecha de Fin:</label>
            <x-adminlte-input type="date" id="fecha_fin" name="fecha_fin" value="{{ $fecha_fin}}" required/>

            <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-lg fa-save"></i>Enviar</button>
        </form>
    </x-adminlte-card>

</div>

@endsection
