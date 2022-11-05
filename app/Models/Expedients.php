<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedients extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fecha_consulta',
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
        'prueba_laboratorio',
        'foto',
        'user_id',
        'control',
        'patient_id'
    ]; 

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function medic() {
        return $this->belongsTo(User::class, 'user_id');
    }


}
