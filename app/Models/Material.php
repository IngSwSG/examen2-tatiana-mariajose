<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Material.php
class Material extends Model
{
    protected $table    = 'materiales';
    protected $fillable = [
        'categoria_id',
        'unidad_medida',
        'descripcion',
        'ubicacion'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function existencias()
    {
        return $this->hasMany(MaterialUnidad::class);
    }
}
