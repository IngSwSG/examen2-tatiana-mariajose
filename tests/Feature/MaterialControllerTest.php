<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Categoria;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
        $categoria = Categoria::factory()->create();

        // Datos que enviaré al endpoint
        $payload = [
            'categoria_id'  => $categoria->id,
            'unidad_medida' => 'Litro',
            'descripcion'   => 'Agua destilada',
            'ubicacion'     => 'Estantería 3',
        ];

        // Llamo al endpoint y valido respuesta 
        $this->postJson('/api/materiales', $payload)
             ->assertStatus(201)
             ->assertJsonFragment([
                 'categoria_id' => $categoria->id,
                 'descripcion'  => 'Agua destilada',
             ]);

        $this->assertDatabaseHas('materiales', [
            'descripcion'  => 'Agua destilada',
            'categoria_id' => $categoria->id,
        ]);
    }

    /** @test */
    public function dadoUnMaterialSinCamposRequeridos_retornaErrorValidacion()
    {
        // Llamo al endpoint sin nada, espero errores 422 y campos invalidos
        $this->postJson('/api/materiales', [])
             ->assertStatus(422)
             ->assertJsonValidationErrors([
                 'categoria_id',
                 'unidad_medida',
                 'descripcion',
             ]);
    }
}
