<?php

namespace App\Http\Livewire\Vendedores;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Vendedores;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $identificador;
    public $vendedores;
    public $nombre_completo;
    public $dni;
    public $role;
    public $password;
    public $newPassword;
    public $telefono;
    public $email;
    public function mount()
    {
        $this->vendedores = User::find($this->identificador);
        $this->nombre_completo = $this->vendedores->nombre_completo;
        $this->dni = $this->vendedores->dni;
        $this->role = $this->vendedores->role;
        $this->telefono = $this->vendedores->telefono;
        $this->password = $this->vendedores->password;
        $this->email = $this->vendedores->email;

      
    }

    public function render()
    {

        return view('livewire.vendedores.edit');
    }

    public function update()
    {

        if($this->newPassword!=null && $this->password != $this->newPassword ){
            $this->password = Hash::make($this->newPassword);
        }



        $validatedData = $this->validate(
            [
                'nombre_completo' => 'required',
                'dni' => 'required',
                'role' => 'required',
                'password' => 'nullable',
                'telefono' => 'required',
                'email' => 'required',
            ],
            // Mensajes de error
            [
                'nombre_completo.required' => 'El nombre es obligatorio.',
                'dni.required' => 'El nombre es obligatorio.',
                'role.required' => 'El nombre es obligatorio.',
                'telefono.required' => 'El nombre es obligatorio.',
                'email.required' => 'El nombre es obligatorio.',

            ]
        );
        // Guardar datos validados
        // Encuentra el alumno identificado
        $vendedores = User::find($this->identificador);

        // Guardar datos validados
        $vendedoresSave = $vendedores->update([
            'nombre_completo' => $this->nombre_completo,
            'dni' => $this->dni,
            'role' => $this->role,
            'password' => $this->password,
            'telefono' => $this->telefono,
            'email' => $this->email,
        ]);

        // Alertas de guardado exitoso
        if ($vendedoresSave) {
            $this->alert('success', '¡Vendedor actualizado correctamente!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', '¡No se ha podido guardar la información del vendedor!', [
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
        return redirect()->route('vendedores.index');
    }
    // Función para cuando se llama a la alerta
    public function confirmDelete()
    {
        $vendedores = User::find($this->identificador);
        $vendedores->delete();
        return redirect()->route('vendedores.index');
    }

    public function generarPassword(){
        $this->newPassword = Str::random(10);
    }
}
