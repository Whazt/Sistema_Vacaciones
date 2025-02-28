<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->unique();
            $table->integer('id_cargo')->nullable();
            $table->date('fecha_ingreso');
            $table->integer('dias_vacaciones_usados')->nullable();
            $table->string('telefono');
            $table->string('id_jefe')->nullable();
            $table->string('estado')->default('activo')->nullable();
            $table->timestamps();
        });
      
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
















