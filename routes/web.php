<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ParaleloController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// redirect to admin dashboard
Route::get('/', function () {
    return redirect('/admin');
});
//
Auth::routes();

Route::get('/register', function () {
    abort(403, 'Registro no Permitido.');

})->name('register');

Route::get('/home', [AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');


// //Rutas para el CRUD de Configuracion
// Route::get('/admin/configuracion', [ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth','can:admin.configuracion.index');
// Route::get('/admin/configuracion/create', [ConfiguracionController::class, 'create'])->name('admin.configuracion.create') ->middleware('auth','can:admin.configuracion.create');
// Route::post('/admin/configuracion', [ConfiguracionController::class, 'store'])->name('admin.configuracion.store') ->middleware('auth','can:admin.configuracion.store');
// Route::get('/admin/configuracion/{id}', [ConfiguracionController::class, 'show'])->name('admin.configuracion.show')->middleware('auth','can:admin.configuracion.show');
// Route::get('/admin/configuracion/{id}/edit', [ConfiguracionController::class, 'edit'])->name('admin.configuracion.edit')->middleware('auth','can:admin.configuracion.edit');
// Route::put('/admin/configuracion/{id}', [ConfiguracionController::class, 'update'])->name('admin.configuracion.update')->middleware('auth','can:admin.configuracion.update');
// Route::delete('/admin/configuracion/{id}', [ConfiguracionController::class, 'destroy'])->name('admin.configuracion.destroy') ->middleware('auth','can:admin.configuracion.destroy');


//Rutas para el CRUD de Configuracion
Route::get('/admin/configuraciones', [ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth');
//Route::get('/admin/configuraciones/create', [ConfiguracionController::class, 'create'])->name('admin.configuracion.create') ->middleware('auth');
Route::post('/admin/configuraciones/create', [ConfiguracionController::class, 'store'])->name('admin.configuracion.store') ->middleware('auth');
// Route::get('/admin/configuraciones/{id}', [ConfiguracionController::class, 'show'])->name('admin.configuracion.show')->middleware('auth');
// Route::get('/admin/configuraciones/{id}/edit', [ConfiguracionController::class, 'edit'])->name('admin.configuracion.edit')->middleware('auth');
// Route::put('/admin/configuraciones/{id}', [ConfiguracionController::class, 'update'])->name('admin.configuracion.update')->middleware('auth');
// Route::delete('/admin/configuraciones/{id}', [ConfiguracionController::class, 'destroy'])->name('admin.configuracion.destroy') ->middleware('auth');

//Rutas para el CRUD de Gestiones
Route::get('/admin/gestiones', [GestionController::class, 'index'])->name('admin.gestiones.index')->middleware('auth'); //, 'can:admin.gestion.index');
Route::get('/admin/gestiones/create', [GestionController::class, 'create'])->name('admin.gestiones.create') ->middleware('auth'); //, 'can:admin.gestion.create');
Route::post('/admin/gestiones/create', [GestionController::class, 'store'])->name('admin.gestiones.store') ->middleware('auth'); //, 'can:admin.gestion.store');
Route::get('/admin/gestiones/{id}', [GestionController::class, 'show'])->name('admin.gestiones.show')->middleware('auth'); //, 'can:admin.gestion.show');
Route::get('/admin/gestiones/{id}/edit', [GestionController::class, 'edit'])->name('admin.gestiones.edit')->middleware('auth'); //, 'can:admin.gestion.edit');
Route::put('/admin/gestiones/{id}', [GestionController::class, 'update'])->name('admin.gestiones.update')->middleware('auth'); //, 'can:admin.gestion.update');
Route::delete('/admin/gestiones/{id}', [GestionController::class, 'destroy'])->name('admin.gestiones.destroy') ->middleware('auth'); //, 'can:admin.gestion.destroy');


// Rutas para el CRUD de Carreras
Route::get('/admin/carreras', [CarreraController::class, 'index'])->name('admin.carreras.index')->middleware('auth'); //, 'can:admin.gestion.index');
Route::get('/admin/carreras/create', [CarreraController::class, 'create'])->name('admin.carreras.create') ->middleware('auth'); //, 'can:admin.gestion.create');
Route::post('/admin/carreras/create', [CarreraController::class, 'store'])->name('admin.carreras.store') ->middleware('auth'); //, 'can:admin.gestion.store');
Route::get('/admin/carreras/{id}', [CarreraController::class, 'show'])->name('admin.carreras.show')->middleware('auth'); //, 'can:admin.gestion.show');
Route::get('/admin/carreras/{id}/edit', [CarreraController::class, 'edit'])->name('admin.carreras.edit')->middleware('auth'); //, 'can:admin.gestion.edit');
Route::put('/admin/carreras/{id}', [CarreraController::class, 'update'])->name('admin.carreras.update')->middleware('auth'); //, 'can:admin.gestion.update');
Route::delete('/admin/carreras/{id}', [CarreraController::class, 'destroy'])->name('admin.carreras.destroy') ->middleware('auth'); //, 'can:admin.gestion.destroy');

// Rutas para el CRUD de Niveles
Route::get('/admin/niveles', [NivelController::class, 'index'])->name('admin.niveles.index')->middleware('auth'); //, 'can:admin.gestion.index');
Route::get('/admin/niveles/create', [NivelController::class, 'create'])->name('admin.niveles.create') ->middleware('auth'); //, 'can:admin.gestion.create');
Route::post('/admin/niveles/create', [NivelController::class, 'store'])->name('admin.niveles.store') ->middleware('auth'); //, 'can:admin.gestion.store');
Route::get('/admin/niveles/{id}', [NivelController::class, 'show'])->name('admin.niveles.show')->middleware('auth'); //, 'can:admin.gestion.show');
Route::get('/admin/niveles/{id}/edit', [NivelController::class, 'edit'])->name('admin.niveles.edit')->middleware('auth'); //, 'can:admin.gestion.edit');
Route::put('/admin/niveles/{id}', [NivelController::class, 'update'])->name('admin.niveles.update')->middleware('auth'); //, 'can:admin.gestion.update');
Route::delete('/admin/niveles/{id}', [NivelController::class, 'destroy'])->name('admin.niveles.destroy') ->middleware('auth'); //, 'can:admin.gestion.destroy');

//Route::resource('admin/niveles', NivelController::class)->names('admin.niveles') ->middleware('auth'); //, 'can:admin.gestion.destroy');

// Rutas para el CRUD de turnos
Route::get('/admin/turnos', [TurnoController::class, 'index'])->name('admin.turnos.index')->middleware('auth'); //, 'can:admin.gestion.index');
Route::get('/admin/turnos/create', [TurnoController::class, 'create'])->name('admin.turnos.create') ->middleware('auth'); //, 'can:admin.gestion.create');
Route::post('/admin/turnos/create', [TurnoController::class, 'store'])->name('admin.turnos.store') ->middleware('auth'); //, 'can:admin.gestion.store');
Route::get('/admin/turnos/{id}', [TurnoController::class, 'show'])->name('admin.turnos.show')->middleware('auth'); //, 'can:admin.gestion.show');
Route::get('/admin/turnos/{id}/edit', [TurnoController::class, 'edit'])->name('admin.turnos.edit')->middleware('auth'); //, 'can:admin.gestion.edit');
Route::put('/admin/turnos/{id}', [TurnoController::class, 'update'])->name('admin.turnos.update')->middleware('auth'); //, 'can:admin.gestion.update');
Route::delete('/admin/turnos/{id}', [TurnoController::class, 'destroy'])->name('admin.turnos.destroy') ->middleware('auth'); //, 'can:admin.gestion.destroy');

// Rutas para el CRUD de Paralelos
Route::get('/admin/paralelos', [ParaleloController::class, 'index'])->name('admin.paralelos.index')->middleware('auth'); //, 'can:admin.gestion.index');
Route::get('/admin/paralelos/create', [ParaleloController::class, 'create'])->name('admin.paralelos.create') ->middleware('auth'); //, 'can:admin.gestion.create');
Route::post('/admin/paralelos/create', [ParaleloController::class, 'store'])->name('admin.paralelos.store') ->middleware('auth'); //, 'can:admin.gestion.store');
Route::get('/admin/paralelos/{id}', [ParaleloController::class, 'show'])->name('admin.paralelos.show')->middleware('auth'); //, 'can:admin.gestion.show');
Route::get('/admin/paralelos/{id}/edit', [ParaleloController::class, 'edit'])->name('admin.paralelos.edit')->middleware('auth'); //, 'can:admin.gestion.edit');
Route::put('/admin/paralelos/{id}', [ParaleloController::class, 'update'])->name('admin.paralelos.update')->middleware('auth'); //, 'can:admin.gestion.update');
Route::delete('/admin/paralelos/{id}', [ParaleloController::class, 'destroy'])->name('admin.paralelos.destroy') ->middleware('auth'); //, 'can:admin.gestion.destroy');


// Rutas para el CRUD de Periodos
Route::get('/admin/periodos', [PeriodoController::class, 'index'])->name('admin.periodos.index')->middleware('auth'); //, 'can:admin.periodos.index');
Route::get('/admin/periodos/create', [PeriodoController::class, 'create'])->name('admin.periodos.create') ->middleware('auth'); //, 'can:admin.periodos.create');
Route::post('/admin/periodos/create', [PeriodoController::class, 'store'])->name('admin.periodos.store') ->middleware('auth'); //, 'can:admin.periodos.store');
Route::get('/admin/periodos/{id}', [PeriodoController::class, 'show'])->name('admin.periodos.show')->middleware('auth'); //, 'can:admin.periodos.show');
Route::get('/admin/periodos/{id}/edit', [PeriodoController::class, 'edit'])->name('admin.periodos.edit')->middleware('auth'); //, 'can:admin.periodos.edit');
Route::put('/admin/periodos/{id}', [PeriodoController::class, 'update'])->name('admin.periodos.update')->middleware('auth'); //, 'can:admin.periodos.update');
Route::delete('/admin/periodos/{id}', [PeriodoController::class, 'destroy'])->name('admin.periodos.destroy') ->middleware('auth'); //, 'can:admin.periodos.destroy');

// Rutas para el CRUD de Materias
Route::get('/admin/materias', [MateriaController::class, 'index'])->name('admin.materias.index')->middleware('auth'); //, 'can:admin.materias.index');
Route::get('/admin/materias/create', [MateriaController::class, 'create'])->name('admin.materias.create') ->middleware('auth'); //, 'can:admin.materias.create');
Route::post('/admin/materias/create', [MateriaController::class, 'store'])->name('admin.materias.store') ->middleware('auth'); //, 'can:admin.materias.store');
Route::get('/admin/materias/{id}', [MateriaController::class, 'show'])->name('admin.materias.show')->middleware('auth'); //, 'can:admin.materias.show');
Route::get('/admin/materias/{id}/edit', [MateriaController::class, 'edit'])->name('admin.materias.edit')->middleware('auth'); //, 'can:admin.materias.edit');
Route::put('/admin/materias/{id}', [MateriaController::class, 'update'])->name('admin.materias.update')->middleware('auth'); //, 'can:admin.materias.update');
Route::delete('/admin/materias/{id}', [MateriaController::class, 'destroy'])->name('admin.materias.destroy') ->middleware('auth'); //, 'can:admin.materias.destroy');

// Rutas para el CRUD de Roles
Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth'); //, 'can:admin.roles.index');
Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create') ->middleware('auth'); //, 'can:admin.roles.create');
Route::post('/admin/roles/create', [RoleController::class, 'store'])->name('admin.roles.store') ->middleware('auth'); //, 'can:admin.roles.store');
Route::get('/admin/roles/{id}', [RoleController::class, 'show'])->name('admin.roles.show')->middleware('auth'); //, 'can:admin.roles.show');
Route::get('/admin/roles/{id}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth'); //, 'can:admin.roles.edit');
Route::put('/admin/roles/{id}', [RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth'); //, 'can:admin.roles.update');
Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy') ->middleware('auth'); //, 'can:admin.roles.destroy');


// Rutas para administrativos
Route::get('/admin/administrativos', [AdministrativoController::class, 'index'])->name('admin.administrativos.index')->middleware('auth'); //, 'can:admin.administrativos.index');
Route::get('/admin/administrativos/create', [AdministrativoController::class, 'create'])->name('admin.administrativos.create') ->middleware('auth'); //, 'can:admin.administrativos.create');
Route::post('/admin/administrativos/create', [AdministrativoController::class, 'store'])->name('admin.administrativos.store') ->middleware('auth'); //, 'can:admin.administrativos.store');
Route::get('/admin/administrativos/{id}', [AdministrativoController::class, 'show'])->name('admin.administrativos.show')->middleware('auth'); //, 'can:admin.administrativos.show');
Route::get('/admin/administrativos/{id}/edit', [AdministrativoController::class, 'edit'])->name('admin.administrativos.edit')->middleware('auth'); //, 'can:admin.administrativos.edit');
Route::put('/admin/administrativos/{id}', [AdministrativoController::class, 'update'])->name('admin.administrativos.update')->middleware('auth'); //, 'can:admin.administrativos.update');
Route::delete('/admin/administrativos/{id}', [AdministrativoController::class, 'destroy'])->name('admin.administrativos.destroy') ->middleware('auth'); //, 'can:admin.administrativos.destroy');
