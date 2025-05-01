<?php

namespace App\Http\Controllers;

use App\Models\Paralelo;
use Illuminate\Http\Request;

class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $paralelo = Paralelo::all();
        return view('admin.paralelos.index', compact('paralelo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.paralelos.create');
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

        Paralelo::create($request->all());
        return redirect()->route('admin.paralelos.index')
        ->with('mensaje', 'Paralelo Creada Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Paralelo Creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paralelo $paralelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $paralelo = Paralelo::find($id);
        return view('admin.paralelos.edit', compact('paralelo'));
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
        $paralelo = Paralelo::find($id);
        $paralelo->update($request->all());

        return redirect()->route('admin.paralelos.index')
        ->with('mensaje', 'Paralelo Actualizado Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Paralelo Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $paralelo = Paralelo::find($id);
        $paralelo->delete();
        return redirect()->route('admin.paralelos.index')
        ->with('mensaje', 'Paralelo Eliminado Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Paralelo Eliminada');

    }
}
