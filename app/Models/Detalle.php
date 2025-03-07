<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo Detalle
 *
 * Representa un detalle en el sistema.
 *
 * @package App\Models
 *
 * @property int $id ID del detalle
 * @property string $nombre Nombre del detalle
 * @property bool $estado Estado del detalle (activo/inactivo)
 * @property int $insumo_id ID del insumo asociado
 * @property Insumo $insumo Relación con el modelo Insumo
 */
class Detalle extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'detalles';

    /**
     * Campos asignables en asignación masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'estado',
        'insumo_id',
    ];

    /**
     * Casts de atributos para asegurar el tipo correcto.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'estado' => 'boolean',
    ];

    /**
     * Relación con el modelo Insumo.
     *
     * @return BelongsTo
     */
    public function insumo(): BelongsTo
    {
        return $this->belongsTo(Insumo::class, 'insumo_id', 'id');
    }
}
