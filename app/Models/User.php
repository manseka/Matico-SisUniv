<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function administrativo()
    {
        return $this->hasOne(Administrativo::class, 'usuario_id');
    }

    // Definición de la relación con el modelo Docente
    // Un docente pertenece a un usuario
    // y un usuario puede tener varios docentes
    // La relación se establece a través de la clave foránea 'usuario_id'
    // en la tabla 'docentes' que hace referencia a la tabla 'users'
    // La relación se define en el modelo User
    public function docente()
    {
        return $this->hasOne(Docente::class, 'usuario_id');
    }

}
