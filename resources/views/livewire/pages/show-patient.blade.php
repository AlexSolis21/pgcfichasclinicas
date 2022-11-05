<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4 mt-105">

            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="col-sm-4">
                            <a href="{{ url("/pacientes/reportes/$patient->id/pdf") }}" class="btn btn-primary"
                                target="_blank">
                                Descargar PDF
                            </a>
                            <link rel="stylesheet"
                                href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
                                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                                crossorigin="anonymous">
                        </div>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            <h4 class="text-dark text-center">Datos del Paciente:</h4>
                                            <div class="p-3">
                                        </button>
                                    </h5>
                                </div>
                                {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <table class="table table-borderd table-striped">
                                            <th class="text-left text-dark p-1">CUI: {{ $patient->cui }} </th>
                                        </table>
                                        {{--
                                        </div> --}}
                                        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
                                        <table class="table table-borderd table-striped">
                                            <th class="text-left text-dark p-1">No. Expediente Clinico:
                                                {{ $patient->expediente_clinico }} </th>
                                        </table>
                                        {{--
                                        </div> --}}
                                        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
                                        <table class="table table-borderd table-striped">
                                            <th class="text-left text-dark p-1">Nombres: {{ $patient->nombres }}
                                            </th>
                                        </table>
                                        {{--
                                        </div> --}}
                                        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
                                        <table class="table table-borderd table-striped">
                                            <th class="text-left text-dark p-1">Apellidos:
                                                {{ $patient->apellidos }} </th>
                                        </table>
                                        {{--
                                        </div> --}}
                                        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
                                        <table class="table table-borderd table-striped">
                                            <th class="text-left text-dark p-1">Sexo: {{ $patient->sexo }} </th>
                                        </table>
                                        {{--
                                        </div> --}}
                                        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
                                        <table class="table table-borderd table-striped">
                                            <th class="text-left text-dark p-1">Fecha de Nacimiento:
                                                {{ $patient->fecha_de_nacimiento }} </th>
                                        </table>
                                        {{--
                                        </div> --}}
                                        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
                                        <table class="table table-borderd table-striped">
                                            <th class="text-left text-dark p-1">Telefono:
                                                {{ $patient->telefono }} </th>
                                        </table>
                                        {{--
                                        </div> --}}
                                        {{-- <div class="shadow p-3 mb-2 text-black rounded border border-dark"> --}}
                                        <table class="table table-borderd table-striped">
                                            <th class="text-left text-dark p-1">Direccion:
                                                {{ $patient->direccion }} </th>
                                        </table>
                                        {{--
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">

                                        <h4 class="text-dark text-center">Citas del Paciente:</h4>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <table class="table table-borderd table-striped">
                                        <thead>
                                            <tr>
                                                <th>Fecha De La Cita</th>
                                                <th>Hora De La Citaaaa</th>
                                                <th>Descripcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($patient->dates as $row)
                                                <tr>
                                                    <td>{{ $row->fecha_cita }}</td>
                                                    <td>{{ $row->hora_cita }}</td>
                                                    <td>{{ $row->descripcion }}</td>
                                                </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="5">No se ha encontrado ningún registro</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="text-dark text-center">Consultas del Paciente:</h4>
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha de Consulta</th>
                                    <th>Motivo de Consulta</th>
                                    <th>Pruebas de Laboratorio</th>
                                    <th>Prueba</th>
                                    <th>Atendido Por:</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($patient->consults as $row)
                                    <tr>
                                        <td>{{ $row->fecha_consulta }}</td>
                                        <td>{{ $row->motivo_consulta }}</td>
                                        <td>{{ $row->prueba_laboratorio }}</td>
                                        @if ($row->prueba_laboratorio == 'Si')
                                            <td>
                                                <div class="position-relative">
                                                    <img src="/storage/{{ $row->foto }}" width="250"
                                                        height="150" alt="profile_image"
                                                        class="border-radius-lg shadow-sm">
                                                </div>
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{ $row->doctor->nombre }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No se ha encontrado ningún registro</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}


            @foreach ($patient->expedient as $expedient => $row)
                <div class="card">
                    <div class="card-header" id="{{ $row->id }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#{{ $row->created_at }}"
                                aria-expanded="false" aria-controls="{{ $row->created_at }}">
                                <h4 class="text-dark text-center">Consulta: {{ $row->fecha_consulta }}</h4>
                            </button>
                        </h5>
                    </div>
                    <div id="{{ $row->created_at }}" class="collapse" aria-labelledby="{{ $row->id }}"
                        data-parent="#accordion">
                        <div class="card-body">

                            {{-- <div>{{ $patient->expedient }}</div> --}}

                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Control: {{ $row->control ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Médico: {{ $row->medic->nombre ?? '' }} </p>
                            </div>
                            <h5 class="text-danger text-left">Motivo de Consulta:</h5>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Enfermedad Actual: {{ $row->enfermedad_actual ?? '' }}
                                </p>
                            </div>
                            <h5 class="text-danger text-left">Signos Vitales:</h5>

                            <div class="container">
                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                    <div class="col">
                                        <p class="text-left">Presión Arterial mm Hg:</p>
                                        <div class="p-3 border bg-light">{{ $row->presion_arterial ?? '' }}
                                        </div>

                                    </div>
                                    <div class="col">
                                        <p class="text-left">Frecuencia Cárdiaca:</p>
                                        <div class="p-3 border bg-light">
                                            {{ $row->frecuencia_cardiaca ?? '' }} </div>

                                    </div>
                                    <div class="col">
                                        <p class="text-left">Frecuencia Respiratoria:</p>
                                        <div class="p-3 border bg-light">
                                            {{ $row->frecuencia_respiratoria ?? '' }}</div>
                                    </div>
                                    <div class="col">
                                        <p class="text-left">Saturación Oxígeno SaO2:</p>
                                        <div class="p-3 border bg-light"> {{ $row->saturacion ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                    <div class="col">
                                        <p class="text-left">Temperatura °C:</p>
                                        <div class="p-3 border bg-light"> {{ $row->temperatura ?? '' }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="text-left">Peso lb:</p>
                                        <div class="p-3 border bg-light">{{ $row->peso ?? '' }}</div>
                                    </div>
                                    <div class="col">
                                        <p class="text-left">Estatura M:</p>
                                        <div class="p-3 border bg-light">{{ $row->estatura ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-danger"><strong>Revision Por Sistemas</strong></h5>
                            <h5 class="text-danger"><strong>General:</strong></h5>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Piel: {{ $row->piel ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Cabeza: {{ $row->cabeza ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Ojos: {{ $row->ojos ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Náriz: {{ $row->nariz ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Boca: {{ $row->boca ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Cuello: {{ $row->cuello ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Tórax: {{ $row->torax ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Pulmones: {{ $row->pulmones ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Corazón: {{ $row->corazon ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Abdomen: {{ $row->abdomen ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Genitourinario: {{ $row->genitourinario ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Miembros: {{ $row->miembros ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Neurologico: {{ $row->neurologico ?? '' }} </p>
                            </div>
                            <h5 class="text-danger"><strong>Antecedentes Personales Patologicos:</strong></h5>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Alergias: {{ $row->alergias ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Traumatismos: {{ $row->traumatismos ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Cirugias: {{ $row->cirugias ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Antecedentes Medicos: {{ $row->comorbilidad ?? '' }}</p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Hospitalizacion: {{ $row->hospitalizacion ?? '' }}
                                </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Transfunciones: {{ $row->transfuciones ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Farmacos: {{ $row->farmacos ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Ginecologico-Obstetrico:{{ $row->ginecologico_obstetrico ?? '' }}
                                </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Grupo Sanguineo: {{ $row->grupo_sanguineo ?? '' }}</p>
                            </div>
                            <h5 class="text-danger"><strong>Antecedentes Personales No Patologicos:</strong></h5>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Alcoholismo: {{ $row->alcoholismo ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Drogas: {{ $row->drogas ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Alimentacion: {{ $row->alimentacion ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Ejercicio: {{ $row->grupo_ejercicio ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Inmunizaciones: {{ $row->inmunizaciones ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Habitos: {{ $row->grupo_habitos ?? '' }} </p>
                            </div>
                            <h5 class="text-danger"><strong>Antecedentes Familiares :</strong></h5>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Padres: {{ $row->padres ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Hermanos: {{ $row->hermanos ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Otros Familiares: {{ $row->otros_familiares ?? '' }}
                                </p>
                            </div>
                            <h5 class="text-danger"><strong>Diagnostico:</strong></h5>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Diagnostico: {{ $row->padres ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Descripcion del
                                    Diagnostico:{{ $row->descripcion_diagnostico ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Tratamiento: {{ $row->tratamiento ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Nota de Evolucion: {{ $row->evolucion ?? '' }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Observaciones: {{ $row->observaciones ?? '' }} </p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach














        </div>
    </div>

</div>
<div class="col-12 col-xl-6">

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</div>
</div>
</div>
</div>
</div>
