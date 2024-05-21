<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Caracteristicas;
use App\Models\Inmuebles;
use App\Models\TipoVivienda;
use Livewire\Component;
use App\Models\Clientes;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use App\Models\HojaVisita;
use DateTime;
use IntlDateFormatter;
class Edit extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $identificador;
    protected $paginationTheme = 'bootstrap';

    public $nombre;
    public $apellido;
    public $dni;
    public $telefono;
    public $email;
    public $direccion;
    public $busqueda;

    public $clientes;

    public $visitas;
    //conjunto visita e inmueble
    public $visita_inmueble = [];

    public function mount()
    {
        $this->clientes = Clientes::find($this->identificador);
        $this->nombre = $this->clientes->nombre;
        $this->apellido = $this->clientes->apellido;
        $this->dni = $this->clientes->dni;
        $this->telefono = $this->clientes->telefono;
        $this->email = $this->clientes->email;
        $this->direccion = $this->clientes->direccion;
        $this->busqueda = $this->clientes->busqueda;
        $this->visitas = HojaVisita::where('cliente_id', $this->identificador)->get();
        if($this->visitas->count() > 0){
            $this->visita_inmueble = collect();
            foreach ($this->visitas as $visita) {
                $inmueble = Inmuebles::find($visita->inmueble_id);
                $this->visita_inmueble->push([
                    'visita' => $visita,
                    'inmueble' => $inmueble
                ]);
            }
        }
        //dd($this->visita_inmueble);

    }


    public function formatearFecha($fecha) {
       // Convertir la fecha a objeto DateTime
       $date = new DateTime($fecha);
        
       // Array con los nombres de los meses en español
       $meses = [
           'January' => 'Enero', 'February' => 'Febrero', 'March' => 'Marzo', 'April' => 'Abril',
           'May' => 'Mayo', 'June' => 'Junio', 'July' => 'Julio', 'August' => 'Agosto',
           'September' => 'Septiembre', 'October' => 'Octubre', 'November' => 'Noviembre', 'December' => 'Diciembre'
       ];

       // Formatear la fecha en el formato deseado
       $fecha_formateada = $date->format('d') . ' de ' . $meses[$date->format('F')] . ' de ' . $date->format('Y');

       return $fecha_formateada;
    }

    public function render()
    {
        return view('livewire.clientes.edit');
    }

    public function update()
    {
       $this->validate(
            [
                'nombre' => 'required',
                'apellido' => 'required',
                'dni' => 'required',
                'telefono' => 'required',
                'email' => 'required',
                'direccion' => 'required',
                'busqueda' => 'required | max:255 | min:3'
,
            ],
            // Mensajes de error
            [
                'nombre.required' => 'El nombre es obligatorio.',
                'apellido.required' => 'El apellido es obligatorio.',
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
        // Encuentra el alumno identificado
        $clientes = Clientes::find($this->identificador);

        // Guardar datos validados
        $clientesSave = $clientes->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'dni' => $this->dni,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'busqueda' => $this->busqueda,
        ]);

        // Alertas de guardado exitoso
        if ($clientesSave) {
            $this->alert('success', '¡Cliente actualizado correctamente!', [
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

    public function destroy()
    {
        // $product = Productos::find($this->identificador);
        // $product->delete();

        $this->alert('warning', '¿Seguro que desea borrar el cliente? No hay vuelta atrás', [
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
        return redirect()->route('clientes.index');
    }
    // Función para cuando se llama a la alerta
    public function confirmDelete()
    {
        $clientes = Clientes::find($this->identificador);
        $clientes->delete();
        return redirect()->route('clientes.index');
    }
}
