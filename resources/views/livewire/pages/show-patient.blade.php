<div class="">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4 mt-105">
           
            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-6">
                    <h2>{{$patient->cui}} </h2>
                    <p>{{$patient->expediente_clinico}}</p>
                
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

                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
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