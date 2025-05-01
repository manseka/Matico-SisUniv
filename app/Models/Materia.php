<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    //
    use HasFactory;

    protected $table = 'materias';

    protected $fillable = [
        'carrera_id',
        'nombre',
        'codigo',
    ];

    // Relación inversa con Carrera
    // Una materia pertenece a una carrera
    // En el modelo Materia, define la relación con Carrera
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
    

}
