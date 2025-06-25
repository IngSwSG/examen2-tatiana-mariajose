<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Unidad.php
class Unidad extends Model
{
    protected $table    = 'unidades';
    protected $fillable = ['nombre'];

    public function existencias()
    {
        return $this->hasMany(MaterialUnidad::class);
    }

    public function requisiciones()
    {
        return $this->hasMany(Requisicion::class);
    }
}
