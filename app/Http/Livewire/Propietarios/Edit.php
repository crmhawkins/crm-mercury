<?php

namespace App\Http\Livewire\Propietarios;

use App\Models\Propietarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $identificador;
    public $nombre;
    public $apellidos;
    public $dni;
   
    public function mount()
    {
        $this->propietarios = Propietarios::find($this->identificador);
        $this->nombre = $this->propietarios->nombre;
        $this->apellidos = $this->propietarios->apellidos;
        $this->dni = $this->propietarios->dni;

    }

    public function render()
    {

        return view('livewire.propietarios.edit');
    }

    public function update()
    {

        $validatedData = $this->validate(
            [
                'nombre' => 'required',
                'apellidos' => 'required',
                'dni' => 'required',

            ],
            // Mensajes de error
            [
                'nombre.required' => 'El nombre es obligatorio.',
                'apellidos.required' => 'El nombre es obligatorio.',
                'dni.required' => 'El nombre es obligatorio.',


            ]
        );
        // Guardar datos validados
        // Encuentra el alumno identificado
        $propietarios = Propietarios::find($this->identificador);

        // Guardar datos validados
        $propietariosSave = $propietarios->update([
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'dni' => $this->dni,

        ]);

        // Alertas de guardado exitoso
        if ($propietariosSave) {
            $this->alert('success', '¡Propietario actualizado correctamente!', [
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

    public function destroy()
    {
        // $product = Productos::find($this->identificador);
        // $product->delete();

        $this->alert('warning', '¿Seguro que desea borrar el tipo de vivienda? No hay vuelta atrás', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmDelete',
            'confirmButtonText' => 'Sí',
            'showDenyButton' => true,
            'denyButtonText' => 'No',
            'timerProgressBar' => true,
        ]);
    }

    public function getListeners()
    {
        return [
            'confirmed',
            'confirmDelete'
        ];
    }

    // Función para cuando se llama a la alerta
    public function confirmed()
    {
        // Do something
        return redirect()->route('propietarios.index');
    }
    // Función para cuando se llama a la alerta
    public function confirmDelete()
    {
        $propietarios = User::find($this->identificador);
        $propietarios->delete();
        return redirect()->route('propietarios.index');
    }

    public function generarPassword(){
        $this->password = Str::random(10);
    }
}
