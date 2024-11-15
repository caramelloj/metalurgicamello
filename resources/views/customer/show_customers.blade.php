@extends('adminlte::page')
@section('title', 'Ver clientes')

@section('content')

<div class="container py-4 text-center">
    <div class="container">
        <div class="row">
            <form method="POST" action="{{ route('search.customer') }}">
                @csrf
                <div class="col-form-group">
                    <input type="text" class="form-control" placeholder="Escriba el nombre del cliente para buscar..." name="customerName" id="inputDefault">
                  </div>
                <div class="col-form-group">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </form>
        </div>
    </div>

<hr>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Cuit/cuil</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Eliminar cliente</th>
            <th scope="col">Editar cliente</th>

          </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->cuit_cuil }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
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
            @empty
            <h1>No hay registros para mostrar</h1>
            @endforelse
        </tbody>
      </table>

</div>
@endsection
