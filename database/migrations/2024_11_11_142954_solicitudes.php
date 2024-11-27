<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empleado');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado')->default('Pendiente')->nullable();
            $table->string('detalles');
            $table->date('aprobacion_jefe')->nullable();
            $table->date('aprobacion_rh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
