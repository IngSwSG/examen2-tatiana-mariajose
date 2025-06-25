<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('requisiciones', function (Blueprint $table) {
            $table->id();                        
            $table->dateTime('fecha');
            $table->string('estado');           
            $table->foreignId('usuario_id')
                  ->constrained('users')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('requisiciones'); }
};
