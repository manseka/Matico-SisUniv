<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteFormacion extends Model
{
    //
    use HasFactory;
    protected $table = 'docentes_formacions';
    protected $fillable = [
        'docente_id',
        'titulo',
        'nivel',
        'institucion',
        'ano_graduacion',
        'archivo'
    ];

    // Definición de la relación con el modelo Docente
    // Un docente puede tener varias formaciones
    // y una formación pertenece a un docente
    // La relación se establece a través de la clave foránea 'docente_id'
    // en la tabla 'docente_formacion' que hace referencia a la tabla 'docentes'
    // La relación se define en el modelo DocenteFormacion
    // y se utiliza el método belongsTo para indicar que una formación
    // pertenece a un docente
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }
}
