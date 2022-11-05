<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="expedientsModal" tabindex="-1" aria-labelledby="expedientsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expedientsModalLabel">Crear Nueva Consulta</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <p class="text-primary text-center"><strong><u>CENTRO DE SALUD DE SAN CRISTOBAL TOTONICAPAN.</u></strong>
            </p>
            <p class="text-primary text-center"><strong><u>FICHA CLINICA:</u></strong></p>
            <form wire:submit.prevent="saveExpedients">
                <div class="modal-body">
                    {{-- <div class="mb-3">
                        <label>Seleccione Paciente</label>
                        <select name="expediente" wire:model="patient_id" class="form-control form-bord">
                            <option value=''>--Selecione Al Paciente--</option>
                            @foreach ($patients as $patient)
                                <option value={{ $patient->id }}>{{ $patient->nombres . ' ' . $patient->apellidos }}
                                </option>
                            @endforeach
                        </select>
                        @error('patient_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label>Fecha De La Consulta</label>
                        <input type="date" wire:model.lazy="fecha_consulta" class="form-control form-bord">
                        @error('fecha_consulta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <label>Paciente</label>
                    <div class="@error('patient_id') is-invalid  @enderror">
                        <div class="col-sm mb-3" wire:ignore>
                            <select style="width: 100%" id="select2" name="patient_id" wire:model="patient_id"
                                class="form-control form-bord">
                                <option value=''>--Selecione Al Paciente--</option>
                                @foreach ($patients as $patient)
                                    <option value={{ $patient->id }}>
                                        {{ $patient->nombres . ' ' . $patient->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('patient_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Seleccione Al Médico</label>
                        <select name="consulta" wire:model="user_id" class="form-control form-bord">
                            <option value=''>--Seleccione Al Médico--</option>
                            @foreach ($users as $user)
                                <option value={{ $user->id }}>{{ $user->nombre }}</option>
                            @endforeach
                        </select>
                        @error('users_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Control</label>
                        <select name="control" wire:model="control" class="form-control form-bord">
                            <option value=''>--Tipo de Control--</option>
                            @foreach ($controles as $control)
                                <option value={{ $control }}>{{ $control }}</option>
                            @endforeach
                        </select>
                        @error('control')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <p class="text-danger"><strong>Motivo De Consulta:</strong></p>
                    <div class="mb-3">
                        <label>Enfermedad Actual</label>
                        <input type="text" wire:model.lazy="enfermedad_actual" class="form-control form-bord"
                            min="{{ date('Y-m-d') }}">
                        @error('enfermedad_actual')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Signos Vitales Del Paciente:</strong></p>
                    <div class="row">
                        <div class="col-sm mb-3">
                            <label>Presion Arterial mm Hg</label>
                            <input type="text" wire:model.lazy="presion_arterial" class="form-control form-bord">
                            @error('presion_arterial')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Frecuencia Cardiaca</label>
                            <input type="text" wire:model.lazy="frecuencia_cardiaca" class="form-control form-bord">
                            @error('frecuencia_cardiaca')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Frecuencia Respiratoria </label>
                            <input type="text" wire:model.lazy="frecuencia_respiratoria"
                                class="form-control form-bord">
                            @error('frecuencia_respiratoria')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Saturacion SaO2</label>
                            <input type="text" wire:model.lazy="saturacion" class="form-control form-bord">
                            @error('saturacion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm mb-3">
                            <label>Temperatura °C </label>
                            <input type="text" wire:model.lazy="temperatura" class="form-control form-bord">
                            @error('temperatura')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Peso lb</label>
                            <input type="text" wire:model.lazy="peso" class="form-control form-bord">
                            @error('peso')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Estatura M</label>
                            <input type="text" wire:model.lazy="estatura" class="form-control form-bord">
                            @error('estatura')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <p class="text-danger"><strong>Revision Por Sistemas</strong></p>
                    <p class="text-danger"><strong>General:</strong></p>
                    <div class="mb-3">
                        <label>Piel</label>
                        <input type="text" wire:model.lazy="piel" class="form-control form-bord">
                        @error('piel')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Cabeza</label>
                        <input type="text" wire:model.lazy="cabeza" class="form-control form-bord">
                        @error('cabeza')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Ojos</label>
                        <input type="text" wire:model.lazy="ojos" class="form-control form-bord">
                        @error('ojos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Nariz</label>
                        <input type="text" wire:model.lazy="nariz" class="form-control form-bord">
                        @error('nariz')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Boca</label>
                        <input type="text" wire:model.lazy="boca" class="form-control form-bord">
                        @error('boca')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Cuello</label>
                        <input type="text" wire:model.lazy="cuello" class="form-control form-bord">
                        @error('cuello')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Torax</label>
                        <input type="text" wire:model.lazy="torax" class="form-control form-bord">
                        @error('torax')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Pulmones</label>
                        <input type="text" wire:model.lazy="pulmones" class="form-control form-bord">
                        @error('pulmones')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Corazon</label>
                        <input type="text" wire:model.lazy="corazon" class="form-control form-bord">
                        @error('corazon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Abdomen</label>
                        <input type="text" wire:model.lazy="abdomen" class="form-control form-bord">
                        @error('abdomen')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Genitourinario</label>
                        <input type="text" wire:model.lazy="genitourinario" class="form-control form-bord">
                        @error('genitourinario')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Miembros</label>
                        <input type="text" wire:model.lazy="miembros" class="form-control form-bord">
                        @error('miembros')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Neurologico</label>
                        <input type="text" wire:model.lazy="neurologico" class="form-control form-bord">
                        @error('neurologico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Antecedentes Personales Patologicos:</strong></p>
                    <div class="mb-3">
                        <label>Alergias</label>
                        <input type="text" wire:model.lazy="alergias" class="form-control form-bord">
                        @error('alergias')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Traumatismos</label>
                        <input type="text" wire:model.lazy="traumatismos" class="form-control form-bord">
                        @error('traumatismos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Cirugias</label>
                        <input type="text" wire:model.lazy="cirugias" class="form-control form-bord">
                        @error('cirugias')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Antecedentes Medicos</label>
                        <input type="text" wire:model.lazy="comorbilidad" class="form-control form-bord">
                        @error('comorbilidad')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Hospitalizacion</label>
                        <input type="text" wire:model.lazy="hospitalizacion" class="form-control form-bord">
                        @error('hospitalizacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Transfusiones</label>
                        <input type="text" wire:model.lazy="transfusiones" class="form-control form-bord">
                        @error('transfusiones')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Farmacos</label>
                        <input type="text" wire:model.lazy="farmacos" class="form-control form-bord">
                        @error('farmacos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Ginecologico-Obstetrico</label>
                        <input type="text" wire:model.lazy="ginecologico_obstetrico"
                            class="form-control form-bord">
                        @error('ginecologico_obstetrico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Grupo Sanguineo</label>
                        <input type="text" wire:model.lazy="grupo_sanguineo" class="form-control form-bord">
                        @error('grupo_sanguineo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Antecedentes Personales No Patologicos:</strong></p>
                    <div class="mb-3">
                        <label>Alcholismo</label>
                        <input type="text" wire:model.lazy="alcoholismo" class="form-control form-bord">
                        @error('alcoholismo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Drogas</label>
                        <input type="text" wire:model.lazy="drogas" class="form-control form-bord">
                        @error('drogas')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Alimentacion</label>
                        <input type="text" wire:model.lazy="alimentacion" class="form-control form-bord">
                        @error('alimentacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Ejercicio</label>
                        <input type="text" wire:model.lazy="ejercicio" class="form-control form-bord">
                        @error('ejercicio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Inmunizaciones</label>
                        <input type="text" wire:model.lazy="inmunizaciones" class="form-control form-bord">
                        @error('inmunizaciones')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Habitos</label>
                        <input type="text" wire:model.lazy="habitos" class="form-control form-bord">
                        @error('habitos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Antecedentes Familiares:</strong></p>
                    <div class="mb-3">
                        <label>Padres</label>
                        <input type="text" wire:model.lazy="padres" class="form-control form-bord">
                        @error('padres')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Hermanos</label>
                        <input type="text" wire:model.lazy="hermanos" class="form-control form-bord">
                        @error('hermanos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Otros Familiares</label>
                        <input type="text" wire:model.lazy="otros_familiares" class="form-control form-bord">
                        @error('otros_familiares')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Diagnostico:</strong></p>
                    <div class="mb-3">
                        <label>Diagnostico</label>
                        <input type="text" wire:model.lazy="diagnostico" class="form-control form-bord">
                        @error('diagnostico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Descripcion del Diagnostico</label>
                        <input type="text" wire:model.lazy="descripcion_diagnostico"
                            class="form-control form-bord">
                        @error('descripcion_diagnostico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Tratamiento</label>
                        <input type="text" wire:model.lazy="tratamiento" class="form-control form-bord">
                        @error('tratamiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Nota de Evolucion</label>
                        <input type="text" wire:model.lazy="evolucion" class="form-control form-bord">
                        @error('evolucion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Observaciones</label>
                        <input type="text" wire:model.lazy="observaciones" class="form-control form-bord">
                        @error('observaciones')
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
                    <button type="submit" @if($isUploading==true) disabled @endif class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Citas Modal -->

<div wire:ignore.self class="modal fade" id="updateExpedientsModal" tabindex="-1"
    aria-labelledby="updateExpedientsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateExpedientsModalLabel">Actualizar Expediente</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <p class="text-primary text-center"><strong><u>CENTRO DE SALUD DE SAN CRISTOBAL TOTONICAPAN.</u></strong>
            </p>
            <p class="text-primary text-center"><strong><u>FICHA CLINICA:</u></strong></p>
            <form wire:submit.prevent="updateExpedients">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Seleccione Paciente</label>
                        <select disabled name="expediente" wire:model="patient_id" class="form-control form-bord">
                            <option value=''>--Selecione Al Paciente--</option>
                            @foreach ($patients as $patient)
                                <option value={{ $patient->id }}>{{ $patient->nombres . ' ' . $patient->apellidos }}
                                </option>
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
                            @foreach ($users as $user)
                                <option value={{ $user->id }}>{{ $user->nombre }}</option>
                            @endforeach
                        </select>
                        @error('users_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Control</label>
                        <select name="control" wire:model="control" class="form-control form-bord">
                            <option value=''>--Tipo de Control--</option>
                            @foreach ($controles as $control)
                                <option value={{ $control }}>{{ $control }}</option>
                            @endforeach
                        </select>
                        @error('control')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <p class="text-danger"><strong>Motivo De Consulta:</strong></p>
                    <div class="mb-3">
                        <label>Enfermedad Actual</label>
                        <input type="text" wire:model.lazy="enfermedad_actual" class="form-control form-bord"
                            min="{{ date('Y-m-d') }}">
                        @error('enfermedad_actual')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Signos Vitales Del Paciente:</strong></p>
                    <div class="row">
                        <div class="col-sm mb-3">
                            <label>Presion Arterial mm Hg</label>
                            <input type="text" wire:model.lazy="presion_arterial" class="form-control form-bord">
                            @error('presion_arterial')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Frecuencia Cardiaca</label>
                            <input type="text" wire:model.lazy="frecuencia_cardiaca"
                                class="form-control form-bord">
                            @error('frecuencia_cardiaca')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Frecuencia Respiratoria </label>
                            <input type="text" wire:model.lazy="frecuencia_respiratoria"
                                class="form-control form-bord">
                            @error('frecuencia_respiratoria')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Saturacion SaO2</label>
                            <input type="text" wire:model.lazy="saturacion" class="form-control form-bord">
                            @error('saturacion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm mb-3">
                            <label>Temperatura °C </label>
                            <input type="text" wire:model.lazy="temperatura" class="form-control form-bord">
                            @error('temperatura')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Peso lb</label>
                            <input type="text" wire:model.lazy="peso" class="form-control form-bord">
                            @error('peso')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm mb-3">
                            <label>Estatura M</label>
                            <input type="text" wire:model.lazy="estatura" class="form-control form-bord">
                            @error('estatura')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <p class="text-danger"><strong>Revision Por Sistemas</strong></p>
                    <p class="text-danger"><strong>General:</strong></p>
                    <div class="mb-3">
                        <label>Piel</label>
                        <input type="text" wire:model.lazy="piel" class="form-control form-bord">
                        @error('piel')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Cabeza</label>
                        <input type="text" wire:model.lazy="cabeza" class="form-control form-bord">
                        @error('cabeza')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Ojos</label>
                        <input type="text" wire:model.lazy="ojos" class="form-control form-bord">
                        @error('ojos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Nariz</label>
                        <input type="text" wire:model.lazy="nariz" class="form-control form-bord">
                        @error('nariz')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Boca</label>
                        <input type="text" wire:model.lazy="boca" class="form-control form-bord">
                        @error('boca')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Cuello</label>
                        <input type="text" wire:model.lazy="cuello" class="form-control form-bord">
                        @error('cuello')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Torax</label>
                        <input type="text" wire:model.lazy="torax" class="form-control form-bord">
                        @error('torax')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Pulmones</label>
                        <input type="text" wire:model.lazy="pulmones" class="form-control form-bord">
                        @error('pulmones')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Corazon</label>
                        <input type="text" wire:model.lazy="corazon" class="form-control form-bord">
                        @error('corazon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Abdomen</label>
                        <input type="text" wire:model.lazy="abdomen" class="form-control form-bord">
                        @error('abdomen')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Genitourinario</label>
                        <input type="text" wire:model.lazy="genitourinario" class="form-control form-bord">
                        @error('genitourinario')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Miembros</label>
                        <input type="text" wire:model.lazy="miembros" class="form-control form-bord">
                        @error('miembros')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Neurologico</label>
                        <input type="text" wire:model.lazy="neurologico" class="form-control form-bord">
                        @error('neurologico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Antecedentes Personales Patologicos:</strong></p>
                    <div class="mb-3">
                        <label>Alergias</label>
                        <input type="text" wire:model.lazy="alergias" class="form-control form-bord">
                        @error('alergias')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Traumatismos</label>
                        <input type="text" wire:model.lazy="traumatismos" class="form-control form-bord">
                        @error('traumatismos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Cirugias</label>
                        <input type="text" wire:model.lazy="cirugias" class="form-control form-bord">
                        @error('cirugias')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Antecedentes Medicos</label>
                        <input type="text" wire:model.lazy="comorbilidad" class="form-control form-bord">
                        @error('comorbilidad')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Hospitalizacion</label>
                        <input type="text" wire:model.lazy="hospitalizacion" class="form-control form-bord">
                        @error('hospitalizacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Transfusiones</label>
                        <input type="text" wire:model.lazy="transfusiones" class="form-control form-bord">
                        @error('transfusiones')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Farmacos</label>
                        <input type="text" wire:model.lazy="farmacos" class="form-control form-bord">
                        @error('farmacos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Ginecologico-Obstetrico</label>
                        <input type="text" wire:model.lazy="ginecologico_obstetrico"
                            class="form-control form-bord">
                        @error('ginecologico_obstetrico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Grupo Sanguineo</label>
                        <input type="text" wire:model.lazy="grupo_sanguineo" class="form-control form-bord">
                        @error('grupo_sanguineo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Antecedentes Personales No Patologicos:</strong></p>
                    <div class="mb-3">
                        <label>Alcholismo</label>
                        <input type="text" wire:model.lazy="alcoholismo" class="form-control form-bord">
                        @error('alcoholismo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Drogas</label>
                        <input type="text" wire:model.lazy="drogas" class="form-control form-bord">
                        @error('drogas')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Alimentacion</label>
                        <input type="text" wire:model.lazy="alimentacion" class="form-control form-bord">
                        @error('alimentacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Ejercicio</label>
                        <input type="text" wire:model.lazy="ejercicio" class="form-control form-bord">
                        @error('ejercicio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Inmunizaciones</label>
                        <input type="text" wire:model.lazy="inmunizaciones" class="form-control form-bord">
                        @error('inmunizaciones')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Habitos</label>
                        <input type="text" wire:model.lazy="habitos" class="form-control form-bord">
                        @error('habitos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Antecedentes Familiares:</strong></p>
                    <div class="mb-3">
                        <label>Padres</label>
                        <input type="text" wire:model.lazy="padres" class="form-control form-bord">
                        @error('padres')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Hermanos</label>
                        <input type="text" wire:model.lazy="hermanos" class="form-control form-bord">
                        @error('hermanos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Otros Familiares</label>
                        <input type="text" wire:model.lazy="otros_familiares" class="form-control form-bord">
                        @error('otros_familiares')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="text-danger"><strong>Diagnostico:</strong></p>
                    <div class="mb-3">
                        <label>Diagnostico</label>
                        <input type="text" wire:model.lazy="diagnostico" class="form-control form-bord">
                        @error('diagnostico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Descripcion del Diagnostico</label>
                        <input type="text" wire:model.lazy="descripcion_diagnostico"
                            class="form-control form-bord">
                        @error('descripcion_diagnostico')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Tratamiento</label>
                        <input type="text" wire:model.lazy="tratamiento" class="form-control form-bord">
                        @error('tratamiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Nota de Evolucion</label>
                        <input type="text" wire:model.lazy="evolucion" class="form-control form-bord">
                        @error('evolucion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Observaciones</label>
                        <input type="text" wire:model.lazy="observaciones" class="form-control form-bord">
                        @error('observaciones')
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



<!-- Delete Citas Modal -->
<div wire:ignore.self class="modal fade" id="deleteExpedientsModal" tabindex="-1"
    aria-labelledby="deleteExpedientsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteExpedientsModalLabel">Eliminar Expediente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyExpedients">
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
