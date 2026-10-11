<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drama extends Model
{
    // columnas que se pueden asignar en masa (create / update)
    protected $fillable = [
        'titulo',
        'sinopsis',
        'anio',
        'estado',
        'calificacion',
        'genero_id',
    ];

    public function genero(): BelongsTo
    {
        return $this->belongsTo(Genero::class);
    }
}
