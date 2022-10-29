<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="citasModal" tabindex="-1" aria-labelledby="citasModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="citasModalLabel">Crear Nueva Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveCitas">
                <div class="modal-body">
                    {{-- <div class="mb-3">
                        <label>Seleccione Paciente</label>
                        <select name="cita" wire:model="patient_id" class="form-control form-bord">
                            <option value=''>--Selecione Al Paciente--</option>
                            @foreach($patients as $patient)
                            <option value={{ $patient->id}}>{{ $patient->nombres . ' ' . $patient->apellidos}}</option>
                            @endforeach
                        </select>
                        @error('patient_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
                    <label>Prestamo</label>
                    <div class="@error('patient_id') is-invalid  @enderror">
                        <div wire:ignore>
                            <select style="width: 100%" id="select2" name="patient_id" wire:model="patient_id"
                                class="form-control form-bord">
                                <option value=''>--Selecione Al Paciente--</option>
                                @foreach ($patients as $patient)
                                <option value={{ $patient->id }}>{{ $patient->nombres . ' ' . $patient->apellidos}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('patient_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Fecha De La Cita</label>
                        <input type="date" wire:model.lazy="fecha_cita" class="form-control form-bord"
                            min="{{date('Y-m-d')}}">
                        @error('fecha_cita')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Hora De La Cita</label>
                        <input type="time" wire:model.lazy="hora_cita" class="form-control form-bord">
                        @error('hora_cita')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Descripción</label>
                        <input type="text" wire:model.lazy="descripcion" class="form-control form-bord">
                        @error('descripcion')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Citas Modal -->
<div wire:ignore.self class="modal fade" id="updateCitasModal" tabindex="-1" aria-labelledby="updateCitasModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCitasModalLabel">Editar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateCitas">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Seleccione Paciente</label>
                        <select name="cita" wire:model="patient_id" class="form-control form-bord">
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
                        <label>Fecha De La Cita</label>
                        <input type="date" wire:model.lazy="fecha_cita" class="form-control form-bord">
                        @error('fecha_cita')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Hora De La Cita</label>
                        <input type="time" wire:model.lazy="hora_cita" class="form-control form-bord">
                        @error('hora_cita')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Descripción</label>
                        <input type="text" wire:model.lazy="descripcion" class="form-control form-bord">
                        @error('descripcion')
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



<!-- Delete Citas Modal -->
<div wire:ignore.self class="modal fade" id="deleteCitasModal" tabindex="-1" aria-labelledby="deleteCitasModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCitasModalLabel">Eliminar Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyCitas">
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