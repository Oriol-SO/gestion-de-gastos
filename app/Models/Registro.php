<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo Registro
 *
 * Representa un registro financiero con sus respectivas categorías y relaciones.
 *
 * @package App\Models
 *
 * @property int $id ID del registro
 * @property string $fecha Fecha del registro
 * @property string $descripcion Descripción del registro
 * @property string|null $ordenes Ordenes asociadas
 * @property string|null $proveedor Proveedor relacionado
 * @property string $empresa Empresa relacionada
 * @property float|null $gasto Monto del gasto
 * @property float|null $ingreso Monto del ingreso
 * @property float|null $capital Monto de capital
 * @property float|null $utilidad Monto de utilidad
 * @property int $categoria_id Relación con la tabla categorias
 * @property int $clasificacion_id Relación con la tabla clasificaciones
 * @property int|null $generica_id Relación con la tabla genericas
 * @property int|null $clasificacioncompra_id Relación con la tabla clasificacion_compras
 * @property int|null $insumo_id Relación con la tabla insumos
 * @property int|null $detalle_id Relación con la tabla detalles
 * @property int|null $cuentatipo_id Relación con la tabla cuenta_tipos
 * @property int|null $comprobante_id Relación con la tabla comprobante_tipos
 * @property int|null $transaccion_id Relación con la tabla transaccion_tipos
 */
class Registro extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'registros';

    /**
     * Campos asignables en asignación masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha',
        'descripcion',
        'ordenes',
        'proveedor',
        'empresa',
        'gasto',
        'ingreso',
        'capital',
        'utilidad',
        'categoria_id',
        'clasificacion_id',
        'generica_id',
        'clasificacioncompra_id',
        'insumo_id',
        'detalle_id',
        'cuentatipo_id',
        'comprobante_id',
        'transaccion_id',
    ];

    /**
     * Casts de atributos para asegurar el tipo correcto.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha' => 'date',
        'gasto' => 'double',
        'ingreso' => 'double',
        'capital' => 'double',
        'utilidad' => 'double',
    ];

    /**
     * Relación con Categoría.
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    /**
     * Relación con Clasificación.
     */
    public function clasificacion(): BelongsTo
    {
        return $this->belongsTo(Clasificacion::class, 'clasificacion_id');
    }

    /**
     * Relación con Genérica.
     */
    public function generica(): BelongsTo
    {
        return $this->belongsTo(Generica::class, 'generica_id');
    }

    /**
     * Relación con con los items de compra.
     */
    public function clasificacionCompra(): BelongsTo
    {
        return $this->belongsTo(ClasificacionCompra::class, 'clasificacioncompra_id');
    }

    /**
     * Relación con Insumo.
     */
    public function insumo(): BelongsTo
    {
        return $this->belongsTo(Insumo::class, 'insumo_id');
    }

    /**
     * Relación con Detalle.
     */
    public function detalle(): BelongsTo
    {
        return $this->belongsTo(Detalle::class, 'detalle_id');
    }

    /**
     * Relación con Tipo de Cuenta.
     */
    public function cuentaTipo(): BelongsTo
    {
        return $this->belongsTo(CuentaTipo::class, 'cuentatipo_id');
    }

    /**
     * Relación con Comprobante.
     */
    public function comprobante(): BelongsTo
    {
        return $this->belongsTo(ComprobanteTipo::class, 'comprobante_id');
    }

    /**
     * Relación con Tipo de Transacción.
     */
    public function transaccionTipo(): BelongsTo
    {
        return $this->belongsTo(TransaccionTipo::class, 'transaccion_id');
    }
}
