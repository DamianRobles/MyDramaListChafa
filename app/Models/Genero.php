<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genero extends Model
{
    protected $fillable = ['nombre'];

    public function dramas(): HasMany
    {
        return $this->hasMany(Drama::class);
    }
}
