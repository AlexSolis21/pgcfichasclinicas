<?php

namespace App\Http\Livewire\Pages;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class PatientManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $cui, $expediente_clinico, $nombres, $apellidos, $sexo, $fecha_de_nacimiento, $telefono, $direccion, $patient_id;
    public $search = '';

    protected function rules()
    {
        return [
            'cui' => 'nullable|string|min:6',
            'expediente_clinico' => 'required|string|min:4',
            'nombres' => 'required|string|min:6',
            'apellidos' => 'required|string|min:6',
            'sexo' => 'required',
            'fecha_de_nacimiento' => 'required',
            'telefono' => 'required',
            'direccion' => 'required|string|min:6',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function savePatient()
    {
        $validatedData = $this->validate();

        Patient::create($validatedData);
        session()->flash('message', 'Paciente creado correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editPatient(int $patient_id)
    {
        $patient = Patient::find($patient_id);
        if ($patient) {
            $this->patient_id = $patient->id;
            $this->cui = $patient->cui;
            $this->expediente_clinico = $patient->expediente_clinico;
            $this->nombres = $patient->nombres;
            $this->apellidos = $patient->apellidos;
            $this->sexo = $patient->sexo;
            $this->fecha_de_nacimiento = $patient->fecha_de_nacimiento;
            $this->telefono = $patient->telefono;
            $this->direccion = $patient->direccion;
        } else {
            return redirect()->to('/pacientes');
        }
    }

    public function updatePatient()
    {
        $validatedData = $this->validate();
        Patient::where('id', $this->patient_id)->update($validatedData);
        session()->flash('message', 'Paciente Actualizado Correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deletePatient(int $patient_id)
    {
        $this->patient_id = $patient_id;
    }

    public function destroyPatient()
    {
        Patient::find($this->patient_id)->delete();
        session()->flash('message', 'Paciente Eliminado Correctamente');
        $this->dispatchBrowserEvent('close-modal');
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->cui = '';
        $this->expediente_clinico = '';
        $this->nombres = '';
        $this->apellidos = '';
        $this->sexo = '';
        $this->fecha_de_nacimiento = '';
        $this->telefono = '';
        $this->direccion = '';
    }



    public function render()
    {
        $patients = Patient::where('nombres','like', '%' . $this->search . '%')->orderBy('id', 'ASC')->paginate(8);
        $sexs = ['Masculino','Femenino'];
        return view('livewire.pages.patient-management', ['patients' => $patients, 'sexs' => $sexs]); 

    }
}
