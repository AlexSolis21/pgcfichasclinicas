<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedients extends Model
{
    use HasFactory;
    
    protected $fillable = [
       
        'enfermedad_actual',
        'presion_arterial',
        'frecuencia_cardiaca',
        'frecuencia_respiratoria',
        'saturacion',
        'temperatura',
        'peso',
        'estatura',
        'piel',
        'cabeza',
        'ojos',
        'nariz',
        'boca',
        'cuello',
        'torax',
        'pulmones',
        'corazon',
        'abdomen',
        'genitourinario',
        'miembros',
        'neurologico',
        'alergias',
        'traumatismos',
        'cirugias',
        'comorbilidad',
        'hospitalizacion',
        'transfusiones',
        'farmacos',
        'ginecologico_obstetrico',
        'grupo_sanguineo',
        'alcoholismo',
        'drogas',
        'alimentacion',
        'ejercicio',
        'inmunizaciones',
        'habitos',
        'padres',
        'hermanos',
        'otros_familiares',
        'diagnostico',
        'descripcion_diagnostico',
        'tratamiento',
        'evolucion',
        'observaciones',
        'user_id',
        'patient_id'
    ]; 

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }


}
