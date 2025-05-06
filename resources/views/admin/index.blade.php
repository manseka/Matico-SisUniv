@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>PANEL DE ADMINISTRACION</h1>
<br>
@stop

@section('content')

<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon">
                <img src="{{ asset('/img/diploma.gif') }}" alt="Diploma" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones</b></span>
                <span class="info-box-number">{{ $total_gestiones}} Gestiones Registradas</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon">
                <img src="{{ asset('/img/grafico-de-linea.gif') }}" alt="Diploma" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Carreras</b></span>
                <span class="info-box-number">{{ $total_carreras }} Carreras Registradas</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon">
                <img src="{{ asset('/img/proximo.gif') }}" alt="Diploma" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Niveles</b></span>
                <span class="info-box-number">{{ $total_niveles }} Niveles Registrados</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon">
                <img src="{{ asset('/img/turno.gif') }}" alt="Diploma" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Turnos</b></span>
                <span class="info-box-number">{{ $total_turnos }} Turnos Registrados</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

</div>
{{--  Comienza otra fila  --}}
<div class="row">

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon">
                <img src="{{ asset('/img/completar.gif') }}" alt="Diploma" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Paralelos</b></span>
                <span class="info-box-number">{{ $total_paralelos }} Paralelos Registrados</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon">
                <img src="{{ asset('/img/carpetas.gif') }}" alt="Diploma" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Periodos</b></span>
                <span class="info-box-number">{{ $total_periodos }} Periodos Registrados</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon">
                <img src="{{ asset('/img/materiales.gif') }}" alt="Diploma" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Materias</b></span>
                <span class="info-box-number">{{ $total_materias }} Materias Registradas</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon">
                <img src="{{ asset('/img/usuario.gif') }}" alt="Diploma" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Roles</b></span>
                <span class="info-box-number">{{ $total_roles}} Roles Registradas</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon">
                <img src="{{ asset('/img/user.gif') }}" alt="Diploma" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><b>Administrativos</b></span>
                <span class="info-box-number">{{ $total_administrativos }} Administrativos Registradas</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


</div>


    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
