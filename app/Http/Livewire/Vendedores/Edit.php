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
           //en ingles
            [
                'nombre_completo.required' => 'The name field is required',
                'dni.required' => 'The DNI field is required',
                'role.required' => 'The role field is required',
                'password.required' => 'The password field is required',
                'telefono.required' => 'The phone field is required',
                'email.required' => 'The email field is required',
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
            $this->alert('success', 'Seller successfully updated!', [
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

    public function destroy()
    {
        // $product = Productos::find($this->identificador);
        // $product->delete();

        $this->alert('warning', 'Are you sure you want to delete the housing type? There is no way back', [
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
