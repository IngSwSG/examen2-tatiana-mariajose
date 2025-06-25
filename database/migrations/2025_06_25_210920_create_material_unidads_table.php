<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('material_unidad', function (Blueprint $table) {
            $table->id();            
            $table->unsignedInteger('cantidad');
            $table->foreignId('material_id')
                  ->constrained('materiales')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('unidad_id')
                  ->constrained('unidades')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('presupuesto_id')
                  ->nullable()
                  ->constrained('presupuestos')
                  ->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('material_unidad'); }
};