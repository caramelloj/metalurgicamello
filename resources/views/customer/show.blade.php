@extends('adminlte::page')
@section('title', 'Ver clientes')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-8">
            <form method="POST" action="{{ route('search.customer') }}">
                <input type="text" class="form-control" placeholder="Escriba el nombre del cliente para buscar..." name="customerName" id="inputDefault">
            </div>
            @csrf
            <div class="col-4">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </div>
            </form>
    </div>

<hr>

@php
$heads = [
    'Nombre',
    'Cuit/Cuil',
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
@endsection
