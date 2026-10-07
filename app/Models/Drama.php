<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drama extends Model
{
    // columnas que se pueden asignar en masa (create / update)
    protected $fillable = [
        'titulo',
        'sinopsis',
        'anio',
        'estado',
        'calificacion',
    ];

}
