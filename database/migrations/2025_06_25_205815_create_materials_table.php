<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();              
            $table->string('unidad_medida');
            $table->string('descripcion')->nullable();
            $table->string('ubicacion')->nullable();
            $table->foreignId('categoria_id')
                  ->constrained('categorias')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('materiales'); }
};
