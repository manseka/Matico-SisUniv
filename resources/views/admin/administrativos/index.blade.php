@extends('adminlte::page')


@section('title', config('app.name') . ' - Personal Administrativo')
@section('content_header')
    <h1>Listado Personal Administrativo</h1>
    <br>
@stop

@section('content')
<div class="row"> <!-- INICIO row principal -->
    <div class="col-md-12"> <!-- INICIO columna central -->
        <div class="card card-outline card-primary"> <!-- INICIO card -->

            <div class="card-header d-flex justify-content-between align-items-center"> <!-- INICIO card header -->
                <h3 class="card-title mb-0">Administrativos Registrados</h3>
                <a href="{{ url('admin/administrativos/create') }}" class="btn btn-primary btn-sm ml-auto">
                    <i class="fas fa-plus"></i> Nuevo Administrativo
                </a>
            </div>
            <!-- FIN card header -->

            <div class="card-body"> <!-- INICIO card body -->
                <table id="example1" class="table table-bordered table-hover table-striped table-sm"> <!-- INICIO tabla -->
                    <thead> <!-- INICIO encabezado tabla -->
                        <tr>
                            <th style="width: 50px;" class="text-center">Nro</th>
                            <th style="width: 50px;" class="text-center">Rol</th>
                            <th style="width: 50px;" class="text-center">Nombre</th>
                            <th style="width: 50px;" class="text-center">Apellido</th>
                            <th style="width: 50px;" class="text-center">Dni</th>
                            <th style="width: 50px;" class="text-center">Telefono</th>
                            <th style="width: 50px;" class="text-center">Direccion</th>
                            <th style="width: 50px;" class="text-center">Email</th>
                            <th style="width: 50px;" class="text-center">Profesion</th>
                            <th style="width: 100px;" class="text-center">Acciones</th>
                        </tr>
                    </thead> <!-- FIN encabezado tabla -->

                    <tbody> <!-- INICIO cuerpo tabla -->
                        @php $contador = 1; @endphp
                        @foreach ($administrativos as $administrativo)
                            <tr>
                                <td class="text-center">{{ $contador++ }}</td>
                                <td class="text-center">{{ $administrativo->usuario->roles->pluck('name')->implode(', ') }}</td>
                                <td class="text-center">{{ $administrativo->nombre }}</td>
                                <td class="text-center">{{ $administrativo->apellido }}</td>
                                <td class="text-center">{{ $administrativo->dni }}</td>
                                <td class="text-center">{{ $administrativo->telefono }}</td>
                                <td class="text-center">{{ $administrativo->direccion }}</td>
                                <td class="text-center">{{ $administrativo->usuario->email }}</td>
                                <td class="text-center">{{ $administrativo->profesion }}</td>


                                <td class="text-center">
                                    <a href="{{ url('admin/administrativos/' . $administrativo->id ) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ url('admin/administrativos/' . $administrativo->id . '/edit') }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion({{ $administrativo->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="form-eliminar-{{ $administrativo->id }}" action="{{ url('admin/administrativos/' . $administrativo->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> <!-- FIN cuerpo tabla -->
                </table> <!-- FIN tabla -->
            </div> <!-- FIN card body -->

        </div> <!-- FIN card -->
    </div> <!-- FIN columna central -->
</div> <!-- FIN row principal -->


@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        /* Fondo Transparente en el contenedor */
        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px
        }
        /* Estilo personalizados para los botones */
        #example1_wrapper .btn {

            color: white;
            border-radius: 5px;
            padding: 4px 15px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        /* Colores por tipo de botón */
    .btn-danger {background-color: #dc3545; border: none;}
    .btn-primary {background-color: #007bff; border: none;}
    .btn-warning {background-color: #ffc107; border: none;}
    .btn-success {background-color: #28a745; border: none;}
    .btn-default { background-color: #6c757d; border: none;}


        /* Efecto hover */
        #example1_wrapper .btn:hover {
            background-color: #0056b3;
            color: white;
            transform: scale(1.05);
        }
        /* Estilo para el contenedor de la tabla */
        .table-responsive {
            background-color: transparent;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Estilo para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .card-header {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
        }

        /* Botón con degradado y estilo moderno */
        .card-header .btn-primary {
            background: linear-gradient(to right, #6fb1fc, #4364f7);
            border: none;
            color: white;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease-in-out;
        }

        .card-header .btn-primary:hover {
            background: linear-gradient(to right, #5a9bf6, #3657d2);
            transform: scale(1.05);
        }

    </style>

@stop

@section('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay registros disponibles",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'lengthMenu': "Mostrar _MENU_  registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "searchPlaceholder": "Buscar registros",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }

                },
                "responsive": true,
                "autoWidth": false,
                "lengthChange": true,
                "buttons": [
                    {extend: 'copy',text: '<i class="fas fa-copy"></i> Copiar',className: 'btn btn-default'},
                    {extend: 'pdfHtml5', text: '<i class="fas fa-file-pdf"></i> PDF', className: 'btn btn-danger'},
                    {extend: 'csvHtml5',text: '<i class="fas fa-file-csv"></i> CSV',className: 'btn btn-info'},
                    {extend: 'excelHtml5',text: '<i class="fas fa-file-excel"></i> Excel',className: 'btn btn-success'},
                    {extend: 'print',text: '<i class="fas fa-print"></i> Imprimir',className: 'btn btn-warning'},

                ],
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>


    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-eliminar-' + id).submit();
                }
            });
        }
    </script>
@stop
