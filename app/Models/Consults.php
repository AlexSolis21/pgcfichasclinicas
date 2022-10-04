<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consults extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_consulta',
        'motivo_consulta',
        'prueba_laboratorio',
        'patient_id',
        'user_id',
    ];
}
