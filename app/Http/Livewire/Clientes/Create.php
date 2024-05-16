<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Clientes;
use App\Models\Inmuebles;
use App\Models\Intereses;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nombre;
    public $apellido;
    public $dni;
    public $telefono;
    public $email;
    public $direccion;
    public $busqueda;

    public function mount()
    {
        
    }

    // Renderizado del Componente
    public function render()
    {
        return view('livewire.clientes.create');
    }

    public function submit()
    {
        $validatedData = $this->validate(
            [
                'nombre' => 'required',
                'apellido' => 'required',
                'dni' => 'required',
                'telefono' => 'required',
                'email' => 'required',
                'direccion' => 'required',
                'busqueda' => 'required | max:255 | min:3',
            ],
            // Mensajes de error
            [
                'nombre.required' => 'El nombre del cliente es obligatorio.',
                'apellido.required' => 'Los apellidos del cliente son obligatorios.',
                'dni.required' => 'El DNI del cliente es obligatorio.',
                'email.required' => 'El correo del cliente es obligatorio.',
                'telefono.required' => 'El teléfono del cliente es obligatorio.',
                'direccion.required' => 'La dirección del cliente es obligatoria.',
                'busqueda.required' => 'La búsqueda del cliente es obligatoria.',

                'busqueda.max' => 'La búsqueda no puede tener más de 255 caracteres.',
                'busqueda.min' => 'La búsqueda no puede tener menos de 3 caracteres.',  
            ]
        );

        // Guardar datos validados
        $clientesSave = Clientes::create($validatedData);

        // Alertas de guardado exitoso
        if ($clientesSave) {
            $this->alert('success', '¡Cliente registrado correctamente!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', '¡No se ha podido guardar la información del cliente!', [
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
        return redirect()->route('clientes.index');
    }
}
