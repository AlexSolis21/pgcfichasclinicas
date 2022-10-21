<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4 mt-105">

            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-12">
                       <h4 class="text-center">Datos del Paciente</h4>
                        <div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                            <p class="text-left">CUI: {{ $patient->cui }} </p>
                            </div>
                           <div class="shadow p-3 mb-2 text-black rounded border border-dark"> 
                                <p class="text-left">No. Expediente Clinico: {{ $patient->expediente_clinico }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Nombres: {{ $patient->nombres }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Apellidos: {{ $patient->apellidos }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">    
                                <p class="text-left">Sexo: {{ $patient->sexo }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark"> 
                                <p class="text-left">Fecha de Nacimiento: {{ $patient->fecha_de_nacimiento }} </p>
                            </div>
                            <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Telefono: {{ $patient->telefono }} </p>
                            </div>
                            <Div class="shadow p-3 mb-2 text-black rounded border border-dark">
                                <p class="text-left">Direccion: {{ $patient->direccion }} </p>
                            </div>
                        </div>
                            <h4 class="text-center">Citas del Paciente</h4>
                            <table class="table table-borderd table-striped">
                                <thead>
                                    <tr>
                                        <th>Fecha de la Cita</th>
                                        <th>Hora de la Cita</th>
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
                <h4 class="text-center">Consultas del Paciente</h4>
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

                    <h4 class="text-center">Expediente</h4>
                    <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                        <p class="text-left">CUI: {{ $patient->expedient->enfermedad_actual}} </p>
                        </div>
                        <div class="shadow p-3 mb-2 text-black rounded border border-dark">
                            <p class="text-left">CUI: {{ $patient->expedient->frecuencia_cardiaca}} </p>
                            </div>

                </div>
                <div class="col-12 col-xl-6">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
