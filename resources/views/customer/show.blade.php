@extends('adminlte::page')
@section('title', 'Ver clientes')

@section('content')

<div class="container py-4 text-center">
    <div class="container">
        <div class="row">
            <form method="POST" action="{{ route('search.customer') }}">
                @csrf
                <div class="col">
                    <input type="text" class="form-control" placeholder="Escriba el nombre del cliente para buscar..." name="customerName" id="inputDefault">
                  </div>
        </div>
        <div class="row">
            <input type="submit" class="btn btn-primary" value="Buscar">
        </div>
    </div>
</form>

<hr>

@php
$heads = [
    'Name',
    'Cuit/CUil',
    'Teléfono',
    'Dirección',
    'Borrar',
    'Editar'
];


$config = [
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark">
    @foreach($customers as $customer)
        <tr>

                <td>{!! $customer->name !!}</td>
                <td>{!! $customer->cuit_cuil !!}</td>
                <td>{!! $customer->phone !!}</td>
                <td>{!! $customer->address !!}</td>
                <form action="{{ route('clientes.destroy',  $customer->id) }}" method="POST">
                    <td><a href=""><button class="btn btn-primary"><i class="fas fa-trash-alt fa-2x"></button></i></a></td>
                    @csrf
                    @method('DELETE')
                </form>
                <form action="{{ route('clientes.edit',  $customer->id) }}">
                    @csrf
                    @method('PUT')
                    <td><a href=""><button class="btn btn-primary"><i class="fas fa-user-edit fa-2x"></button></i></a></td>
                </form>


        </tr>
    @endforeach
</x-adminlte-datatable>
</div>
@endsection
