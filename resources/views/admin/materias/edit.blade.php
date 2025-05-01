@extends('adminlte::page')
@section('title', 'Crear Materia')
@section('content_header')
    <h1>Actualizar Materia</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario de Actualización de Materias</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/materias/'.$materia->id) }}" method="POST" id="form-crear-nivel">
                    @csrf
                    @method('PUT')

                    <!-- Carrera -->
                    <div class="form-group">
                        <label for="carrera_id">Nombre de la Carrera</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                            </div>
                            <select name="carrera_id" class="form-control" required>
                                <option value="">Seleccione una Carrera</option>
                                @foreach ($carreras as $carrera)
                                    <option value="{{ $carrera->id }}"
                                        {{ old('carrera_id', $materia->carrera_id) == $carrera->id ? 'selected' : '' }}>
                                        {{ $carrera->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('carrera_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Codigo de la materia -->
                    <div class="form-group">
                        <label for="nombre">Codigo de la Materia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                            </div>
                            <input type="text" class="form-control" id="codigo"
                                value="{{ old('codigo', $materia->codigo ?? '') }}"
                                name="codigo" placeholder="Ingrese el codigo de la materia" required>
                        </div>
                        @error('codigo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Nombre de la materia -->
                    <div class="form-group">
                        <label for="nombre">Nombre de la Materia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                            </div>
                            <input type="text" class="form-control" id="nombre"
                                value="{{ old('nombre', $materia->nombre ?? '') }}"
                                name="nombre" placeholder="Ingrese el nombre de la materia" required>
                        </div>
                        @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="row mt-3">
                        <div class="col-md-6 text-left">
                            <a href="{{ url('admin/materias') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-primary">Actualizar Materia</button>
                        </div>
                    </div>
                </form>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div> <!-- /.col -->
</div> <!-- /.row -->

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
                    text: "¿Desea Actualizar este Materia?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, Actualizar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@stop
