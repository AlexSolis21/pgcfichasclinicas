<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dates extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_cita',
        'hora_cita',
        'descripcion',
        'patient_id',
    ]; 
    
    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

}
