<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ public_path('assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <script src="{{ public_path('assets/js/core/bootstrap.min.js') }}"></script>
    {{-- <p class="text-center">Nombre {{$patient->nombres }}</p>
    <p class="text-left">Médico: {{ $patient->expedient->medic->nombre ?? '' }} </p> --}}
    <h4 class="text-danger text-center">Datos del Paciente:</h4>
    <div class="p-3">
        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark">  --}}
        <table class="table table-borderd table-striped">
            <th class="text-left text-dark p-1">CUI: {{ $patient->cui }} </th>
        </table>
        {{-- </div>  --}}
        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
        <table class="table table-borderd table-striped">
            <th class="text-left text-dark p-1">No. Expediente Clinico:
                {{ $patient->expediente_clinico }} </th>
        </table>
        {{-- </div> --}}
        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
        <table class="table table-borderd table-striped">
            <th class="text-left text-dark p-1">Nombres: {{ $patient->nombres }} </th>
        </table>
        {{-- </div> --}}
        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
        <table class="table table-borderd table-striped">
            <th class="text-left text-dark p-1">Apellidos: {{ $patient->apellidos }} </th>
        </table>
        {{-- </div> --}}
        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
        <table class="table table-borderd table-striped">
            <th class="text-left text-dark p-1">Sexo: {{ $patient->sexo }} </th>
        </table>
        {{-- </div> --}}
        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
        <table class="table table-borderd table-striped">
            <th class="text-left text-dark p-1">Fecha de Nacimiento:
                {{ $patient->fecha_de_nacimiento }} </th>
        </table>
        {{-- </div> --}}
        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
        <table class="table table-borderd table-striped">
            <th class="text-left text-dark p-1">Telefono: {{ $patient->telefono }} </th>
        </table>
        {{-- </div> --}}
        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
        <table class="table table-borderd table-striped">
            <th class="text-left text-dark p-1">Direccion: {{ $patient->direccion }} </th>
        </table>
        {{-- </div> --}}
    </div>
    <h4 class="text-danger text-center">Citas del Paciente:</h4>
    <table class="table table-borderd table-striped">
        <thead>
            <tr>
                <th>Fecha de la Cita</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patient->dates as $row)
                <tr>
                    <td>{{ $row->fecha_cita }}</td>
                </tr>

            @empty
                <tr>
                    <td colspan="5">No se ha encontrado ningún registro</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <table class="table table-borderd table-striped">
        <thead>
            <tr>
                <th>Hora de la Cita</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patient->dates as $row)
                <tr>
                    <td>{{ $row->hora_cita }}</td>
                </tr>


            @empty
                <tr>
                    <td colspan="5">No se ha encontrado ningún registro</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- 
 <table class="table table-borderd table-striped">
        <thead>
            <tr>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    @forelse ($patient->dates as $row)
        <tr>
            <td class="text-break">{{ $row->descripcion }}</td>
        </tr>

    @empty

        <tr>
            <td colspan="5">No se ha encontrado ningún registro</td>
        </tr>
    @endforelse --}}

    <h4 class="text-danger text-center">Consultas del Paciente:</h4>
    <table class="table table-borderd table-striped">
        <thead>
            <tr>
                <th>Fecha de Consulta</th>
                <th>Motivo de Consulta</th>
                <th>Pruebas de Laboratorio</th>
                <th>Atendido Por:</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($patient->consults as $row)
                <tr>
                    <td>{{ $row->fecha_consulta }}</td>
                    <td>{{ $row->motivo_consulta }}</td>
                    <td>{{ $row->prueba_laboratorio }}</td>
                    <td>{{ $row->doctor->nombre }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No se ha encontrado ningún registro</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h4 class=" text-danger text-center">Expediente Clínico:</h4>

    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Médico: {{ $patient->expedient->medic->nombre ?? '' }} </p>
    </div>
    <h5 class="text-danger text-left">Motivo de Consulta:</h5>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Enfermedad Actual: {{ $patient->expedient->enfermedad_actual ?? '' }} </p>
    </div>
    <h5 class="text-danger text-left">Signos Vitales:</h5>

    <div class="container">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
                <p class="text-left">Presión Arterial mm Hg:</p>
                <div class="p-3 border bg-light">{{ $patient->expedient->presion_arterial ?? '' }} </div>

            </div>
            <div class="col">
                <p class="text-left">Frecuencia Cárdiaca:</p>
                <div class="p-3 border bg-light"> {{ $patient->expedient->frecuencia_cardiaca ?? '' }} </div>

            </div>
            <div class="col">
                <p class="text-left">Frecuencia Respiratoria:</p>
                <div class="p-3 border bg-light">{{ $patient->expedient->frecuencia_respiratoria ?? '' }}</div>
            </div>
            <div class="col">
                <p class="text-left">Saturación Oxígeno SaO2:</p>
                <div class="p-3 border bg-light"> {{ $patient->expedient->saturacion ?? '' }}</div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
                <p class="text-left">Temperatura °C:</p>
                <div class="p-3 border bg-light"> {{ $patient->expedient->temperatura ?? '' }}</div>
            </div>
            <div class="col">
                <p class="text-left">Peso lb:</p>
                <div class="p-3 border bg-light">{{ $patient->expedient->peso ?? '' }}</div>
            </div>
            <div class="col">
                <p class="text-left">Estatura M:</p>
                <div class="p-3 border bg-light">{{ $patient->expedient->estatura ?? '' }}</div>
            </div>
        </div>
    </div>
    <h5 class="text-danger"><strong>Revision Por Sistemas</strong></h5>
    <h5 class="text-danger"><strong>General:</strong></h5>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Piel: {{ $patient->expedient->piel ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Cabeza: {{ $patient->expedient->cabeza ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Ojos: {{ $patient->expedient->ojos ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Náriz: {{ $patient->expedient->nariz ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Boca: {{ $patient->expedient->boca ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Cuello: {{ $patient->expedient->cuello ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Tórax: {{ $patient->expedient->torax ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Pulmones: {{ $patient->expedient->pulmones ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Corazón: {{ $patient->expedient->corazon ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Abdomen: {{ $patient->expedient->abdomen ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Genitourinario: {{ $patient->expedient->genitourinario ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Miembros: {{ $patient->expedient->miembros ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Neurologico: {{ $patient->expedient->neurologico ?? '' }} </p>
    </div>
    <h5 class="text-danger"><strong>Antecedentes Personales Patologicos:</strong></h5>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Alergias: {{ $patient->expedient->alergias ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Traumatismos: {{ $patient->expedient->traumatismos ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Cirugias: {{ $patient->expedient->cirugias ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Antecedentes Medicos: {{ $patient->expedient->comorbilidad ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Hospitalizacion: {{ $patient->expedient->hospitalizacion ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Transfunciones: {{ $patient->expedient->transfuciones ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Farmacos: {{ $patient->expedient->farmacos ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Ginecologico-Obstetrico: {{ $patient->expedient->ginecologico_obstetrico ?? '' }}
        </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Grupo Sanguineo: {{ $patient->expedient->grupo_sanguineo ?? '' }} </p>
    </div>
    <h5 class="text-danger"><strong>Antecedentes Personales No Patologicos:</strong></h5>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Alcoholismo: {{ $patient->expedient->alcoholismo ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Drogas: {{ $patient->expedient->drogas ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Alimentacion: {{ $patient->expedient->alimentacion ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Ejercicio: {{ $patient->expedient->grupo_ejercicio ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Inmunizaciones: {{ $patient->expedient->inmunizaciones ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Habitos: {{ $patient->expedient->grupo_habitos ?? '' }} </p>
    </div>
    <h5 class="text-danger"><strong>Antecedentes Familiares :</strong></h5>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Padres: {{ $patient->expedient->padres ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Hermanos: {{ $patient->expedient->hermanos ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Otros Familiares: {{ $patient->expedient->otros_familiares ?? '' }} </p>
    </div>
    <h5 class="text-danger"><strong>Diagnostico:</strong></h5>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Diagnostico: {{ $patient->expedient->padres ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Descripcion del Diagnostico: {{ $patient->expedient->hermanos ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Tratamiento: {{ $patient->expedient->otros_familiares ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Nota de Evolucion: {{ $patient->expedient->padres ?? '' }} </p>
    </div>
    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
        <p class="text-left">Observaciones: {{ $patient->expedient->hermanos ?? '' }} </p>
    </div>
    </div>
</body>

</html>
