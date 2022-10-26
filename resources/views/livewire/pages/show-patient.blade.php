<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4 mt-105">

            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-12">
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
                        @endforelse
                    </div>
                </div>
            </div>
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
            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                <p class="text-left">Alergias: {{ $patient->expedient->alergias ?? '' }} </p>
            </div>
            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                <p class="text-left">Traumatismos: {{ $patient->expedient->traumatismos ?? '' }} </p>
            </div>
            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                <p class="text-left">Traumatismos: {{ $patient->expedient->traumatismos ?? '' }} </p>
            </div>
            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                <p class="text-left">Traumatismos: {{ $patient->expedient->traumatismos ?? '' }} </p>
            </div>
            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                <p class="text-left">Traumatismos: {{ $patient->expedient->traumatismos ?? '' }} </p>
            </div>
            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                <p class="text-left">Traumatismos: {{ $patient->expedient->traumatismos ?? '' }} </p>
            </div>
            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                <p class="text-left">Traumatismos: {{ $patient->expedient->traumatismos ?? '' }} </p>
            </div>
            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                <p class="text-left">Traumatismos: {{ $patient->expedient->traumatismos ?? '' }} </p>
            </div>
            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                <p class="text-left">Traumatismos: {{ $patient->expedient->traumatismos ?? '' }} </p>
            </div>
        </div>


    </div>
    <div class="col-12 col-xl-6">

    </div>
</div>
</div>
</div>
</div>
</div>
