<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="patientModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Crear Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="savePatient">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>CUI</label>
                        <input type="number" wire:model.lazy="cui" class="form-control form-bord">
                        @error('cui')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>No. De Expediente Clínico</label>
                        <input type="text" wire:model.lazy="expediente_clinico" class="form-control form-bord">
                        @error('expediente_clinico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Nombres</label>
                        <input type="text" wire:model.lazy="nombres" class="form-control form-bord">
                        @error('nombres')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Apellidos</label>
                        <input type="text" wire:model.lazy="apellidos" class="form-control form-bord">
                        @error('apellidos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Sexo</label>
                        <select name="sexo" wire:model="sexo" class="form-control form-bord">
                            <option value=''>--Selecione el Sexo--</option>
                            @foreach($sexs as $sex)
                            <option value={{ $sex}}>{{ $sex}}</option>
                            @endforeach
                        </select>
                        @error('rol')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Fecha De Nacimiento</label>
                        <input type="date" wire:model.lazy="fecha_de_nacimiento" class="form-control form-bord">
                        @error('fecha_de_nacimiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Teléfono</label>
                        <input type="number" wire:model.lazy="telefono" class="form-control form-bord">
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Dirección</label>
                        <input type="text" wire:model.lazy="direccion" class="form-control form-bord">
                        @error('direccion')
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


<!-- Update patient Modal -->
<div wire:ignore.self class="modal fade" id="updatePatientModal" tabindex="-1"
    aria-labelledby="updatePatientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePatientModalLabel">Editar Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updatePatient">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>CUI</label>
                        <input type="number" wire:model.lazy="cui" class="form-control form-bord">
                        @error('cui')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>No. De Expediente Clínico</label>
                        <input type="text" wire:model.lazy="expediente_clinico" class="form-control form-bord">
                        @error('expediente_clinico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Nombres</label>
                        <input type="text" wire:model.lazy="nombres" class="form-control form-bord">
                        @error('nombres')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Apellidos</label>
                        <input type="text" wire:model.lazy="apellidos" class="form-control form-bord">
                        @error('apellidos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Sexo</label>
                        <select name="sexo" wire:model="sexo" class="form-control form-bord">
                            <option value=''>--Selecione el Sexo--</option>
                            @foreach($sexs as $sex)
                            <option value={{ $sex}}>{{ $sex}}</option>
                            @endforeach
                        </select>
                        @error('rol')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Fecha De Nacimiento</label>
                        <input type="date" wire:model.lazy="fecha_de_nacimiento" class="form-control form-bord">
                        @error('fecha_de_nacimiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Teléfono</label>
                        <input type="number" wire:model.lazy="telefono" class="form-control form-bord">
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Dirección</label>
                        <input type="text" wire:model.lazy="direccion" class="form-control form-bord">
                        @error('direccion')
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

<!-- Delete Patient Modal -->
<div wire:ignore.self class="modal fade" id="deletePatientModal" tabindex="-1"
    aria-labelledby="deletePatientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePatientModalLabel">Eliminar Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyPatient">
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
