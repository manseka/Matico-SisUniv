@extends('adminlte::page')

@section('title', config('app.name') . ' - Editar Administrativo')

@section('content_header')
    <h1>Modificar Administrativo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Edición</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/administrativos', $administrativo->id) }}" method="POST" id="form-editar-administrativo">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Rol -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select name="rol" class="form-control" required>
                                            <option value="">Seleccione un Rol</option>

                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol ->name }}"
                                                    {{ $rol->name == $administrativo->usuario->roles->pluck('name')->implode(', ') ? 'selected' : '' }}>
                                                    {{ $rol->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    @error('rol')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Nombre -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="{{ old('nombre', $administrativo->nombre) }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Apellido -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="apellido" name="apellido"
                                            value="{{ old('apellido', $administrativo->apellido) }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- DNI -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="dni">DNI:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="dni" name="dni"
                                            value="{{ old('dni', $administrativo->dni) }}" required pattern="[0-9]{7,8}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Fecha de Nacimiento -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" name="fecha_nacimiento"
                                        value="{{ old('fecha_nacimiento', $administrativo->fecha_nacimiento) }}" required>
                                </div>
                            </div>

                            <!-- Teléfono -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="tel" class="form-control" name="telefono"
                                        value="{{ old('telefono', $administrativo->telefono) }}" required>
                                </div>
                            </div>

                            <!-- Dirección -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" name="direccion"
                                        value="{{ old('direccion', $administrativo->direccion) }}" required>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico:</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $administrativo->usuario->email) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Profesión -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="profesion">Profesión:</label>
                                    <input type="text" class="form-control" name="profesion"
                                        value="{{ old('profesion', $administrativo->profesion) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 text-left">
                                <a href="{{ url('admin/administrativos') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#form-editar-administrativo').on('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¿Desea guardar los cambios del administrativo?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, guardar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Errores en el formulario',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session("success") }}',
                confirmButtonColor: '#28a745'
            });
        </script>
    @endif
@stop
