<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $niveles = Nivel::all();
        return view('admin.niveles.index', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.niveles.create');
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

        Nivel::create($request->all());
        return redirect()->route('admin.niveles.index')
        ->with('mensaje', 'Nivel Creada Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Nivel Creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $nivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $nivel = Nivel::find($id);
        return view('admin.niveles.edit', compact('nivel'));
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
        $nivel = Nivel::find($id);
        $nivel->update($request->all());

        return redirect()->route('admin.niveles.index')
        ->with('mensaje', 'Nivel Actualizado Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Nivel Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $nivel = Nivel::find($id);
        $nivel->delete();
        return redirect()->route('admin.niveles.index')
        ->with('mensaje', 'Gestión Eliminada Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Gestión Eliminada');

    }
}
