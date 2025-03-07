<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo ComprobanteTipo
 *
 * Representa los tipos de comprobante en el sistema.
 *
 * @package App\Models
 *
 * @property int $id ID del tipo de comprobante
 * @property string $nombre Nombre del tipo de comprobante
 * @property bool $estado Estado del tipo de comprobante (activo/inactivo)
 */
class ComprobanteTipo extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'comprobante_tipos';

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