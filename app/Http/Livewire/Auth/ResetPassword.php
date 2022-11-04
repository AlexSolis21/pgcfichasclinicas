<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
Use Str;
use Illuminate\Auth\Events\PasswordReset;

class ResetPassword extends Component
{
    public $correo = '';
    public $password = '';
    public $passwordConfirmation = '';
    public $urlID = '';

    protected $rules= [
        'correo' => 'required|email',
        'password' => 'required|min:8|same:passwordConfirmation',
    ];

    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function mount($id) {
        $existingUser = User::find($id);
        $this->urlID = intval($existingUser->id);
    }

    public function update(){
        
        $this->validate(); 
          
        $existingUser = User::where('correo', $this->correo)->first();

        if($existingUser && $existingUser->id == $this->urlID) { 
            $existingUser->update([
                'password' => $this->password
            ]);
            redirect('ingresar')->with('status', 'Tu contraseña ha sido restablecida.');
        } else {
            return back()->with('correo', "No podemos encontrar ningún usuario con esa dirección de correo electrónico.");
        }
    
    }

}
