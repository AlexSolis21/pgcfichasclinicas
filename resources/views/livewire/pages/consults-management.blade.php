<div>

    @include('livewire.modals.consultsModal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Registro De Consultas
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="Buscar..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#consultsModal">
                                Agregar Nuevo Registro
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Paciente</th>
                                    <th>Médico Que Atendió</th>
                                    <th>Fecha de Consulta</th>
                                    <th>Motivo de Consulta</th>
                                    <th>Solicitó Pruebas de Laboratorio?</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($consults as $consult)
                                <tr>
                                    <td>{{ $consult->patient_id }}</td>
                                    <td>{{ $consult->user_id }}</td>
                                    <td>{{ $consult->fecha_consulta }}</td>
                                    <td>{{ $consult->motivo_consulta }}</td>
                                    <td>{{ $consult->prueba_laboratorio }}</td>
            
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateConsultsModal"
                                            wire:click="editConsults({{ $consult->id }})" class="btn btn-primary">
                                            Editar
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteConsultsModal"
                                            wire:click="deleteConsults({{ $consult->id }})"
                                            class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No se ha encontrado ningún registro</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $consults->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('close-modal', event => {
            const consultsModal = document.getElementById('consultsModal');
            const updateConsultsModal = document.getElementById('updateConsultsModal');
            const deleteConsultsModal = document.getElementById('deleteConsultsModal');

            const modal1 = bootstrap.Modal.getInstance(consultsModal)
            const modal2 = bootstrap.Modal.getInstance(updateConsultsModal)
            const modal3 = bootstrap.Modal.getInstance(deleteConsultsModal)

            if (modal1 != null) modal1.hide();
            if (modal2 != null) modal2.hide();
            if (modal3 != null) modal3.hide();
        })
    </script>
</div>