<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4 mt-105">

            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-12">
                       <h4 class="text-center">Datos del Paciente</h4>
                        <div class="">
                            <div>
                                <p class="text-dark">CUI: {{ $patient->cui }} </p>
                                <p class="text-dark">No. Expediente Clinico: {{ $patient->cui }} </p>
                                <p class="text-dark">Nombres: {{ $patient->nombres }} </p>
                                <p class="text-dark">Apellidos: {{ $patient->apellidos }} </p>
                                <p class="text-dark">Sexo: {{ $patient->sexo }} </p>
                                <p class="text-dark">Fecha de Nacimiento: {{ $patient->fecha_de_nacimiento }} </p>
                                <p class="text-dark">Telefono: {{ $patient->telefono }} </p>
                                <p class="text-dark">Direccion: {{ $patient->direccion }} </p>
                              
                            </div>
                            
                        </div>
                        <div>
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


                </div>
                <div class="col-12 col-xl-6">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
