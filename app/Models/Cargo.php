<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos';

    protected $fillable = ['nombre', 'descripcion', 'id_area'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');  // Relación de "pertenece a"
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_cargo');  // Relación de "pertenece a"
    }
    
}
