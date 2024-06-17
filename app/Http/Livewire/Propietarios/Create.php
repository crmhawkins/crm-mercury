<?php

namespace App\Http\Livewire\Propietarios;

use App\Models\Propietarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $nombre;
    public $apellidos;
    public $dni;
    public $telefono;
    public $correo;


    public function mount()
    {

    }

    // Renderizado del Componente
    public function render()
    {
        return view('livewire.propietarios.create');
    }

    public function generarPassword(){
        $this->password = Str::random(10);
    }

    public function submit()
    {
        
        $validatedData = $this->validate(
            [
                'nombre' => 'required',
                'apellidos' => 'required',
                'dni' => 'nullable',
                'telefono' => 'nullable',
                'correo' => 'nullable',
            ],
            // Mensajes de error
            //en ingles
            [
                'nombre.required' => 'The name field is required',
                'apellidos.required' => 'The last name field is required',
                'dni.required' => 'The DNI field is required',
                'telefono.required' => 'The phone field is required',
                'correo.required' => 'The email field is required',
            ]
        );



        // Guardar datos validados
        $tipoviviendaSave = Propietarios::create($validatedData);

        // Alertas de guardado exitoso
        if ($tipoviviendaSave) {
            $this->alert('success', 'Owner registered successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Could not save Owner information!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
        }
    }

    public function getListeners()
    {
        return [
            'confirmed',
            'submit'
        ];
    }

    public function confirmed()
    {
        return redirect()->route('propietarios.index');
    }
}
