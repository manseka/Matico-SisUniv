<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $periodo = Periodo::all();
        return view('admin.periodos.index', compact('periodo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.periodos.create');
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

        Periodo::create($request->all());
        return redirect()->route('admin.periodos.index')
        ->with('mensaje', 'Periodo Creada Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Periodo Creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $periodo = Periodo::find($id);
        return view('admin.periodos.edit', compact('periodo'));
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
        $periodo = Periodo::find($id);
        $periodo->update($request->all());

        return redirect()->route('admin.periodos.index')
        ->with('mensaje', 'Periodo Actualizado Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Periodo Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $periodo = Periodo::find($id);
        $periodo->delete();
        return redirect()->route('admin.periodos.index')
        ->with('mensaje', 'Periodo Eliminado Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Periodo Eliminada');

    }
}
