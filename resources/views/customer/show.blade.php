@extends('adminlte::page')
@section('title', 'Ver clientes')

@section('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<br>

<table id="customers" class="table table-bordered table-hover dataTable dtr-inline collapsed">
    <thead class="bg-primary text-white">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cuit/cuil</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Saldo</th>
            <th>Eliminar</th>
            <th>Editar</th>
            <th>Cargar trabajo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
                <td>{!! $customer->id !!}</td>
                <td>{!! $customer->nombre !!}</td>
                <td>{!! $customer->cuit_cuil !!}</td>
                <td>{!! $customer->telefono !!}</td>
                <td>{!! $customer->direccion !!}</td>
                <td>{!! $customer->saldo !!}</td>
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
                <form action="{{ route('trabajos.show',  $customer->id) }}">
                    @csrf
                    @method('GET')
                    <td><a href=""><button class="btn btn-primary"><i class="fas fa-plus fa-2x"></button></i></a></td>
                </form>
        </tr>
    @endforeach
    </tbody>

</table>
@endsection


@section('js')
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function(){
            $('#customers').DataTable({
                responsive: true,
                "language":{
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info":     "Mostrando página _PAGE_ de _PAGES_",
                    "paginate":  {
                            "previous": "Anterior",
                            "next": "Siguiente",
                    }

                },
                order: [[0, 'DESC']]
            });
        });
    </script>
@endsection
