<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Categoria.php
class Categoria extends Model
{
    protected $table   = 'categorias';
    protected $fillable = ['nombre'];

    public function materiales()
    {
        return $this->hasMany(Material::class);
    }
}
