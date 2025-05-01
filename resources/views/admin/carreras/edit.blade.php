@extends('adminlte::page')
@section('title', 'Crear Carrera')
@section('content_header')
    <h1>Actualizar Gestión</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Actualizacion de Carreras</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/carreras/'.$carrera->id) }}" method="POST" id="form-crear-carrera">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre de la Carrera</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" value="{{ old('nombre', $carrera->nombre ?? '') }}" name="nombre" placeholder="Ingrese el nombre de la gestión" required>
                                    </div>
                                    @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 text-left">
                                <a href="{{ url('admin/gestiones') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Actualizar Carrera</button>
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
            $('#form-crear-carrera').on('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¿Desea Actualizar esta carrera?",
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
