@extends('adminlte::page')
@section('title', 'Ver materiales')

@section('content')
<br>
<x-adminlte-card title="Formulario de registro de material" theme="primary" icon="fas fa-lg fa-pen">
<form  method="POST" action="{{route('materiales.update', $material->id)}}">

    @csrf
    @method('PUT')

    <!-- Descripción -->
    <label for="descripcion">Descripción</label>
    <x-adminlte-input type="text" id="descripcion" name="descripcion" value="{{ $material->descripcion }}" required/>
    <!-- Unidad -->
    <label for="unidad">Unidad</label>
    <x-adminlte-select id="unidad" name="unidad" required>
        <option value="" disabled selected>{{$material->unidad}}</option>
        <option value="unidad">Unidad</option>
        <option value="kg">Kilogramo</option>
        <option value="litro">Litro</option>
        <option value="metro">Metro</option>
    </x-adminlte-select>

    <!-- Cantidad -->
    <label for="cantidad">Cantidad</label>
    <x-adminlte-input type="number" id="cantidad" name="cantidad" placeholder="Cantidad en stock" value="{{ $material->cantidad }}" min="0" required/>

    <!-- Precio -->
    <label for="precio">Precio</label>
    <x-adminlte-input type="number" id="precio" name="precio" placeholder="Precio del producto" value="{{ $material->precio }}" min="0" step="0.01" required/>

    <!-- Botón de envío -->
    <x-adminlte-button class="btn-flat" type="submit" label="Enviar" theme="success" icon="fas fa-lg fa-save"/>

</form>
</x-adminlte-card>
@endsection
