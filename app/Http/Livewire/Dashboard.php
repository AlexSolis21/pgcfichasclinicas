<?php

namespace App\Http\Livewire;

use App\Models\Consults;
use App\Models\Dates;
use App\Models\Expedients;
use App\Models\Patient;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;

class Dashboard extends Component
{

    public function render()
    {

        $today = Carbon::today()->toDateString();

        return view('livewire.dashboard', [
            'usuarios' => User::all()->count(),
            'pacientes' => Patient::all()->count(),
            'citas' => Dates::all()->count(),
            'consultas' => Consults::all()->count(),
            'expedientes' => Expedients::all()->count(),
            'dates' => Dates::where('fecha_cita', '=', $today)->get()
        ]);
    }
}
