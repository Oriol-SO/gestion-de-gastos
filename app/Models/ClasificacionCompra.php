<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo ClasificacionCompra
 * 
 * Representa un item de compra en el sistema.
 *
 * @package App\Models
 * 
 * @property int $id ID del item de compra
 * @property string $nombre Nombre del item de compra
 * @property bool $estado Estado del item de compra (true = activo, false = inactivo)
 * @property int $clasificacion_id ID de la clasificación relacionada
 * 
 * @property-read Clasificacion $clasificacion Relación con la tabla clasificaciones
 */
class ClasificacionCompra extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'clasificacion_compras';

    /**
     * Campos asignables en asignación masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'estado',
        'clasificacion_id'
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
     * Relación con el modelo Clasificacion.
     * 
     * Una item de compra pertenece a una clasificación.
     * Esta lista de items solo se desplegara si la generica de gasto tiene habilitada la opcion de compras
     *
     * @return BelongsTo 
     * 
     */
    public function clasificacion(): BelongsTo
    {
        return $this->belongsTo(Clasificacion::class, 'clasificacion_id', 'id');
    }
}
