<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Clase Rol
 *
 * Representa un rol dentro del sistema.
 *
 * @property int $id Identificador único del rol.
 * @property string $nombre Nombre del rol.
 * @property bool $estado Estado actual del rol activo o inactivo
 *
 */
class Rol extends Model
{
    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Atributos que se pueden asignar de forma masiva.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'estado',
    ];

    /**
     * Relación uno a muchos con el modelo User.
     *
     * Obtiene los usuarios que pertenecen a este rol.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
