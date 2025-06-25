<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'categoria_id'  => 'required|exists:categorias,id',
        'unidad_medida' => 'required|string',
        'descripcion'   => 'required|string',
        'ubicacion'     => 'nullable|string',
    ]);

    $material = Material::create($data);

    return response()->json($material->load('categoria'), 201);
}

}
