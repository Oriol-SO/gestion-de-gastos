<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo CuentaTipo
 *
 * Representa los tipos de cuentas en el sistema.
 *
 * @package App\Models
 *
 * @property int $id ID del tipo de cuenta
 * @property string $nombre Nombre del tipo de cuenta
 * @property bool $estado Estado del tipo de cuenta (activo/inactivo)
 */
class CuentaTipo extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'cuenta_tipos';

    /**
     * Campos asignables en asignación masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'estado',
    ];

    /**
     * Casts de atributos para asegurar el tipo correcto.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'estado' => 'boolean',
    ];
}
