<?php

namespace App\Http\Livewire\Pages;

use App\Models\Dates;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class DatesManagement extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $fecha_cita, $hora_cita, $descripcion, $patient_id, $citas_id;

    public $search = '';

    protected function rules()
    {
        return [
            'fecha_cita' => 'required|string|min:6',
            'hora_cita' => 'required|',
            'descripcion' => 'required|string',
            'patient_id' => 'required',
        ];
    }
   
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveCitas()
    {
        $validatedData = $this->validate();

        Dates::create($validatedData);
        session()->flash('message', 'Cita Creada Correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('load-select');
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function editCitas(int $date_id)
    {
        $dates = Dates::find($date_id);
        if ($dates) {
            $this->dates_id = $dates->id;
            $this->fecha_cita = $dates->fecha_cita;
            $this->hora_cita = $dates->hora_cita;
            $this->descripcion = $dates->descripcion;
            $this->patient_id = $dates->patient_id;
        } else {
            return redirect()->to('/citas');
        }
    }

    public function updateCitas()
    {
        $validatedData = $this->validate();
        Dates::where('id', $this->dates_id)->update($validatedData);
        session()->flash('message', 'Cita Actualizada Correctamente');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteCitas(int $dates_id)
    {
        $this->dates_id = $dates_id;
    }

    public function destroyCitas()
    {
        Dates::find($this->dates_id)->delete();
        session()->flash('message', 'Cita Eliminada Correctamente');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    
    public function resetInput()
    {
        $this->fecha_cita = '';
        $this->hora_cita = '';
        $this->descripcion = '';
        $this->patient_id = '';
    }

    public function render()
    {
        $dates = Dates::where('descripcion','like', '%' . $this->search . '%')->orderBy('id', 'ASC')->paginate(8);
        $patients = Patient::all();
        return view('livewire.pages.dates-management', ['dates' => $dates, 'patients' => $patients]); 
    }
}
