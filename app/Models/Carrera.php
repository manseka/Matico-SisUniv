<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    use HasFactory;
    protected $table = 'carreras';
    protected $fillable = [
        'nombre',
    ];


    // Relación uno a muchos con Materia
    // Una carrera puede tener muchas materias
    // y una materia pertenece a una carrera
    // En el modelo Carrera, define la relación con Materia
    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
}
