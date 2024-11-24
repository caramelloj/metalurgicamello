@extends('adminlte::page')
@section('title', 'Ver trabajos')

@section('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endsection
@section('content')
<br>
    <table id="works" class="table table-bordered table-striped shadow-lg mt-4">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Titulo</th>
                <th>Detalle</th>
                <th>C.material</th>
                <th>C.trabajo</th>
                <th>Hs</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Materiales</th>
                <th>Supr</th>
                <th>Editar</th>
                <th>Fotos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($works as $work)
            <tr>
                <td>{!!$work->id!!}</td>
                <td>{!!$work->nombre_cliente!!}</td>
                <td>{!!$work->titulo !!}</td>
                <td>{!!$work->detalle!!}</td>
                <td>{!!$work->costo_materiales !!}</td>
                <td>{!!$work->costo_trabajo!!}</td>
                <td>{!!$work->horas_trabajadas!!}</td>
                <td>{!!$work->fecha_inicio->format('d/m/Y')!!}</td>
                <td>{!! $work->fecha_fin->format('d/m/Y')!!}</td>
                <td>{!! $work->materiales !!}</td>
                <form action="{{ route('trabajos.destroy',  $work->id) }}" method="POST">
                    <td><a href=""><button class="btn btn-primary"><i class="fas fa-trash-alt fa-2x"></button></i></a></td>
                    @csrf
                    @method('DELETE')
                </form>
                <form action="{{ route('trabajos.edit',  $work->id) }}">
                    @csrf
                    @method('PUT')
                    <td><a href=""><button class="btn btn-primary"><i class="fas fa-user-edit fa-2x"></button></i></a></td>
                </form>
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
    <!-- DataTables Buttons -->

    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- PDFMake -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

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
                order: [[0, 'DESC']],
                dom: 'Bfrtip', // Habilita los botones
            buttons: [
                'copy',
                'excel',
                'csv',
                {
                    extend: 'pdfHtml5',
                    title: 'Reporte de Tabla', // Título del PDF
                    text: 'Exportar a PDF', // Texto del botón
                    orientation: 'landscape', // Orientación: portrait o landscape
                    pageSize: 'A4', // Tamaño de la página: A4, Letter, etc.
                    customize: function (doc) {
                        doc.styles.title = {
                            fontSize: 16,
                            bold: true,
                            alignment: 'center',
                        };
                        doc.styles.tableHeader = {
                            bold: true,
                            fontSize: 12,
                            color: 'white',
                            fillColor: '#4CAF50', // Color del encabezado
                        };
                    }
                }
            ]
            });
        });
    </script>

@endsection
@endsection
