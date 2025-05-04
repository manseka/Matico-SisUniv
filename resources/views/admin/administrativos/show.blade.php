@extends('adminlte::page')

@section('title', config('app.name') . ' - Ver Administrativo')

@section('content_header')
    <h1 class="text-primary">👤 Detalle del Administrativo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-id-badge me-2"></i> Datos del Administrativo</h3>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Nombre</label>
                            <div class="form-control-plaintext border p-2 rounded bg-light">{{ $administrativo->nombre }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Apellido</label>
                            <div class="form-control-plaintext border p-2 rounded bg-light">{{ $administrativo->apellido }}</div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">DNI</label>
                            <div class="form-control-plaintext border p-2 rounded bg-light">{{ $administrativo->dni }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Fecha de Nacimiento</label>
                            <div class="form-control-plaintext border p-2 rounded bg-light">{{ $administrativo->fecha_nacimiento }}</div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Teléfono</label>
                            <div class="form-control-plaintext border p-2 rounded bg-light">{{ $administrativo->telefono }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Dirección</label>
                            <div class="form-control-plaintext border p-2 rounded bg-light">{{ $administrativo->direccion }}</div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Email</label>
                            <div class="form-control-plaintext border p-2 rounded bg-light">{{ $administrativo->usuario->email }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-muted">Profesión</label>
                            <div class="form-control-plaintext border p-2 rounded bg-light">{{ $administrativo->profesion }}</div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-muted">Roles asignados</label>
                        <div>
                            @forelse($administrativo->usuario?->roles ?? [] as $role)
                            <span class="badge bg-info text-dark me-2 px-3 py-2 fs-6 rounded-pill">{{ $role->name }}</span>
                            @empty
                                <span class="text-muted">Sin roles asignados</span>
                            @endforelse
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.administrativos.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
