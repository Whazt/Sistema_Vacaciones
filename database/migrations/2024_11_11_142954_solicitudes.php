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



        // trigger restar vacaciones//

        // DELIMITER $$

        // CREATE TRIGGER after_solicitud_update
        // AFTER UPDATE ON solicitudes
        // FOR EACH ROW
        // BEGIN
        //     -- Solo actualiza si el estado cambia a 'Aprobado'
        //     IF NEW.estado = 'Aprobada' THEN
        //         -- Suma los días directamente en la actualización
        //         UPDATE empleados
        //         SET dias_vacaciones_usados = dias_vacaciones_usados + DATEDIFF(NEW.fecha_fin, NEW.fecha_inicio) + 1
        //         WHERE id = NEW.id_empleado;

        //         CALL rechazar_solicitudes(NEW.id_empleado);
        
        //     END IF;
        // END$$

        // DELIMITER ;


        //Procedimiento almacenado para rechazar solicitudes despues de aprobar si no hay dias disponibles suficientes//

        // DELIMITER $$

        // CREATE PROCEDURE rechazar_solicitudes(IN empleado_id INT)
        // BEGIN
        //     DECLARE fecha_ingreso DATE;
        //     DECLARE dias_usados INT;
        //     DECLARE dias_disponibles INT;
        //     DECLARE solicitud_id INT;
        //     DECLARE dias_solicitados INT;

        //     -- Cursor para recorrer las solicitudes pendientes
        //     DECLARE cursor_solicitudes CURSOR FOR
        //         SELECT id, DATEDIFF(fecha_fin, fecha_inicio) + 1 AS dias_solicitados
        //         FROM solicitudes
        //         WHERE id_empleado = empleado_id AND estado = 'Pendiente';

        //     -- Control para manejar el final del cursor
        //     DECLARE CONTINUE HANDLER FOR NOT FOUND SET solicitud_id = NULL;

        //     -- Obtener la fecha de ingreso y días usados del empleado
        //     SELECT fecha_ingreso, dias_vacaciones_usados
        //     INTO fecha_ingreso, dias_usados
        //     FROM empleados
        //     WHERE id = empleado_id;

        //     -- Calcular los días trabajados
        //     SET @dias_trabajados = DATEDIFF(CURDATE(), fecha_ingreso);

        //     -- Calcular las vacaciones acumuladas
        //     SET @tasa_diaria_vacaciones = 30 / 365.0;
        //     SET @vacaciones_acumuladas = FLOOR(@dias_trabajados * @tasa_diaria_vacaciones);

        //     -- Calcular los días disponibles
        //     SET dias_disponibles = @vacaciones_acumuladas - dias_usados;

        //     -- Abrir el cursor
        //     OPEN cursor_solicitudes;

        //     leer_solicitud: LOOP
        //         -- Obtener cada solicitud pendiente
        //         FETCH cursor_solicitudes INTO solicitud_id, dias_solicitados;

        //         -- Si no hay más solicitudes, salir del loop
        //         IF solicitud_id IS NULL THEN
        //             LEAVE leer_solicitud;
        //         END IF;

        //         -- Verificar si los días solicitados exceden los días disponibles
        //         IF dias_solicitados > dias_disponibles THEN
        //             -- Rechazar la solicitud
        //             UPDATE solicitudes
        //             SET estado = 'Rechazado'
        //             WHERE id = solicitud_id;
        //         ELSE
        //             -- Reducir los días disponibles
        //             SET dias_disponibles = dias_disponibles - dias_solicitados;
        //         END IF;
        //     END LOOP;

        //     -- Cerrar el cursor
        //     CLOSE cursor_solicitudes;
        // END$$

        // DELIMITER ;

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
