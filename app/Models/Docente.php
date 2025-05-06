<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    use HasFactory;
    protected $table = 'docentes';
    protected $fillable = [
        'usuario_id',
        'nombres',
        'apellidos',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'profesion',
        'direccion',
        'foto'
    ];

    // Definición de la relación con el modelo User
    // Un docente pertenece a un usuario
    // y un usuario puede tener varios docentes
    // La relación se establece a través de la clave foránea 'usuario_id'
    // en la tabla 'docentes' que hace referencia a la tabla 'users'
    // La relación se define en el modelo Docente
    // y se utiliza el método belongsTo para indicar que un docente
    // pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Definición de la relación con el modelo DocenteFormacion
    // Un docente puede tener varias formaciones
    // y una formación pertenece a un docente
    // La relación se establece a través de la clave foránea 'docente_id'
    // en la tabla 'docente_formacion' que hace referencia a la tabla 'docentes'
    // La relación se define en el modelo Docente
    // y se utiliza el método hasMany para indicar que un docente
    // puede tener varias formaciones
    public function formacion()
    {
        return $this->hasMany(DocenteFormacion::class, 'docente_id');
    }

}
