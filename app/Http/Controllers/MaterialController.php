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

public function update(Request $request, Material $material)
{
    $data = $request->validate([
        'categoria_id'  => 'sometimes|exists:categorias,id',
        'unidad_medida' => 'sometimes|string',
        'descripcion'   => 'sometimes|string',
        'ubicacion'     => 'nullable|string',
    ]);

    $material->update($data);

    return response()->json($material->load('categoria'));
}

public function index()
{
    return Material::with('categoria')->get();
}
}
