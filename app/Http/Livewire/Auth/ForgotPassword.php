<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Notifications\ResetPassword;
use App\Models\User;
use Illuminate\Notifications\Notifiable;

class ForgotPassword extends Component
{
    use Notifiable;

    public $correo = '';

    protected $rules = [
        'correo' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }


    public function routeNotificationForMail()
    {
        return $this->correo;
    }

    public function show()
    {



        $this->validate();

        $user = User::where('correo', $this->correo)->first();


        if ($user) {


            $this->notify(new ResetPassword($user->id));

            return back()->with('status', "Hemos enviado por correo electrónico el enlace para restablecer la contraseña.");
        } else {

            return back()->with('email', "No podemos encontrar ningún usuario con esa dirección de correo electrónico.");
        }
    }
}
