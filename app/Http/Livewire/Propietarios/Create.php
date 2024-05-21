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
                'dni' => 'required',
                'telefono' => 'nullable',
                'correo' => 'nullable',
            ],
            // Mensajes de error
            [
                'nombre.required' => 'El nombre es obligatorio.',
                'apellidos.required' => 'El nombre es obligatorio.',
                'dni.required' => 'El nombre es obligatorio.',
                
            ]
        );



        // Guardar datos validados
        $tipoviviendaSave = Propietarios::create($validatedData);

        // Alertas de guardado exitoso
        if ($tipoviviendaSave) {
            $this->alert('success', '¡Propietario registrado correctamente!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', '¡No se ha podido guardar la información del Propietario!', [
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
