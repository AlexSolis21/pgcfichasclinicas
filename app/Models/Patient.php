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
}
