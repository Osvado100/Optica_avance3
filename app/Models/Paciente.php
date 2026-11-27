<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $fillable = [
        'fecha_ingreso',
        'nombre_completo',
        'edad',
        'direccion',
        'celular',
        'observaciones',
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
        'edad' => 'integer',
    ];
}
