<?php

namespace App\Http\Livewire\Inmuebles;

use App\Models\Caracteristicas;
use App\Models\TipoVivienda;
use App\Models\User;
use Livewire\Component;
use App\Models\Inmuebles;
use App\Models\Propietarios;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $identificador;

    public $inmuebles;

    public $m2;
    public $m2_construidos;
    public $habitaciones;
    public $banos;
    public $cod_postal;
    public $disponibilidad;
    public $direccion;
    public $localidad;


    // public $vendedores;
    // public $vendedor_id;
    // public $vendedor_nombre;
    // public $vendedor_dni;
    // public $vendedor_ubicacion;
    // public $vendedor_telefono;
    // public $vendedor_correo;
    public $ruta_imagenes;

    public $propietario;
    public $propietario_id;
    public $propietario_nombre;
    public $propietario_apellidos;
    public $propietario_dni;
    public $propietario_telefono;
    public $propietario_correo;
    public $propietarios = [];

    public $dormitorios;
    public $piscina = 0;
    public $garaje = 0;
    public $ibi;

    public $coste_basura;
    public $precio_venta;
    public $alquiler_semana;
    public $alquiler_mes;
    public $estado="Disponible";

    public $galeriaArray = [];
    public $galeria;
    protected $listeners = ['fileSelected'];

    public function mount()
    {
        //dd($this->identificador);
        //si el identificador es un numero busca el inmueble por id
        if (is_numeric($this->identificador)) {
            $this->inmuebles = Inmuebles::where('id', $this->identificador)->first();
        } else {
            //si el identificador es un array busca el inmueble por id
            $this->inmuebles = Inmuebles::where('id', $this->identificador['id'])->first();
        }
        //dd($this->identificador);
        //dd($this->inmuebles);

        //dd($this->inmuebles);
        $this->propietarios = Propietarios::all();
        //dd($this->inmuebles);
        $this->m2 = $this->inmuebles->m2;
        $this->m2_construidos = $this->inmuebles->m2_construidos;
        $this->direccion = $this->inmuebles->direccion;
        $this->localidad = $this->inmuebles->localidad;
        $this->habitaciones = $this->inmuebles->habitaciones;
        $this->banos = $this->inmuebles->banos;
        $this->dormitorios = $this->inmuebles->dormitorios;
        $this->piscina = $this->inmuebles->piscina;
        $this->garaje = $this->inmuebles->garaje;
        $this->disponibilidad = $this->inmuebles->disponibilidad;
        //dd($this->inmuebles->disponibilidad);

        $this->cod_postal = $this->inmuebles->cod_postal;
        $this->ibi = $this->inmuebles->ibi;
        $this->coste_basura = $this->inmuebles->coste_basura;
        $this->precio_venta = $this->inmuebles->precio_venta;
        $this->alquiler_semana = $this->inmuebles->alquiler_semana;
        $this->alquiler_mes = $this->inmuebles->alquiler_mes;
        $this->estado = $this->inmuebles->estado;
        if($this->estado==null){
            $this->estado="Disponible";
        }

       
        if ($this->inmuebles->galeria != null) {
            $this->galeriaArray = json_decode($this->inmuebles->galeria, true);
        } else {
            $this->galeriaArray = [];
        }
        $this->propietario_id = $this->inmuebles->propietario_id;

        if ($this->propietario_id == "") {
            $this->propietario_nombre = "";
            $this->propietario_apellidos = "";
            $this->propietario_dni = "";
            $this->propietario_ubicacion = "";
            $this->propietario_telefono = "";
            $this->propietario_correo = "";
        } else {
            $propietario = Propietarios::where('id', $this->propietario_id)->first();
            $this->propietario_nombre = $propietario->nombre;
            $this->propietario_apellidos = $propietario->apellidos;
            $this->propietario_dni = $propietario->dni;
            $this->propietario_ubicacion  = $propietario->ubicacion;
            $this->propietario_telefono = $propietario->telefono;
            $this->propietario_correo = $propietario->correo;
        }
    }

    public function render()
    {
        return view('livewire.inmuebles.edit');
    }

    public function update()
    {
        

        $this->galeria = json_encode($this->galeriaArray);

        $validatedData = $this->validate(
            [
                'm2' => 'nullable',
                'm2_construidos' => 'nullable',
                'habitaciones' => 'nullable',
                'banos' => 'nullable',
                'dormitorios' => 'nullable',
                'piscina' => 'nullable',
                'garaje' => 'nullable',
                'propietario_id' => 'nullable',
                'cod_postal' => 'required',
                'direccion' => 'required',
                'localidad' => 'required',
                'galeria' => 'nullable',
                'disponibilidad' => 'nullable',
                'ibi' => 'nullable',
                'coste_basura' => 'nullable',
                'precio_venta' => 'nullable',
                'alquiler_semana' => 'nullable',
                'alquiler_mes' => 'nullable',
                'estado' => 'nullable',


            ],
            // Mensajes de error
            //en ingles
            [
                'm2.required' => 'The m2 field is required.',
                'm2_construidos.required' => 'The m2_construidos field is required.',
                'habitaciones.required' => 'The habitaciones field is required.',
                'banos.required' => 'The banos field is required.',
                'dormitorios.required' => 'The dormitorios field is required.',
                'piscina.required' => 'The piscina field is required.',
                'garaje.required' => 'The garaje field is required.',
                'propietario_id.required' => 'The propietario field is required.',
                'cod_postal.required' => 'The cod_postal field is required.',
                'direccion.required' => 'The direccion field is required.',
                'localidad.required' => 'The localidad field is required.',
                'disponibilidad.required' => 'The disponibilidad field is required.',
                'ibi.required' => 'The ibi field is required.',
                'coste_basura.required' => 'The coste_basura field is required.',
                'precio_venta.required' => 'The precio_venta field is required.',
                'alquiler_semana.required' => 'The alquiler_semana field is required.',
                'alquiler_mes.required' => 'The alquiler_mes field is required.',
            ]
        );

        // Guardar datos validados
        // Encuentra el alumno identificado
        $inmuebles = Inmuebles::find($this->identificador);
        // Guardar datos validados
        $inmueblesSave = $inmuebles->update([
            'm2' => $this->m2,
            'm2_construidos' => $this->m2_construidos,
            'habitaciones' => $this->habitaciones,
            'banos' => $this->banos,
            'dormitorios' => $this->dormitorios,
            'piscina' => $this->piscina,
            'garaje' => $this->garaje,
            'propietario_id' => $this->propietario_id,
            'cod_postal' => $this->cod_postal,
            'direccion' => $this->direccion,
            'localidad' => $this->localidad,
            'galeria' => $this->galeria,
            'disponibilidad' => $this->disponibilidad,
            'ibi' => $this->ibi,
            'coste_basura' => $this->coste_basura,
            'precio_venta' => $this->precio_venta,
            'alquiler_semana' => $this->alquiler_semana,
            'alquiler_mes' => $this->alquiler_mes,
            'estado' => $this->estado,

        ]);

        // Alertas de guardado exitoso
        if ($inmueblesSave) {
            $this->alert('success', 'Properties updated correctly!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Property information could not be saved!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
        }
    }

    public function destroy()
    {

        $this->alert('warning', 'Are you sure you want to delete the property? There is no way back', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmDelete',
            'confirmButtonText' => 'Yes',
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
        return redirect()->route('inmuebles.index');
    }
    // Función para cuando se llama a la alerta
    public function confirmDelete()
    {
        $inmuebles = Inmuebles::find($this->identificador);
        $inmuebles->delete();
        return redirect()->route('inmuebles.index');
    }
    public function fileSelected($url)
    {

        $this->ruta_imagenes = $url;

        // puedes realizar acciones aquí, como almacenar la URL en la base de datos
    }

    public function addGaleria()
    {
        //dd($this->ruta_imagenes);
        //si ruta_imagenes esta separados por comas, es que hay mas de una imagen
        if (strpos($this->ruta_imagenes, ',') !== false) {
            $imagenes = explode(",", $this->ruta_imagenes);
            foreach ($imagenes as $imagen) {
                if (!in_array($imagen, $this->galeriaArray)) {
                    $this->galeriaArray[count($this->galeriaArray) + 1] = $imagen;
                    $this->emit('refreshGalleryComponent', $this->galeriaArray);
                }
            }
        }else if (!in_array($this->ruta_imagenes, $this->galeriaArray)) {
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
            $this->propietario_apellidos = "";
            $this->propietario_dni = "";
            $this->propietario_telefono = "";
            $this->propietario_correo = "";
        } else {
            $propietario = Propietarios::where('id', $this->propietario_id)->first();
            $this->propietario_nombre = $propietario->nombre;
            $this->propietario_apellidos = $propietario->apellidos;
            $this->propietario_dni = $propietario->dni;
            $this->propietario_ubicacion  = $propietario->ubicacion;
            $this->propietario_telefono = $propietario->telefono;
            $this->propietario_correo = $propietario->correo;
        }
    }
}
