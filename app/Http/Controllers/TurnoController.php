<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $turnos = Turno::all();
        return view('admin.turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.turnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Turno::create($request->all());
        return redirect()->route('admin.turnos.index')
        ->with('mensaje', 'Turno Creado Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Turno Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $turnos = Turno::find($id);
        return view('admin.turnos.edit', compact('turnos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
        $turnos = Turno::find($id);
        $turnos->update($request->all());

        return redirect()->route('admin.turnos.index')
        ->with('mensaje', 'Turno Actualizado Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Turno Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $nivel = Turno::find($id);
        $nivel->delete();
        return redirect()->route('admin.turnos.index')
        ->with('mensaje', 'Turno Eliminado Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Turno Eliminado');

    }
}
