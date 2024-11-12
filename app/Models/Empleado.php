<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = ['nombre', 'descripcion', 'id_area'];

    public function area()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');  // Relación de "pertenece a"
    }
}
