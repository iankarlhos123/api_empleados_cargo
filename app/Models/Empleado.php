<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'fecha_ingreso',
        'salario',
        'estado',
        'id_cargo',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_ingreso' => 'date',
        'estado' => 'boolean',
        'salario' => 'decimal:2',
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }
}
