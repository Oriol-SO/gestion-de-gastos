<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo TransaccionTipo
 *
 * Representa los tipos de transacciones en el sistema.
 *
 * @package App\Models
 *
 * @property int $id ID del tipo de transacción
 * @property string $nombre Nombre del tipo de transacción
 * @property bool $estado Estado del tipo de transacción (activo/inactivo)
 */
class TransaccionTipo extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'transaccion_tipos';

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
