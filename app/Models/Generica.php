<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modelo Generica
 *
 * Representa una entidad genérica en el sistema.
 *
 * @package App\Models
 *
 * @property int $id ID de la entidad genérica
 * @property string $nombre Nombre de la entidad
 * @property bool $estado Estado de la entidad (activo/inactivo)
 * @property int $categoria_id ID de la categoría asociada
 * @property bool $compras Indica si se habilita el despliegue de la lista de items para compra
 * @property Categoria $categoria Relación con el modelo Categoria
 */
class Generica extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'genericas';

    /**
     * Campos asignables en asignación masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'estado',
        'categoria_id',
        'compras',
    ];

    /**
     * Casts de atributos para asegurar el tipo correcto.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'estado' => 'boolean',
        'compras' => 'boolean',
    ];

    /**
     * Relación con el modelo Categoria.
     *
     * @return BelongsTo
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
