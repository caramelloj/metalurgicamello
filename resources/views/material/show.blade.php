@extends('adminlte::page')
@section('title', 'Ver materiales')
@section('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<br>

<table id="materiales" class="table table-bordered table-hover dataTable dtr-inline collapsed">
    <thead class="bg-primary text-white">
        <tr>
            <th>Descripcion</th>
            <th>Unidad</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($materiales as $material)
        <tr>
                <td>{!! $material->descripcion !!}</td>
                <td>{!! $material->unidad !!}</td>
                <td>{!! $material->cantidad !!}</td>
                <td>{!! $material->precio !!}</td>
                <form action="{{ route('materiales.destroy',  $material->id) }}" method="POST">
                    <td><a href=""><button class="btn btn-primary"><i class="fas fa-trash-alt fa-2x"></button></i></a></td>
                    @csrf
                    @method('DELETE')
                </form>
                <form action="{{ route('materiales.edit',  $material->id) }}">
                    @csrf
                    @method('PUT')
                    <td><a href=""><button class="btn btn-primary"><i class="fas fa-user-edit fa-2x"></button></i></a></td>
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
            $('#materiales').DataTable({
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
                order: [[1, 'DESC']]
            });
        });
    </script>
@endsection
