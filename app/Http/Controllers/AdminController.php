<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Gestion;
use App\Models\Nivel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {

        $gestiones_registradas= Gestion::Count();
        $carreras_registradas= Carrera::Count();
        $niveles_registrados= Nivel::Count();
        return view('admin.index', compact('gestiones_registradas','carreras_registradas','niveles_registrados'));
    }

}
