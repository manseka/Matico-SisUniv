<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all records from the 'administrativos' table
        $administrativos = Administrativo::all();
        // Return the view with the list of administrativos
        return view('admin.administrativos.index', compact('administrativos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();
        // Return the view with the list of roles
        return view('admin.administrativos.create', compact('roles'));
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
    'dni' => 'required|digits_between:7,8|unique:administrativos,dni',
    'fecha_nacimiento' => 'required|date',
    'telefono' => 'required|string|max:20',
    'direccion' => 'required|string|max:255',
    'profesion' => 'required|string|max:100',
    'email' => 'required|email|unique:users,email',
]);

    // Crear el nuevo usuario
    $usuario = new User();
    $usuario->name = $request->nombre  . ' ' . $request->apellido;
    $usuario->email = $request->email;
    $usuario->password = bcrypt($request->dni);
    $usuario->save();

    // Asignar el rol al usuario
    $usuario->assignRole($request->rol);

    // Crear el administrativo asociado
    $administrativo = new Administrativo();
    $administrativo->usuario_id = $usuario->id;
    $administrativo->nombre = $request->nombre;
    $administrativo->apellido = $request->apellido;
    $administrativo->dni = $request->dni;
    $administrativo->fecha_nacimiento = $request->fecha_nacimiento;
    $administrativo->telefono = $request->telefono;
    $administrativo->direccion = $request->direccion;
    $administrativo->profesion = $request->profesion;
    $administrativo->save();

    return redirect()->route('admin.administrativos.index')
        ->with('mensaje', 'Administrativo creado correctamente.')
        ->with('icono', 'success')
        ->with('title', 'Creado');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
            //
            $roles = Role::all();
            $administrativo = Administrativo::find($id);
            if (!$administrativo) {
                return redirect()->route('admin.administrativos.index')
                    ->with('mensaje', 'Administrativo no encontrado.')
                    ->with('icono', 'error')
                    ->with('title', 'Error');
            }
            return view('admin.administrativos.show', compact('administrativo', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $roles = Role::all();
    // Verificar si el administrativo existe
    $administrativo = Administrativo::findOrFail($id);
   // dd($administrativo); // <--- Esto mostrará el contenido y cortará la ejecución


    return view('admin.administrativos.edit', compact('administrativo', 'roles'));
}
    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, $id)
    {
        //
         // Validación
         $administrativo = Administrativo::findOrFail($id);
    // Verificar si el administrativo existe
    if (!$administrativo) {
        return redirect()->route('admin.administrativos.index')
            ->with('mensaje', 'Administrativo no encontrado.')
            ->with('icono', 'error')
            ->with('title', 'Error');
    }
    $request->validate([
        'rol' => 'required|exists:roles,name',
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'dni' => 'required|digits_between:7,8|unique:administrativos,dni,' . $administrativo->id,
        'fecha_nacimiento' => 'required|date',
        'telefono' => 'required|string|max:20',
        'direccion' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $administrativo->usuario->id,
        'profesion' => 'required|string|max:255',
    ]);



    // Actualización de datos
    $usuario = $administrativo->usuario;
    $usuario->name = $request->nombre . ' ' . $request->apellido;
    $usuario->email = $request->email;
    $usuario->password = bcrypt($request->dni);
    $usuario->save();

    $usuario->syncRoles([$request->rol]);

    // Actualizar el administrativo
    $administrativo->usuario_id = $usuario->id;
    $administrativo->nombre = $request->nombre;
    $administrativo->apellido = $request->apellido;
    $administrativo->dni = $request->dni;
    $administrativo->fecha_nacimiento = $request->fecha_nacimiento;
    $administrativo->telefono = $request->telefono;
    $administrativo->direccion = $request->direccion;
    $administrativo->profesion = $request->profesion;
    $administrativo->save();
    // Redirigir a la lista de administrativos con un mensaje de éxito

    return redirect()->route('admin.administrativos.index')
    ->with('mensaje', 'Administrativo Actualizado correctamente.')
    ->with('icono', 'success')
    ->with('title', 'Eliminado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $administrativo = Administrativo::findOrFail($id);
        if (!$administrativo) {
            return redirect()->route('admin.administrativos.index')
                ->with('mensaje', 'Administrativo no encontrado.')
                ->with('icono', 'error')
                ->with('title', 'Error');
        }
        $usuario = User::findOrFail($administrativo->usuario_id);
        $usuario->delete();
        $administrativo->delete();

        return redirect()->route('admin.administrativos.index')
            ->with('mensaje', 'Administrativo eliminado correctamente.')
            ->with('icono', 'success')
            ->with('title', 'Eliminado');
    }
}
