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
                'dni' => 'nullable',
                'telefono' => 'nullable',
                'email' => 'nullable',
                'direccion' => 'nullable',
                'busqueda' => 'nullable | max:255 | min:3',
            ],
            // Mensajes de error
           //required en ingles
            [
                'nombre.required' => 'The name field is required.',
                'apellido.required' => 'The surname field is required.',
                'dni.required' => 'The dni field is required.',
                'telefono.required' => 'The telephone field is required.',
                'email.required' => 'The email field is required.',
                'direccion.required' => 'The address field is required.',
                'busqueda.required' => 'The Search field is required.',
                'busqueda.max' => 'The search field must be less than 255 characters.',
                'busqueda.min' => 'The search field must be at least 3 characters.',
            ]
        );

        //dd($this->busqueda);

        // Guardar datos validados
        $clientesSave = Clientes::create($validatedData);

        // Alertas de guardado exitoso
        if ($clientesSave) {
            $this->alert('success', 'Successfully registered customer!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Could not save customer information!', [
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
