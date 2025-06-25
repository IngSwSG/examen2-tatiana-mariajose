<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $table = 'presupuestos';
    protected $fillable = ['nombre_presupuesto', 'unidad_id'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }

    public function materialesUnidad()
    {
        return $this->hasMany(MaterialUnidad::class, 'presupuesto_id');
    }
}