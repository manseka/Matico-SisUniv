@extends('adminlte::page')
@section('title', 'Crear Materias')
@section('content_header')
    <h1>Crear Nueva Materia</h1>
@stop

@section('content')
<div class="row"> <!-- INICIO row general -->
    <div class="col-md-8"> <!-- INICIO columna central -->
        <div class="card card-outline card-primary"> <!-- INICIO card -->
            <div class="card-header"> <!-- INICIO card header -->
                <h3 class="card-title">Formulario de Nuevo Nivel</h3>
            </div> <!-- FIN card header -->

            <div class="card-body"> <!-- INICIO card body -->

                <form action="{{ url('admin/materias/create') }}" method="POST" id="form-crear-nivel"> <!-- INICIO form -->
                    @csrf

                    <div class="row"> <!-- INICIO fila carrera -->
                        <div class="col-md-12"> <!-- INICIO columna carrera -->
                            <div class="form-group"> <!-- INICIO grupo carrera -->
                                <label for="nombre">Nombre del Materia</label>
                                <div class="input-group mb-3"> <!-- INICIO input-group carrera -->
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                    </div>
                                    <select name="carrera_id" class="form-control" required>
                                        <option value="">Seleccione una Carrera</option>
                                        @foreach ($carreras as $carrera)
                                            <option value="{{ $carrera->id }}" {{ old('carrera_id') == $carrera->id ? 'selected' : '' }}>
                                                {{ $carrera->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> <!-- FIN input-group carrera -->
                                @error('carrera_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> <!-- FIN grupo carrera -->
                        </div> <!-- FIN columna carrera -->
                    </div> <!-- FIN fila carrera -->

                    <div class="row"> <!-- INICIO fila código -->
                        <div class="col-md-12"> <!-- INICIO columna código -->
                            <div class="form-group"> <!-- INICIO grupo código -->
                                <label for="nombre">Codigo de la Materia</label>
                                <div class="input-group mb-3"> <!-- INICIO input-group código -->
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="codigo" value="{{ old('codigo') }}" name="codigo" placeholder="Ingrese el codigo de la Materia" required>
                                </div> <!-- FIN input-group código -->
                                @error('codigo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> <!-- FIN grupo código -->
                        </div> <!-- FIN columna código -->
                    </div> <!-- FIN fila código -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Materia</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" value="{{ old('nombre') }}" name="nombre" placeholder="Ingrese el nombre de la Materia" required>
                                </div> <!-- FIN input-group código -->
                                @error('codigo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> <!-- FIN grupo código -->
                        </div> <!-- FIN columna código -->
                    </div> <!-- FIN fila código -->





                    <div class="row mt-3"> <!-- INICIO fila botones -->
                        <div class="col-md-6 text-left"> <!-- INICIO columna botón cancelar -->
                            <a href="{{ url('admin/materias') }}" class="btn btn-secondary">Cancelar</a>
                        </div> <!-- FIN columna botón cancelar -->
                        <div class="col-md-6 text-right"> <!-- INICIO columna botón enviar -->
                            <button type="submit" class="btn btn-primary">Crear Materia</button>
                        </div> <!-- FIN columna botón enviar -->
                    </div> <!-- FIN fila botones -->

                </form> <!-- FIN form -->

            </div> <!-- FIN card-body -->
        </div> <!-- FIN card -->
    </div> <!-- FIN columna central -->
</div> <!-- FIN row general -->

@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#form-crear-nivel').on('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¿Desea crear este materia?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, crear!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@stop
