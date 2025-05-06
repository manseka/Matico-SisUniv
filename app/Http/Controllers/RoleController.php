<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = 'web'; // si usás guardias
        $rol->save();

        // Si la petición es AJAX, devolvemos JSON
        if ($request->ajax()) {
            return response()->json([
                'id' => $rol->id,
                'name' => $rol->name,
            ]);
        }

        // Petición normal (no AJAX)
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol Creado Correctamente.')
            ->with('icono', 'success')
            ->with('title', 'Rol Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $role = Role::find($id); // Esto está bien
        return view('admin.roles.edit', compact('role')); // Asegúrate de que esto esté tal cual
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id . '|max:255', // le dice que el nombre es requerido y único en la tabla roles
        ]);


        $rol = Role::find($id);



        $rol->update($request->all());

        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol Actualizado Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Rol Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $rol = Role::find($id);
        $rol->delete();
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Gestión Eliminada Correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Gestión Eliminada');

    }
}
