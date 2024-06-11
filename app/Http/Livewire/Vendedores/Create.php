<?php

namespace App\Http\Livewire\Vendedores;

use App\Models\TipoVivienda;
use App\Models\Inmuebles;
use App\Models\Intereses;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $nombre_completo;
    public $dni;
    public $role = 'admin';
    public $password;
    public $telefono;
    public $email;
    public $inactive = 1;


    public function mount()
    {

    }

    // Renderizado del Componente
    public function render()
    {
        return view('livewire.vendedores.create');
    }

    public function generarPassword(){
        $this->password = Str::random(10);
    }

    public function submit()
    {
        $this->password = Hash::make($this->password);


        $validatedData = $this->validate(
            [
                'nombre_completo' => 'required',
                'dni' => 'required',
                'role' => 'required',
                'password' => 'required',
                'telefono' => 'required',
                'email' => 'required',
                'inactive' => 'required',
            ],
            // Mensajes de error
            //ingles
            [
                'nombre_completo.required' => 'The name is required',
                'dni.required' => 'The dni is required',
                'role.required' => 'The role is required',
                'password.required' => 'The password is required',
                'telefono.required' => 'The phone is required',
                'email.required' => 'The email is required',
                'inactive.required' => 'The status is required',
            ]
        );



        // Guardar datos validados
        $tipoviviendaSave = User::create($validatedData);

        // Alertas de guardado exitoso
        if ($tipoviviendaSave) {
            $this->alert('success', 'Successfully registered seller!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Seller information could not be saved!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
        }
    }

    public function getListeners()
    {
        return [
            'confirmed'
        ];
    }

    public function confirmed()
    {
        return redirect()->route('vendedores.index');
    }
}
