<?php

namespace App\Http\Livewire\Inmuebles;

use App\Models\Caracteristicas;
use App\Models\Inmuebles;
use App\Models\TipoVivienda;
use App\Models\User;
use App\Models\Propietarios;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Http\Request;

class Create extends Component
{
    use LivewireAlert;

    //public $caracteristicas;
    //public $titulo;
    //public $descripcion;
    public $m2;
    public $m2_construidos;

    //public $valor_referencia;

    public $habitaciones;
    public $banos;

    public $cod_postal;

    //public $ubicacion;
    public $direccion;
    public $localidad;

    //public $cert_energetico;
    //public $cert_energetico_elegido;
    //public $inmobiliaria = null;
    //public $estado;
    public $disponibilidad;
    //public $otras_caracteristicasArray = [];

    //public $otras_caracteristicas;
    //public $referencia_catastral;

    //public $vendedores;
    //public $vendedor_id;
    //public $vendedor_nombre;
    //public $vendedor_dni;
    //public $vendedor_ubicacion;
    //public $vendedor_telefono;
    //public $vendedor_correo;
    public $propietario;
    public $propietario_id;
    public $propietario_nombre;
    public $propietario_apellidos;
    public $propietario_dni;
    public $propietario_telefono;
    public $propietario_correo;

    public $dormitorios;
    public $piscina = 0;
    public $garaje = 0;
    public $ibi;

    public $coste_basura;
    public $precio_venta;
    public $alquiler_semana;
    public $alquiler_mes;

    
    public $ruta_imagenes;
    public $galeriaArray = [];
    public $galeria;

    protected $listeners = ['fileSelected'];



    public function mount()
    {
        $this->propietarios = Propietarios::all();
    }

    // Renderizado del Componente
    public function render()
    {
        return view('livewire.inmuebles.create');
    }

    public function submit()
    {
        
        $this->galeria = json_encode($this->galeriaArray);
        //dd($this->disponibilidad);

        $validatedData = $this->validate(
            [
                'm2' => 'required',
                'm2_construidos' => 'required',
                'habitaciones' => 'required',
                'banos' => 'required',
                'cod_postal' => 'required',
                'galeria' => 'nullable',
                'direccion' => 'required',
                'localidad' => 'required',
                'propietario_id' => 'required',
                'dormitorios' => 'required',
                'piscina' => 'required',
                'garaje' => 'required',
                'ibi' => 'required',
                'coste_basura' => 'required',
                'precio_venta' => 'required',
                'alquiler_semana' => 'required',
                'alquiler_mes' => 'required',
                'disponibilidad' => 'required', 

            ],
            // Mensajes de error
            [

                'm2.required' => 'El campo m2 es obligatorio',
                'm2_construidos.required' => 'El campo m2 construidos es obligatorio',
                'habitaciones.required' => 'El campo habitaciones es obligatorio',
                'banos.required' => 'El campo baños es obligatorio',
                'cod_postal.required' => 'El campo código postal es obligatorio',
                'estado.required' => 'El campo estado es obligatorio',
                'direccion.required' => 'El campo dirección es obligatorio',
                'localidad.required' => 'El campo localidad es obligatorio',
                'propietario_id.required' => 'El campo propietario es obligatorio',
                'dormitorios.required' => 'El campo dormitorios es obligatorio',
                'piscina.required' => 'El campo piscina es obligatorio',
                'garaje.required' => 'El campo garaje es obligatorio',
                'ibi.required' => 'El campo ibi es obligatorio',
                'coste_basura.required' => 'El campo coste basura es obligatorio',
                'precio_venta.required' => 'El campo precio venta es obligatorio',
                'alquiler_semana.required' => 'El campo alquiler semana es obligatorio',
                'alquiler_mes.required' => 'El campo alquiler mes es obligatorio',
                'disponibilidad.required' => 'El campo disponibilidad es obligatorio',


            ]
        );

        // Guardar datos validados
        $inmueblesSave = Inmuebles::create($validatedData);

        // Alertas de guardado exitoso
        if ($inmueblesSave) {
            $this->alert('success', '¡Inmueble registrado correctamente!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', '¡No se ha podido guardar la información del inmueble!', [
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
        return redirect()->route('inmuebles.index');
    }

    public function fileSelected($url)
    {

        $this->ruta_imagenes = $url;

        // puedes realizar acciones aquí, como almacenar la URL en la base de datos
    }

    public function addGaleria()
    {
        if (!in_array($this->ruta_imagenes, $this->galeriaArray)) {
            $this->galeriaArray[count($this->galeriaArray) + 1] = $this->ruta_imagenes;
            $this->emit('refreshGalleryComponent', $this->galeriaArray);
        }
    }

    public function eliminarImagen($id)
    {
        unset($this->galeriaArray[$id]);
    }

    public function updated()
    {
        if ($this->propietario_id == "") {
            $this->propietario_nombre = "";
            $this->propietario_dni = "";
            $this->propietario_telefono = "";
            $this->propietario_correo = "";
        } else {
            $propietario = Propietarios::where('id', $this->propietario_id)->first();
            $this->propietario_nombre = $propietario->nombre;
            $this->propietario_apellidos = $propietario->apellidos;
            $this->propietario_dni = $propietario->dni;
            $this->propietario_telefono = $propietario->telefono;
            $this->propietario_correo = $propietario->correo;
        }
    }
}
