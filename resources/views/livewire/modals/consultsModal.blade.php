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

                    <label>Paciente</label>
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

                    {{-- <label>Médico</label>
                    <div class="@error('user_id') is-invalid  @enderror">
                        <div wire:ignore>
                            <select style="width: 100%" id="select3" name="user_id" wire:model="user_id"
                                class="form-control form-bord">
                                <option value=''>--Seleccione Al Médico--</option>
                                @foreach ($users as $user)
                                <option value={{ $user->id }}>{{$user->nombre}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

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
                        <label>Solicito Prueba De Laboratorio</label>
                        <select name="prueba_laboratorio" wire:model="prueba_laboratorio"
                            class="form-control form-bord">
                            <option value=''>--Seleccione--</option>
                            @foreach($opcionesLaboratorio as $opciones)
                            <option value={{ $opciones}}>{{ $opciones}}</option>
                            @endforeach
                        </select>
                        @error('prueba_laboratorio')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if ($prueba_laboratorio == "Si")
                    <div class="row">
                        <div class="col-sm mb-3">
                            <label>Imagen Prueba de Laboratorio</label>
                            <div x-data="{ isUploading: @entangle('isUploading'), progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <!-- File Input -->
                                <input class="form-control form-bord" type="file" wire:model="foto">

                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>

                            @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="col-sm mb-3">
                            @if ($foto->temporaryUrl())
                            <div class="avatar avatar-xl position-relative">
                                <img src="{{ $foto->temporaryUrl() }}" class="w-100 border-radius-lg shadow-sm">
                            </div>
                            @endif
                        </div> --}}
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" @if($isUploading==true) disabled @endif
                        class="btn btn-primary">Guardar</button>
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

                    <label>Paciente</label>
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

                    {{-- <label>Médico</label>
                    <div class="@error('user_id') is-invalid  @enderror">
                        <div wire:ignore>
                            <select style="width: 100%" id="select3" name="user_id" wire:model="user_id"
                                class="form-control form-bord">
                                <option value=''>--Seleccione Al Médico--</option>
                                @foreach ($users as $user)
                                <option value={{ $user->id }}>{{$user->nombre}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

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
                        <label>Solicito Prueba De Laboratorio</label>
                        <select name="prueba_laboratorio" wire:model="prueba_laboratorio"
                            class="form-control form-bord">
                            <option value=''>--Seleccione--</option>
                            @foreach($opcionesLaboratorio as $opciones)
                            <option value={{ $opciones}}>{{ $opciones}}</option>
                            @endforeach
                        </select>
                        @error('prueba_laboratorio')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if ($prueba_laboratorio == "Si")
                    <div class="row">
                        <div class="col-sm mb-3">
                            <label>Imagen Prueba de Laboratorio</label>
                            <div x-data="{ isUploading: @entangle('isUploading'), progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <!-- File Input -->
                                <input class="form-control form-bord" type="file" wire:model="foto">

                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>

                            @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="col-sm mb-3">
                            @if ($foto->temporaryUrl())
                            <div class="avatar avatar-xl position-relative">
                                <img src="{{ $foto->temporaryUrl() }}" class="w-100 border-radius-lg shadow-sm">
                            </div>
                            @endif
                        </div> --}}
                    </div>
                    @endif
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