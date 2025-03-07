<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo Insumo
 *
 * Representa un insumo dentro del sistema.
 *
 * @package App\Models
 *
 * @property int $id ID del insumo
 * @property string $nombre Nombre del insumo
 * @property bool $estado Estado del insumo (activo/inactivo)
 * @property int $generica_id ID de la categoría genérica asociada
 * @property Generica $generica Relación con el modelo Generica
 */
class Insumo extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'insumos';

    /**
     * Campos asignables en asignación masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'estado',
        'generica_id',
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
     * Relación con el modelo Generica.
     *
     * @return BelongsTo
     */
    public function generica(): BelongsTo
    {
        return $this->belongsTo(Generica::class, 'generica_id', 'id');
    }
}
