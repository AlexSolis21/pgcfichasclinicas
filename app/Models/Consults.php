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

    public function doctor() {
        return $this->belongsTo(User::class, 'id');
    }

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

}
