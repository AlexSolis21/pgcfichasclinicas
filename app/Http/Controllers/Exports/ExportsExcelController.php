<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Rap2hpoutre\FastExcel\FastExcel;

class ExportsExcelController extends Controller
{
    public function reporteExcelPaciente()
    {
        return (new FastExcel(Patient::all()))->download('pacientesregistrados.xlsx', function ($patient) {
            return [
                'CUI' => $patient->cui,
                'Expediente Clinico' => $patient->expediente_clinico,
                'Nombres' => $patient->nombres,
                'Apellidos' => $patient->apellidos,
                'Sexo' => $patient->sexo,
                'Fecha De Nacimiento' => $patient->fecha_de_nacimiento,
                'Telefono' => $patient->telefono,
                'Direccion' => $patient->direccion,
                'Fecha de Registro' =>  \Carbon\Carbon::parse($patient->created_at)->format('d-m-Y')
            ];
        });
    }
}
