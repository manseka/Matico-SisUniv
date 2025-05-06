<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar todos los docentes
        $docentes = Docente::all();
        return view('admin.docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.docentes.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

              // Validar los campos del formulario
        $request->validate([
           'rol' => 'required',
           'nombre' => 'required|string|max:255',
           'apellido' => 'required|string|max:255',
           'dni' => 'required|digits_between:7,8|unique:docentes,dni',
           'fecha_nacimiento' => 'required|date',
           'telefono' => 'required|string|max:20',
           'direccion' => 'required|string|max:255',
           'profesion' => 'required|string|max:100',
           'email' => 'required|email|unique:users,email',
           'foto' => 'required|image',
       ]);

           // Crear el nuevo usuario
           $usuario = new User();
           $usuario->name = $request->nombre  . ' ' . $request->apellido;
           $usuario->email = $request->email;
           $usuario->password = bcrypt($request->dni);
           $usuario->save();

           // Asignar el rol al usuario
           $usuario->assignRole($request->rol);
            //dd($usuario->id);
           // Crear el administrativo asociado
           $docente = new Docente();
           $docente->usuario_id = $usuario->id;
           $docente->nombres = $request->nombre;
           $docente->apellidos = $request->apellido;
           $docente->dni = $request->dni;
           $docente->fecha_nacimiento = $request->fecha_nacimiento;
           $docente->telefono = $request->telefono;
           $docente->direccion = $request->direccion;
           $docente->profesion = $request->profesion;

           if ($request->hasFile('foto')) {
            // Eliminar logo anterior si existe
            if ($docente->foto && Storage::disk('public')->exists('images/' . $docente->foto)) {
                Storage::disk('public')->delete('docentes/' . $docente->foto);
            }

            // Guardar nuevo archivo
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put('docentes/' . $filename, file_get_contents($file));
            $docente->foto = $filename;
        }

        $docente->save();

           return redirect()->route('admin.docentes.index')
               ->with('mensaje', 'Docente creado correctamente.')
               ->with('icono', 'success')
               ->with('title', 'Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Muestra los datos del docente vinculado con la formacion
        $docente = Docente::find($id);
        $formaciones = $docente->formaciones()->get();
        return view('admin.docentes.show', compact('docente', 'formaciones'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar el docente
        $docente = Docente::find($id);
        $usuario = User::find($docente->usuario_id);
        $usuario->delete();
        $docente->delete();
        // Eliminar la foto del docente
        if ($docente->foto && Storage::disk('public')->exists('docentes/' . $docente->foto)) {
            Storage::disk('public')->delete('docentes/' . $docente->foto);
        }
        return redirect()->route('admin.docentes.index')
            ->with('mensaje', 'Docente eliminado correctamente.')
            ->with('icono', 'success')
            ->with('title', 'Eliminado');
    }
}

