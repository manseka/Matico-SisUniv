@extends('adminlte::page')

@section('title', config('app.name') . ' - Personal Docente')

@section('content_header')
    <h1>Crear Nuevo Docente</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Nuevo Docente</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/docentes/create') }}" method="POST"  enctype="multipart/form-data" id="form-crear-rol">
                        @csrf

                        <div class="row">
                            <!-- Rol -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        @php $rolDocente = $roles->firstWhere('name', 'DOCENTE'); @endphp

                                        <select name="rol" class="form-control" required disabled>
                                            <option value="">Seleccione un Rol</option>
                                            @if ($rolDocente)
                                                <option value="{{ $rolDocente->name }}" selected>{{ $rolDocente->name }}</option>
                                            @else
                                                <option value="" selected>No existe el rol DOCENTE</option>
                                            @endif
                                        </select>

                                        {{-- Campo oculto para enviar el valor del rol --}}
                                        @if ($rolDocente)
                                            <input type="hidden" name="rol" value="{{ $rolDocente->name }}">
                                        @endif
                                        <div class="input-group-append">
                                            <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary" title="Agregar Rol">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @error('rol') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Nombre -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                               value="{{ old('nombre') }}" placeholder="Ingrese el nombre del Docente" required>
                                    </div>
                                    @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Apellido -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="apellido" name="apellido"
                                               value="{{ old('apellido') }}" placeholder="Ingrese el apellido del Docente" required>
                                    </div>
                                    @error('apellido') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- DNI -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dni">DNI</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="dni" name="dni"
                                               value="{{ old('dni') }}" placeholder="Ingrese el DNI" required
                                               pattern="[0-9]{7,8}" maxlength="8">
                                    </div>
                                    @error('dni') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Fecha de nacimiento -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                               value="{{ old('fecha_nacimiento') }}" required>
                                    </div>
                                    @error('fecha_nacimiento') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Teléfono -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="tel" class="form-control" id="telefono" name="telefono"
                                               value="{{ old('telefono') }}" placeholder="Ej: 2994123456" required
                                               pattern="[0-9]{10}" maxlength="10">
                                    </div>
                                    @error('telefono') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Dirección -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="direccion" name="direccion"
                                               value="{{ old('direccion') }}" placeholder="Ej: Calle Falsa 123"
                                               required maxlength="255">
                                    </div>
                                    @error('direccion') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{ old('email') }}" placeholder="Ej: ejemplo@dominio.com" required>
                                    </div>
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Profesión -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="profesion">Profesión</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="profesion" name="profesion"
                                               value="{{ old('profesion') }}" placeholder="Ej: Abogado, Ingeniero, etc."
                                               required maxlength="100">
                                    </div>
                                    @error('profesion') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Foto -->
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control-file" id="foto" name="foto"
                                           accept=".jpg, .jpeg, .png">
                                    @error('foto')
                                    <div class="text-danger">{{ $message }}
                                        </div> @enderror

                                    <div class="text-center mt-2">
                                        <output id="list">
                                            @if (isset($configuracion->foto))
                                                <img class="img-thumbnail" src="{{ asset('storage/images/' . $configuracion->foto) }}"
                                                     alt="foto" width="150" title="Foto actual">
                                            @endif
                                        </output>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="row mt-4">
                            <div class="col-md-6 text-left">
                                <a href="{{ url('admin/docentes') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Cancelar
                                </a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Crear Docente
                                </button>
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
    $(document).ready(function () {
        $('#form-crear-rol').on('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro?',
                text: "¿Desea crear este Docente?",
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

    document.getElementById('foto').addEventListener('change', function (evt) {
        const files = evt.target.files;
        for (let i = 0; i < files.length; i++) {
            if (!files[i].type.match('image.*')) {
                continue;
            }
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("list").innerHTML = '<img class="img-thumbnail border border-primary" src="' + e.target.result + '" title="' + escape(files[i].name) + '" width="150" />';
            };
            reader.readAsDataURL(files[i]);
        }
    }, false);
</script>
@stop
