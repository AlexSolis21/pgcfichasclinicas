<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cui',
        'expediente_clinico',
        'nombres',
        'apellidos',
        'sexo',
        'fecha_de_nacimiento',
        'telefono',
        'direccion',
    ]; 

    public function dates() {
        return $this->hasMany(Dates::class, 'patient_id');
    }

    public function consults() {
        return $this->hasMany(Consults::class, 'patient_id');
    }


}
