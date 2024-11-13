<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cargo;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $fillable = ['nombre', 'descripcion'];

    public function cargos()
    {
        return $this->hasMany(Cargo::class);  // Relación de "tiene muchos"
    }
}
