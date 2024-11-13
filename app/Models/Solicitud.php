<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';
    protected $fillable = ['id_empleado', 'fecha_inicio', 'fecha_fin', 'estado', 'detalles', 'aprobacion_jefe', 'aprobacion_rh'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');  // Relación de "pertenece a"
    }

}
