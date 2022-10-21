<div>

    @include('livewire.modals.expedientsModal') 

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Registro de Expedientes
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="Buscar..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#expedientsModal">
                                Agregar Nuevo Registro
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Paciente</th>
                                    <th>Número de Expediente Clínico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                              <tbody>
                                @forelse ($expedients as $expedient )
                                <tr> 
                                    <td>{{ $expedient->patient->nombres ." ". $expedient->patient->apellidos }}</td>
                                    <td>{{ $expedient->patient->expediente_clinico }}</td>
            
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateExpedientsModal"
                                            wire:click="editExpedients({{ $expedient->id }})" class="btn btn-primary">
                                            Editar
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteExpedientsModal"
                                            wire:click="deleteExpedients({{ $expedient->id }})"
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
                             {{ $expedients->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script>
        window.addEventListener('close-modal', event => {
            const expedientsModal = document.getElementById('expedientsModal');
            const updateExpedientsModal = document.getElementById('updateExpedientsModal');
            const deleteExpedientsModal = document.getElementById('deleteExpedientsModal');

            const modal1 = bootstrap.Modal.getInstance(expedientsModal)
            const modal2 = bootstrap.Modal.getInstance(updateExpedientsModal)
            const modal3 = bootstrap.Modal.getInstance(deleteExpedientsModal)

            if (modal1 != null) modal1.hide();
            if (modal2 != null) modal2.hide();
            if (modal3 != null) modal3.hide();
        })
    </script> 
</div>