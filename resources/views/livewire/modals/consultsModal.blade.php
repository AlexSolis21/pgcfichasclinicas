<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="consultsModal" tabindex="-1" aria-labelledby="consultsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="consultsModalLabel">Crear Registro De Consulta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveConsults">
                <div class="modal-body">
                 
                    <div class="mb-3">
                        <label>Seleccione Paciente</label>
                        <select name="consulta" wire:model="patient_id" class="form-control form-bord">
                            <option value=''>--Selecione Al Paciente--</option>
                            @foreach($patients as $patient)
                            <option value={{ $patient->id}}>{{ $patient->nombres . ' ' . $patient->apellidos}}</option>
                            @endforeach
                        </select>
                        @error('patient_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Seleccione Al Médico</label>
                        <select name="consulta" wire:model="user_id" class="form-control form-bord">
                            <option value=''>--Seleccione Al Médico--</option>
                            @foreach($users as $user)
                            <option value={{ $user->id}}>{{ $user->nombre}}</option>
                            @endforeach
                        </select>
                        @error('users_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Fecha De La Consulta</label>
                        <input type="date" wire:model.lazy="fecha_consulta" class="form-control form-bord">
                        @error('fecha_consulta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Motivo De Consulta</label>
                        <input type="text" wire:model.lazy="motivo_consulta" class="form-control form-bord">
                        @error('motivo_consulta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Solicita Prueba De Laboratorio</label>
                        <input type="text" wire:model.lazy="prueba_laboratorio" class="form-control form-bord">
                        @error('prueba_laboratorio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Update Consults Modal -->
<div wire:ignore.self class="modal fade" id="updateConsultsModal" tabindex="-1"
    aria-labelledby="updateConsultsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateConsultsModalLabel">Editar Registro de Consulta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateConsults">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Seleccione Paciente</label>
                        <select name="consulta" wire:model="patient_id" class="form-control form-bord">
                            <option value=''>--Selecione Al Paciente--</option>
                            @foreach($patients as $patient)
                            <option value={{ $patient->id}}>{{ $patient->nombres . ' ' . $patient->apellidos}}</option>
                            @endforeach
                        </select>
                        @error('patient_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Seleccione Al Médico</label>
                        <select name="consulta" wire:model="user_id" class="form-control form-bord">
                            <option value=''>--Seleccione Al Médico--</option>
                            @foreach($users as $user)
                            <option value={{ $user->id}}>{{ $user->nombre}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Fecha De La Consulta</label>
                        <input type="date" wire:model.lazy="fecha_consulta" class="form-control form-bord">
                        @error('fecha_consulta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Motivo De Consulta</label>
                        <input type="text" wire:model.lazy="motivo_consulta" class="form-control form-bord">
                        @error('motivo_consulta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Solicita Prueba De Laboratorio</label>
                        <input type="text" wire:model.lazy="prueba_laboratorio" class="form-control form-bord">
                        @error('prueba_laboratorio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Consults Modal -->
<div wire:ignore.self class="modal fade" id="deleteConsultsModal" tabindex="-1"
    aria-labelledby="deleteConsultsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConsultsModalLabel">Eliminar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyConsults">
                <div class="modal-body">
                    <h4>¿Está seguro de que quiere eliminar estos datos?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Sí. Borrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
