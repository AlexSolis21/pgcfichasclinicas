<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportsPdfController extends Controller
{
    public function reportePdfPaciente()
    {
        $user = 'Todos';
        $patients = Patient::all();
        $pdf = Pdf::loadView(
            'exports.reports-patients',
            compact('patients')
        );

       return $pdf->stream('reportePacientes.pdf');
    }

    public function reportePdfPacienteSeleccionado($patient_id)
    {
        $patient = Patient::where('id', $patient_id)->get()->first();
        $pdf = Pdf::loadView(
            'exports.reports-expedients', compact('patient')
        );
        return $pdf->stream("reporteExpediente$patient->nombres.pdf");
    }
    
}


