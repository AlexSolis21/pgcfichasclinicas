<?php

namespace App\Http\Livewire\Pages;

use App\Models\Patient;
use Livewire\Component;

class ShowPatient extends Component
{
    public $patient;

    public function mount($id)
    {
        $this->patient = Patient::findOrFail($id);

    }
   
    public function render()
    {
        return view('livewire.pages.show-patient');
    }
}
