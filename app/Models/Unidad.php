<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidades';
    protected $fillable = ['nombre'];

 
    public function materialesUnidad()
    {
        return $this->hasMany(MaterialUnidad::class, 'unidad_id');
    }

    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class, 'unidad_id');
    }
}