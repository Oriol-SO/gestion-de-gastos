<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo Categoria
 * 
 * Representa una categoría en el sistema.
 *
 * @package App\Models
 *
 * @property int $id ID de la categoría
 * @property string $nombre Nombre de la categoría
 * @property bool $estado Estado de la categoría (true = activo, false = inactivo)
 * 
 * @property-read Clasificacion[] $clasificaciones Lista de clasificaciones asociadas
 */
class Categoria extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'categorias';

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

    /**
     * Relación con el modelo Clasificacion.
     * 
     * Una categoría tiene muchas clasificaciones.
     *
     * @return HasMany
     */
    public function clasificaciones(): HasMany
    {
        return $this->hasMany(Clasificacion::class, 'categoria_id', 'id');
    }
}

