<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo Clasificacion
 * 
 * Representa una clasificación en el sistema.
 *
 * @package App\Models
 * 
 * @property int $id ID de la clasificación
 * @property string $nombre Nombre de la clasificación
 * @property bool $estado Estado de la clasificación (true = activo, false = inactivo)
 * @property int $categoria_id ID de la categoría relacionada
 * 
 * @property-read Categoria $categoria Relación con la tabla categorias
 */
class Clasificacion extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'clasificaciones';

    /**
     * Campos asignables en asignación masiva.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'estado',
        'categoria_id',
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
     * Relación con el modelo Categoria.
     * 
     * Una clasificación pertenece a una categoría.
     *
     * @return BelongsTo
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }


    /**
     * Relación con el modelo ClasificacionCompra.
     * 
     * Una clasificación puede tener muchos items de compra.
     * pero esto dependera de el tipo de generica de gasto que se seleccione
     *
     * @return HasMany
     */
    public function clasificacionCompras():HasMany
    {
        return $this->hasMany(ClasificacionCompra::class,'clasificacion_id','id');
    }
}
