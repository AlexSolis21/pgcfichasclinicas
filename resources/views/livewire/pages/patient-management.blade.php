<div>

    @include('livewire.modals.patientModal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Registro de Pacientes
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="Buscar..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#patientModal">
                                Agregar Nuevo Paciente
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Sexo</th>
                                    <th>Fecha De Nacimiento</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->nombres }}</td>
                                    <td>{{ $patient->apellidos }}</td>
                                    <td>{{ $patient->sexo }}</td>
                                    <td>{{ $patient->fecha_de_nacimiento}}</td>
                                    <td>{{ $patient->direccion }}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updatePatientModal"
                                            wire:click="editPatient({{ $patient->id }})" class="btn btn-primary">
                                            Editar
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deletePatientModal"
                                            wire:click="deletePatient({{ $patient->id }})"
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
                            {{ $patients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('close-modal', event => {
            const patientModal = document.getElementById('patientModal');
            const updatePatientModal = document.getElementById('updatePatientModal');
            const deletePatientModal = document.getElementById('deletePatientModal');

            const modal1 = bootstrap.Modal.getInstance(patientModal)
            const modal2 = bootstrap.Modal.getInstance(updatePatientModal)
            const modal3 = bootstrap.Modal.getInstance(deletePatientModal)

            if (modal1 != null) modal1.hide();
            if (modal2 != null) modal2.hide();
            if (modal3 != null) modal3.hide();
        })
    </script>
</div>