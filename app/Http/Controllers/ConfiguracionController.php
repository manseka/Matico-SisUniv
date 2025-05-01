<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuracion = Configuracion::first();
        return view('admin.configuraciones.index', compact('configuracion'));
    }

    /**
     * Store or update the configuration.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre' => 'required|string|max:255',
        //     'descripcion' => 'required|string|max:255',
        //     'direccion' => 'required|string|max:255',
        //     'telefono' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255',
        //     'web' => 'nullable|url|max:255',
        //     'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // // Busca la primera configuración existente o crea una nueva instancia
        // $configuracion = Configuracion::first() ?? new Configuracion();

        // $configuracion->nombre = $request->nombre;
        // $configuracion->descripcion = $request->descripcion;
        // $configuracion->direccion = $request->direccion;
        // $configuracion->telefono = $request->telefono;
        // $configuracion->email = $request->email;
        // $configuracion->web = $request->web;

        // // Manejo del archivo logo si se subió
        // if ($request->hasFile('logo')) {
        //     $file = $request->file('logo');
        //     $filename = 'images/' . time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('images'), basename($filename));
        //     $configuracion->logo = $filename;
        // }

        // $configuracion->save();


            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255',
                'direccion' => 'required|string|max:255',
                'telefono' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'web' => 'nullable|url|max:255',
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $configuracion = Configuracion::first();

            if (!$configuracion) {
                $configuracion = new Configuracion();
            }

            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->email = $request->email;
            $configuracion->web = $request->web;

            if ($request->hasFile('logo')) {
                // Eliminar logo anterior si existe
                if ($configuracion->logo && Storage::disk('public')->exists('images/' . $configuracion->logo)) {
                    Storage::disk('public')->delete('images/' . $configuracion->logo);
                }

                // Guardar nuevo archivo
                $file = $request->file('logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->put('images/' . $filename, file_get_contents($file));
                $configuracion->logo = $filename;
            }

            $configuracion->save();

            return redirect()->back()
                ->with('mensaje', 'Configuración guardada correctamente.')
                ->with('icono', 'success');
            }
}
