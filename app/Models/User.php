<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Modelo User
 * 
 * Representa a un usuario en el sistema.
 * 
 * @package App\Models
 *
 * @property int $id ID del usuario
 * @property string $name Nombre del usuario
 * @property string $ape_pat Apellido paterno del usuario
 * @property string $ape_mat Apellido materno del usuario
 * @property string $documento Numero de dni del usuario
 * @property string $email Correo electrónico del usuario
 * @property string|null $email_verified_at Fecha de verificación del correo (nullable)
 * @property string $password Contraseña del usuario (hash)
 * @property string|null $remember_token Token de autenticación para recordar sesión
 * @property int $rol_id id del rol de usuario
 * @property bool $estado estado del usuario activo o inactivo, depende de este si tiene acceso o no al sistema
 */
class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Atributos asignables en asignación masiva.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'ape_pat',
        'ape_mat',
        'documento',
        'email',
        'password',
        'rol_id',
        'estado',
    ];

    /**
     * Atributos ocultos en la serialización.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define los atributos que deben ser casteados a otros tipos de datos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'estado'=>'boolean'
        ];
    }
    
    /**
     * Relacion con la tabla de roles
     * 
     * un rol pertenece a un usuario
     */
    public function role():BelongsTo{
        return $this->belongsTo(Rol::class,'rol_id','id');
    }

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}

