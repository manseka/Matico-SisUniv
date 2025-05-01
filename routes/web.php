<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ParaleloController;
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
