@extends('adminlte::page')

@section('title', 'Configuraciones')

@section('content_header')
    <h1>Configuraciones</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete el Formulario</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/configuraciones/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <!-- Nombre -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre <b>(*)</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                value="{{ old('nombre', $configuracion->nombre ?? '') }}"
                                                placeholder="Nombre" required>
                                        </div>
                                        @error('nombre')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción <b>(*)</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                                value="{{ old('descripcion', $configuracion->descripcion ?? '') }}"
                                                placeholder="Descripción" required>
                                        </div>
                                        @error('descripcion')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Dirección -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección <b>(*)</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="direccion" name="direccion"
                                                value="{{ old('direccion', $configuracion->direccion ?? '') }}"
                                                placeholder="Dirección" required>
                                        </div>
                                        @error('direccion')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Teléfono -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono <b>(*)</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="telefono" name="telefono"
                                                value="{{ old('telefono', $configuracion->telefono ?? '') }}"
                                                placeholder="Teléfono" required>
                                        </div>
                                        @error('telefono')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email <b>(*)</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $configuracion->email ?? '') }}"
                                                placeholder="Email" required>
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Web -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="web">Sitio Web <b>(*)</b></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                            </div>
                                            <input type="url" class="form-control" id="web" name="web"
                                                value="{{ old('web', $configuracion->web ?? '') }}"
                                                placeholder="Sitio web" required>
                                        </div>
                                        @error('web')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Logo -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="logo">Logo <b>(*)</b></label>
                                <input type="file" class="form-control" id="logo" name="logo"
                                    accept=".jpg, .png, .jpeg" >
                                @error('logo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <center>
                                    <output id="list">
                                        @if (isset($configuracion->logo))
                                            <img class="thumb thumbnail" src="{{ asset('storage/images/' . $configuracion->logo) }}" alt="Logo" width="70%" title="Logo">
                                        @endif
                                    </output>
                                </center>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ url('admin/configuraciones') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        document.getElementById('logo').addEventListener('change', function (evt) {
            const files = evt.target.files;
            for (let i = 0; i < files.length; i++) {
                if (!files[i].type.match('image.*')) {
                    continue;
                }
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById("list").innerHTML = '<img class="thumb thumbnail" src="' + e.target.result + '" title="' + escape(files[i].name) + '" />';
                };
                reader.readAsDataURL(files[i]);
            }
        }, false);
    </script>
@stop
