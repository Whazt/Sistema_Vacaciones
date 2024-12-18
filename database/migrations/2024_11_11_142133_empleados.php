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
        //trigger para actualizar dias usados 
        DB::unprepared('
        CREATE TRIGGER restar_dias_vacaciones
        AFTER UPDATE ON solicitudes
        FOR EACH ROW
        BEGIN
            -- Verificar que el estado cambió a "Aprobado"
            IF NEW.estado = "Aprobado" AND OLD.estado != "Aprobado" THEN
                DECLARE dias INT;

                -- Calcular los días totales entre fecha_inicio y fecha_fin (incluyendo ambos días)
                SET dias = DATEDIFF(NEW.fecha_fin, NEW.fecha_inicio) + 1;

                -- Restar los días calculados al empleado que realizó la solicitud
                UPDATE empleados
                SET dias_vacaciones_usados = dias_vacaciones_usados + dias
                WHERE id = NEW.id_empleado;
            END IF;
        END
        '); 
    }  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
