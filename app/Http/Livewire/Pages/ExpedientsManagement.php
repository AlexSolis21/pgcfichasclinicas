<?php

namespace App\Http\Livewire\Pages;

use App\Models\Expedients as ModelsExpedients;
use App\Models\Patient;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ExpedientsManagement extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $enfermedad_actual,
        $presion_arterial,
        $frecuencia_cardiaca,
        $frecuencia_respiratoria,
        $saturacion,
        $temperatura,
        $peso,
        $estatura,
        $piel,
        $cabeza,
        $ojos,
        $nariz,
        $boca,
        $cuello,
        $torax,
        $pulmones,
        $corazon,
        $abdomen,
        $genitourinario,
        $miembros,
        $neurologico,
        $alergias,
        $traumatismos,
        $cirugias,
        $comorbilidad,
        $hospitalizacion,
        $transfusiones,
        $farmacos,
        $ginecologico_obstetrico,
        $grupo_sanguineo,
        $tabaquismo,
        $alcoholismo,
        $drogas,
        $alimentacion,
        $ejercicio,
        $inmunizaciones,
        $habitos,
        $padres,
        $hermanos,
        $otros_familiares,
        $diagnostico,
        $descripcion_diagnostico,
        $tratamiento,
        $evolucion,
        $observaciones,
        $patient_id,
        $control,
        $user_id;

    public $search = '';

    protected function rules()
    {
        return [
            'enfermedad_actual' => 'nullable|string|min:6',
            'presion_arterial' => 'nullable|string|min:2',
            'frecuencia_cardiaca' => 'nullable|string|min:2',
            'frecuencia_respiratoria' => 'nullable|string|min:2',
            'saturacion' => 'nullable|string|min:2',
            'temperatura' => 'nullable|string|min:2',
            'peso' => 'nullable|string|min:2',
            'estatura' => 'nullable|string|min:2',
            'piel' => 'nullable|string|min:6',
            'cabeza' => 'nullable|string|min:6',
            'ojos' => 'nullable|string|min:6',
            'nariz' => 'nullable|string|min:6',
            'boca' => 'nullable|string|min:6',
            'cuello' => 'nullable|string|min:6',
            'torax' => 'nullable|string|min:6',
            'pulmones' => 'nullable|string|min:6',
            'corazon' => 'nullable|string|min:6',
            'abdomen' => 'nullable|string|min:6',
            'genitourinario' => 'nullable|string|min:6',
            'miembros' => 'nullable|string|min:6',
            'neurologico' => 'nullable|string|min:6',
            'alergias' => 'nullable|string|min:6',
            'traumatismos' => 'nullable|string|min:6',
            'cirugias' => 'nullable|string|min:6',
            'comorbilidad' => 'nullable|string|min:6',
            'hospitalizacion' => 'nullable|string|min:6',
            'transfusiones' => 'nullable|string|min:6',
            'farmacos' => 'nullable|string|min:6',
            'ginecologico_obstetrico' => 'nullable|string|min:6',
            'grupo_sanguineo' => 'nullable|string|min:6',
            'alcoholismo' => 'nullable|string|min:6',
            'drogas' => 'nullable|string|min:6',
            'alimentacion' => 'nullable|string|min:6',
            'ejercicio' => 'nullable|string|min:6',
            'inmunizaciones' => 'nullable|string|min:6',
            'habitos' => 'nullable|string|min:6',
            'padres' => 'nullable|string|min:6',
            'hermanos' => 'nullable|string|min:6',
            'otros_familiares' => 'nullable|string|min:6',
            'diagnostico' => 'nullable|string|min:6',
            'descripcion_diagnostico' => 'nullable|string|min:6',
            'tratamiento' => 'nullable|string|min:6',
            'evolucion' => 'nullable|string|min:6',
            'observaciones' => 'nullable|string|min:6',
            // 'patient_id' => 'required|unique:expedients,patient_id',
            'patient_id' => 'required',
            'control'=>'required',
            'user_id' => 'required',


        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveExpedients()
    {
        $validatedData = $this->validate();

        ModelsExpedients::create($validatedData);
        session()->flash('message', 'Datos Guardados Correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('load-select');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editExpedients(int $expedients_id)
    {
        $expedients = ModelsExpedients::find($expedients_id);
        if ($expedients) {
            $this->expedients_id = $expedients->id;
            $this->enfermedad_actual = $expedients->enfermedad_actual;
            $this->presion_arterial = $expedients->presion_arterial;
            $this->frecuencia_cardiaca = $expedients->frecuencia_cardiaca;
            $this->frecuencia_respiratoria = $expedients->frecuencia_respiratoria;
            $this->saturacion = $expedients->saturacion;
            $this->temperatura = $expedients->temperatura;
            $this->peso = $expedients->peso;
            $this->estatura = $expedients->estatura;
            $this->piel = $expedients->piel;
            $this->cabeza = $expedients->cabeza;
            $this->ojos = $expedients->ojos;
            $this->nariz = $expedients->nariz;
            $this->boca = $expedients->boca;
            $this->cuello = $expedients->cuello;
            $this->torax = $expedients->torax;
            $this->pulmones = $expedients->pulmones;
            $this->corazon = $expedients->corazon;
            $this->abdomen = $expedients->abdomen;
            $this->genitourinario = $expedients->genitourinario;
            $this->miembros = $expedients->miembros;
            $this->neurologico = $expedients->neurologico;
            $this->alergias = $expedients->alergias;
            $this->traumatismos = $expedients->traumatismos;
            $this->cirugias = $expedients->cirugias;
            $this->comorbilidad = $expedients->comorbilidad;
            $this->hospitalizacion = $expedients->hospitalizacion;
            $this->transfusiones = $expedients->transfusiones;
            $this->farmacos = $expedients->farmacos;
            $this->ginecologico_obstetrico = $expedients->ginecologico_obstetrico;
            $this->grupo_sanguineo = $expedients->grupo_sanguineo;
            $this->alcoholismo = $expedients->alcoholismo;
            $this->drogas = $expedients->drogas;
            $this->alimentacion = $expedients->alimentacion;
            $this->ejercicio = $expedients->ejercicio;
            $this->inmunizaciones = $expedients->inmunizaciones;
            $this->habitos = $expedients->habitos;
            $this->padres = $expedients->padres;
            $this->hermanos = $expedients->hermanos;
            $this->otros_familiares = $expedients->otros_familiares;
            $this->diagnostico = $expedients->diagnostico;
            $this->descripcion_diagnostico = $expedients->descripcion_diagnostico;
            $this->tratamiento = $expedients->tratamiento;
            $this->evolucion = $expedients->evolucion;
            $this->observaciones = $expedients->observaciones;
            $this->user_id = $expedients->user_id;
            $this->patient_id = $expedients->patient_id;
        } else {
            return redirect()->to('/expedientes');
        }
    }

    public function updateExpedients()
    {
        $validatedData = $this->validate([
            'enfermedad_actual' => 'nullable|string|min:6',
            'presion_arterial' => 'nullable|string|min:2',
            'frecuencia_cardiaca' => 'nullable|string|min:2',
            'frecuencia_respiratoria' => 'nullable|string|min:2',
            'saturacion' => 'nullable|string|min:2',
            'temperatura' => 'nullable|string|min:2',
            'peso' => 'nullable|string|min:2',
            'estatura' => 'nullable|string|min:2',
            'piel' => 'nullable|string|min:6',
            'cabeza' => 'nullable|string|min:6',
            'ojos' => 'nullable|string|min:6',
            'nariz' => 'nullable|string|min:6',
            'boca' => 'nullable|string|min:6',
            'cuello' => 'nullable|string|min:6',
            'torax' => 'nullable|string|min:6',
            'pulmones' => 'nullable|string|min:6',
            'corazon' => 'nullable|string|min:6',
            'abdomen' => 'nullable|string|min:6',
            'genitourinario' => 'nullable|string|min:6',
            'miembros' => 'nullable|string|min:6',
            'neurologico' => 'nullable|string|min:6',
            'alergias' => 'nullable|string|min:6',
            'traumatismos' => 'nullable|string|min:6',
            'cirugias' => 'nullable|string|min:6',
            'comorbilidad' => 'nullable|string|min:6',
            'hospitalizacion' => 'nullable|string|min:6',
            'transfusiones' => 'nullable|string|min:6',
            'farmacos' => 'nullable|string|min:6',
            'ginecologico_obstetrico' => 'nullable|string|min:6',
            'grupo_sanguineo' => 'nullable|string|min:6',
            'alcoholismo' => 'nullable|string|min:6',
            'drogas' => 'nullable|string|min:6',
            'alimentacion' => 'nullable|string|min:6',
            'ejercicio' => 'nullable|string|min:6',
            'inmunizaciones' => 'nullable|string|min:6',
            'habitos' => 'nullable|string|min:6',
            'padres' => 'nullable|string|min:6',
            'hermanos' => 'nullable|string|min:6',
            'otros_familiares' => 'nullable|string|min:6',
            'diagnostico' => 'nullable|string|min:6',
            'descripcion_diagnostico' => 'nullable|string|min:6',
            'tratamiento' => 'nullable|string|min:6',
            'evolucion' => 'nullable|string|min:6',
            'observaciones' => 'nullable|string|min:6',
            'patient_id' => 'required',
            'user_id' => 'required',

        ]);
        ModelsExpedients::where('id', $this->expedients_id)->update($validatedData);
        session()->flash('message', 'Expediente Actualizado Correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteExpedients(int $expedients_id)
    {
        $this->expedients_id = $expedients_id;
    }

    public function destroyExpedients()
    {
        ModelsExpedients::find($this->expedients_id)->delete();
        session()->flash('message', 'Expediente Eliminado Correctamente');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {

        $this->enfermedad_actual = '';
        $this->presion_arterial = '';
        $this->frecuencia_cardiaca = '';
        $this->frecuencia_respiratoria = '';
        $this->saturacion = '';
        $this->temperatura = '';
        $this->peso = '';
        $this->estatura = '';
        $this->piel = '';
        $this->cabeza = '';
        $this->ojos = '';
        $this->nariz = '';
        $this->boca = '';
        $this->cuello = '';
        $this->torax = '';
        $this->pulmones = '';
        $this->corazon = '';
        $this->abdomen = '';
        $this->genitourinario = '';
        $this->miembros = '';
        $this->neurologico = '';
        $this->alergias = '';
        $this->traumatismos = '';
        $this->cirugias = '';
        $this->comorbilidad = '';
        $this->hospitalizacion = '';
        $this->transfusiones = '';
        $this->farmacos = '';
        $this->ginecologico_obstetrico = '';
        $this->grupo_sanguineo = '';
        $this->alcoholismo = '';
        $this->drogas = '';
        $this->alimentacion = '';
        $this->ejercicio = '';
        $this->inmunizaciones = '';
        $this->habitos = '';
        $this->padres = '';
        $this->hermanos = '';
        $this->otros_familiares = '';
        $this->diagnostico = '';
        $this->descripcion_diagnostico = '';
        $this->tratamiento = '';
        $this->evolucion = '';
        $this->observaciones = '';
    }

    public function render()
    {
        $expedients = ModelsExpedients::where('enfermedad_actual', 'like', '%' . $this->search . '%')->orderBy('id', 'ASC')->paginate(8);
        $patients = Patient::all();
        $control = ['Primera Consulta','Reconsulta','Emergencia'];
        $users = User::role('Medico')->get();
        return view('livewire.pages.expedients-management', [
            'expedients' => $expedients,
            'patients' => $patients,
            'users' => $users,
            'controles'=>$control
        ]);
    }
}
