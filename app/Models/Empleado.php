<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';

    protected $fillable = ['nombre', 'descripcion', 'correo', 'id_cargo','fecha_ingreso','dias_vacaciones_usados' , 'telefono','id_jefe', 'estado'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');  // Relación de "pertenece a"
    }

    


}
