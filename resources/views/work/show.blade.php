@extends('adminlte::page')
@section('title', 'Ver trabajos')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ejemplo de DataTables</h3>
    </div>
    <div class="card-body">
        <table id="example" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                    <th>Acciones</th>
                    <th>Acciones</th>
                    <th>Acciones</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <!-- Los datos se rellenarán dinámicamente -->
            </tbody>
        </table>
    </div>
</div>
    @section('scripts')
    <script>
$(document).ready(function() {
    $('#example').DataTable({
        ajax: {
            url: '/works/all', // Ruta a la API que devuelve los datos
            type: 'GET',
            dataSrc: 'data', // Fuente de datos dentro del JSON
        },
        columns: [
            { data: 'customer_id' },
            { data: 'titulo' },
            { data: 'detalle' },
            { data: 'costo_materiales' },
            { data: 'costo_trabajo' },
            { data: 'horas_trabajadas' },
            { data: 'fecha_inicio' },
            { data: 'fecha_fin' },
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" // Traducción al español
        }
    });
});

    </script>

    @endsection
@endsection
