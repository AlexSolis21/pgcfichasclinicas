<?php

namespace App\Http\Livewire\Pages;

use App\Models\Consults;
use App\Models\Patient;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ConsultsManagement extends Component
{
    use WithPagination;
    use WithFileUploads;


    protected $paginationTheme = 'bootstrap';

    public $fecha_consulta, $motivo_consulta, $prueba_laboratorio, $foto, $patient_id, $user_id, $consults_id;

    public $search = '';
    public $isUploading = false;
    public $opcionesLaboratorio = [];

    public function mount()
    {
        $this->opcionesLaboratorio  = ["Si", "No"];
    }

    protected function rules()
    {
        return [
            'fecha_consulta' => 'required|string',
            'motivo_consulta' => 'required|string',
            'prueba_laboratorio' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'patient_id' => 'required',
            'user_id' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveConsults()
    {
        $validatedData = $this->validate();
        if (!empty($validatedData['foto'])) {
            $validatedData['foto'] = $this->foto->store('fotos', 'public');
        }
        Consults::create($validatedData);
        session()->flash('message', 'Registro Creado Correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('load-select');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editConsults(int $consults_id)
    {
        $consults = Consults::find($consults_id);
        if ($consults) {
            $this->consults_id = $consults->id;
            $this->fecha_consulta = $consults->fecha_consulta;
            $this->motivo_consulta = $consults->motivo_consulta;
            $this->prueba_laboratorio = $consults->prueba_laboratorio;
            $this->foto = $consults->foto;
            $this->patient_id = $consults->patient_id;
            $this->user_id = $consults->user_id;
        } else {
            return redirect()->to('/consultas');
        }
    }

    public function updateConsults()
    {
        $validatedData = $this->validate();
        Consults::where('id', $this->consults_id)->update($validatedData);
        session()->flash('message', 'Registro Actualizado Correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConsults(int $consults_id)
    {
        $this->consults_id = $consults_id;
    }

    public function destroyConsults()
    {
        Consults::find($this->consults_id)->delete();
        session()->flash('message', 'Registro Eliminado Correctamente');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }


    public function resetInput()
    {
        $this->fecha_consulta = '';
        $this->motivo_consulta = '';
        $this->prueba_laboratorio = '';
        $this->foto = '';
        $this->patient_id = '';
        $this->user_id = '';
    }

    public function render()
    {
        // $user->roles()->pluck('name')->implode(' ')
        $consults = Consults::where('motivo_consulta', 'like', '%' . $this->search . '%')->orderBy('id', 'ASC')->paginate(8);
        $patients = Patient::all();
        $users = User::role('Medico')->get();


        return view('livewire.pages.consults-management', ['consults' => $consults, 'patients' => $patients, 'users' => $users]);
    }
}
