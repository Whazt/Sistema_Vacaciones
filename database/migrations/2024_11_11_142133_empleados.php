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
        //trigger para actualizar dias usados y rechazar otras solicitudes
    
        // DB::unprepared('
        // CREATE TRIGGER gestionar_solicitudes_vacaciones
        // AFTER UPDATE ON solicitudes
        // FOR EACH ROW
        // BEGIN
        //     -- Verificar que el estado cambió a "Aprobado"
        //     IF NEW.estado = "Aprobado" AND OLD.estado != "Aprobado" THEN
        //         -- Calcular los días de la solicitud aprobada
        //         UPDATE empleados
        //         SET dias_vacaciones_usados = dias_vacaciones_usados + (DATEDIFF(NEW.fecha_fin, NEW.fecha_inicio) + 1)
        //         WHERE id = NEW.id_empleado;

        //         -- Rechazar solicitudes pendientes que excedan los días disponibles
        //         UPDATE solicitudes
        //         SET estado = "Rechazada"
        //         WHERE id_empleado = NEW.id_empleado
        //         AND estado = "Pendiente"
        //         AND (DATEDIFF(fecha_fin, fecha_inicio) + 1) > (
        //             FLOOR(
        //                 FLOOR(DATEDIFF(NOW(), (
        //                     SELECT fecha_ingreso FROM empleados WHERE id = NEW.id_empleado
        //                 ))) * (30 / 365)
        //             ) - (
        //                 SELECT dias_vacaciones_usados FROM empleados WHERE id = NEW.id_empleado
        //             )
        //         );
        //     END IF;
        // END;
        // ');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
















