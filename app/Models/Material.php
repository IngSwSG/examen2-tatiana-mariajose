<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materiales';
    protected $fillable = [
        'unidad_medida', 'descripcion', 'ubicacion', 'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function materialesUnidad()
    {
        return $this->hasMany(MaterialUnidad::class, 'material_id');
    }
}