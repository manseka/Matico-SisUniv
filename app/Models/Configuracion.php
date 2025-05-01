<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    //
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'configuracions';
    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'telefono',
        'email',
        'web',
        'logo'
    ];

}
