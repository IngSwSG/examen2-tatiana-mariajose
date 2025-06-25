<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $table = 'material_unidad';
    protected $fillable = ['cantidad', 'material_id', 'unidad_id', 'presupuesto_id'];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'presupuesto_id');
    }
}

