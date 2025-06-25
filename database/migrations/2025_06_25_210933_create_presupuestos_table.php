<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();                      
            $table->string('nombre_presupuesto');
            $table->foreignId('unidad_id')
                  ->constrained('unidades')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('presupuestos'); }
};