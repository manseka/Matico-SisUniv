<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all Materia records from the database
        $materias = Materia::all();
        // Return the view with the materias data
        return view('admin.materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // llamamos a todas las carreras
        $carreras = Carrera::all();

        // Return the view to create a new Materia with the list of carreras
        return view('admin.materias.create', compact('carreras'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate the request data
        $request->validate([
            'nombre' => 'required|string|max:255',
            'carrera_id' => 'required|exists:carreras,id',
            'codigo' => 'required|string|max:50',
        ]);
        // Create a new Materia record in the database
        Materia::create($request->all());
        // Redirect to the index route with a success message
        return redirect()->route('admin.materias.index')
            ->with('mensaje', 'Materia Creada Correctamente.')
            ->with('icono', 'success')
            ->with('title', 'Materia Creada');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the Materia by ID
//        $materia = Materia::findOrFail($id);
        // Return the view to show the Materia details
  //      return view('admin.materias.show', compact('materia'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the Materia by ID
        $materia = Materia::findOrFail($id);
        // Fetch all Carreras for the select input
        $carreras = Carrera::all();
        // Return the view to edit the Materia with the list of carreras
        return view('admin.materias.edit', compact('materia', 'carreras'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'nombre' => 'required|string|max:255',
            'carrera_id' => 'required|exists:carreras,id',
            'codigo' => 'required|string|max:50',
        ]);
        $materia = Materia::findOrFail($id);
        // Update the Materia record in the database
        $materia->update($request->all());
        // Redirect to the index route with a success message
        return redirect()->route('admin.materias.index')
            ->with('mensaje', 'Materia Actualizada Correctamente.')
            ->with('icono', 'success')
            ->with('title', 'Materia Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    
    {
        // Find the Materia by ID
        $materia = Materia::findOrFail($id);
        // Delete the Materia record from the database
        $materia->delete();
        // Redirect to the index route with a success message
        return redirect()->route('admin.materias.index')
            ->with('mensaje', 'Materia Eliminada Correctamente.')
            ->with('icono', 'success')
            ->with('title', 'Materia Eliminada');

    }
}
