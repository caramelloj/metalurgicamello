@extends('adminlte::page')
@section('title', 'Ver trabajos')

@section('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection
@section('content')
<br>
        <table id="works" class="table table-bordered table-striped shadow-lg mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Cliente</th>
                    <th>Titulo</th>
                    <th>Detalle</th>
                    <th>C.material</th>
                    <th>C.trabajo</th>
                    <th>Hs.trabajo</th>
                    <th>F.inicio</th>
                    <th>F.fin</th>
                    <th>Materiales</th>
                    <th>Fotos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                <tr>
                    <td>{{ $work->nombre_cliente }}</td>
                    <td>{{ $work->titulo }}</td>
                    <td>{{ $work->detalle }}</td>
                    <td>{{ $work->costo_materiales }}</td>
                    <td>{{ $work->costo_trabajo }}</td>
                    <td>{{ $work->horas_trabajadas }}</td>
                    <td>{{ $work->fecha_inicio->format('d/m/Y')}}</td>
                    <td>{{ $work->fecha_fin->format('d/m/Y')}}</td>
                    <td>{{ $work->materiales }}</td>
                    <td>
                        @foreach (json_decode($work->imagenes) as $imagen)
                        <img src="{{ asset('storage/' . $imagen) }}" alt="Imagen del trabajo" style="width: 100px; height: 100px; object-fit: cover;">
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

@section('js')
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function(){
            $('#works').DataTable({
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
@endsection
