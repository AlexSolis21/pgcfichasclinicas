<div>

    @include('livewire.modals.citasModal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Citas
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="Buscar..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#citasModal">
                                Agregar Nueva Cita
                            </button>
                        </h4>
                    </div>
                    <div class="table-bordered table-responsive container">
                        <table class="table-sm align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" class="w-8">Paciente</th>
                                    <th scope="col" class="w-8">Fecha De La Cita</th>
                                    <th scope="col" class="w-8">Hora De La Cita</th>
                                    <th scope="col" class="w-8">Descripcion</th>
                                    <th scope="col" class="w-8">Acciones</th>
                                </tr>

                            </thead>
                            <tbody>
                                @forelse ($dates as $date)
                                <tr>

                                    <td class="align-top">
                                        {{ $date->patient->nombres . ' ' . $date->patient->apellidos }}</td>
                                    <td class="align-top">{{ $date->fecha_cita }}</td>
                                    <td class="align-top">{{ $date->hora_cita }}</td>
                                    <td class="align-top">{{ $date->descripcion }}</td>

                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateCitasModal"
                                            wire:click="editCitas({{ $date->id }})" class="btn btn-primary">
                                            Editar
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteCitasModal"
                                            wire:click="deleteCitas({{ $date->id }})"
                                            class="btn btn-danger">Eliminar</button>

                                    </td>

                                </tr>

                                @empty
                                <tr>
                                    <td colspan="5">No se ha encontrado ningúna cita</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $dates->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('close-modal', event => {
            const citasModal = document.getElementById('citasModal');
            const updateCitasModal = document.getElementById('updateCitasModal');
            const deleteCitasModal = document.getElementById('deleteCitasModal');

            const modal1 = bootstrap.Modal.getInstance(citasModal)
            const modal2 = bootstrap.Modal.getInstance(updateCitasModal)
            const modal3 = bootstrap.Modal.getInstance(deleteCitasModal)

            if (modal1 != null) modal1.hide();
            if (modal2 != null) modal2.hide();
            if (modal3 != null) modal3.hide();
        })

        window.addEventListener('load-select', event => {
            $('#select2').select2({
            dropdownParent: $('#citasModal')
            });
            $('#select2').on('change', function() {
                @this.set('patient_id', this.value)
            });
        })
    </script>

    <script>
        document.addEventListener('livewire:load', function() {
        $('#select2').select2({
            dropdownParent: $('#citasModal')
        });
        $('#select2').on('change', function() {
            @this.set('patient_id', this.value)
        });
    })
    </script>
</div>