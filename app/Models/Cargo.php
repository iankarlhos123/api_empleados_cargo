<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_cargo',
        'salario_base',
        'estado',
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_cargo');
    }

    public function funciones()
    {
        return $this->hasMany(FuncionCargo::class, 'id_cargo');
    }
}
