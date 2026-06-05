<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionCargo extends Model
{
    use HasFactory;

    protected $table = 'funciones_cargo';

    protected $primaryKey = 'id_funcion';

    protected $fillable = [
        'descripcion_funcion',
        'estado',
        'id_cargo',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id_cargo');
    }
}