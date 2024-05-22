<?php

namespace App\Http\Livewire\Inmuebles;

use App\Models\Caracteristicas;
use App\Models\TipoVivienda;
use App\Models\User;
use Livewire\Component;
use App\Models\Inmuebles;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Clientes;
use App\Models\Propietarios;
class Show extends Component
{
    use LivewireAlert;

    public $identificador;

    public $inmuebles;
    public $inmueble;
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


    public $ruta_imagenes;
    public $imagenes_correo = [];
    public $galeriaArray = [];
    public $galeria;
    public $clientes;
    protected $listeners = ['fileSelected'];

    public function mount()
    {
        
        if (is_numeric($this->identificador)) {
            $this->inmuebles = Inmuebles::where('id', $this->identificador)->first();
        } else {
            //si el identificador es un array busca el inmueble por id
            $this->inmuebles = Inmuebles::where('id', $this->identificador['id'])->first();
        }
        //dd($this->inmuebles , $this->identificador->id);
        $this->propietarios = Propietarios::all();
        $this->clientes = Clientes::all();

        $this->m2 = $this->inmuebles->m2;
        $this->m2_construidos = $this->inmuebles->m2_construidos;
        $this->habitaciones = $this->inmuebles->habitaciones;
        $this->banos = $this->inmuebles->banos;
        $this->cod_postal = $this->inmuebles->cod_postal;

        $this->direccion = $this->inmuebles->direccion;
        $this->localidad = $this->inmuebles->localidad;
        $this->dormitorios = $this->inmuebles->dormitorios;
        $this->piscina = $this->inmuebles->piscina;
        $this->garaje = $this->inmuebles->garaje;
        $this->ibi = $this->inmuebles->ibi;
        $this->coste_basura = $this->inmuebles->coste_basura;
        $this->precio_venta = $this->inmuebles->precio_venta;
        $this->alquiler_semana = $this->inmuebles->alquiler_semana;
        $this->alquiler_mes = $this->inmuebles->alquiler_mes;

   
        $this->disponibilidad = $this->inmuebles->disponibilidad;

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
            $this->propietario_telefono = "";
            $this->propietario_correo = "";
        } else {
            $propietario = Propietarios::where('id', $this->propietario_id)->first();
            //dd($propietario);
            $this->propietario_nombre = $propietario->nombre;
            $this->propietario_apellidos  = $propietario->apellidos;
            $this->propietario_dni = $propietario->dni;
            $this->propietario_telefono = $propietario->telefono;
            $this->propietario_correo = $propietario->correo;
        }
    }

    public function render()
    {
        return view('livewire.inmuebles.show');
    }

    public function update()
    {
        
        $this->galeria = json_encode($this->galeriaArray);

        $validatedData = $this->validate(
            [
                'direccion' => 'required',
                'localidad' => 'required',

                'm2' => 'required',
                'm2_construidos' => 'required',
                'habitaciones' => 'required',
                'banos' => 'required',
                'dormitorios' => 'nullable',
                'piscina' => 'nullable',
                'garaje' => 'nullable',
                'propietario_id' => 'required',
                'cod_postal' => 'required',
                'galeria' => 'nullable',
                'disponibilidad' => 'required',
            ],
            // Mensajes de error
            [
                'direccion.required' => 'El campo dirección es obligatorio',
                'localidad.required' => 'El campo localidad es obligatorio',
                'm2.required' => 'El campo m2 es obligatorio',
                'm2_construidos.required' => 'El campo m2 construidos es obligatorio',
                'habitaciones.required' => 'El campo habitaciones es obligatorio',
                'banos.required' => 'El campo baños es obligatorio',
                'propietario_id.required' => 'El campo propietario es obligatorio',
                'cod_postal.required' => 'El campo código postal es obligatorio',
                'disponibilidad.required' => 'El campo disponibilidad es obligatorio',
            ]
        );

        // Guardar datos validados
        // Encuentra el alumno identificado
        $inmuebles = Inmuebles::find($this->identificador);
        $inmueblesSave = true;
        // // Guardar datos validados
        // $inmueblesSave = $inmuebles->update([
        //     'direccion' => $this->direccion,
        //     'descripcion' => $this->descripcion,
        //     'm2' => $this->m2,
        //     'm2_construidos' => $this->m2_construidos,
        //     'valor_referencia' => $this->valor_referencia,
        //     'habitaciones' => $this->habitaciones,
        //     'banos' => $this->banos,
        //     'tipo_vivienda_id' => $this->tipo_vivienda_id,
        //     'propietario_id' => $this->propietario_id,
        //     'ubicacion' => $this->ubicacion,
        //     'cod_postal' => $this->cod_postal,
        //     'cert_energetico' => $this->cert_energetico,
        //     'cert_energetico_elegido' => $this->cert_energetico_elegido,
        //     'estado' => $this->estado,
        //     'galeria' => $this->galeria,
        //     'disponibilidad' => $this->disponibilidad,
        //     'otras_caracteristicas' => $this->otras_caracteristicas,
        //     'referencia_catastral' => $this->referencia_catastral,

        // ]);

        // Alertas de guardado exitoso
        if ($inmueblesSave) {
            $this->alert('success', '¡Inmuebles actualizada correctamente!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', '¡No se ha podido guardar la información del inmuebles!', [
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

        $this->alert('warning', '¿Seguro que desea borrar el inmuebles? No hay vuelta atrás', [
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
            $this->propietario_apellidos = "";
            $this->propietario_dni = "";
            $this->propietario_telefono = "";
            $this->propietario_correo = "";
        } else {
            $propietario = Propietarios::where('id', $this->propietario_id)->first();
            $this->propietario_nombre = $propietario->nombre;
            $this->propietario_apellidos  = $propietario->apellidos;
            $this->propietario_dni = $propietario->dni;
            $this->propietario_telefono = $propietario->telefono;
            $this->propietario_correo = $propietario->correo;
        }
    }
    public function deleteImagen($key)
    {
        if (count($this->imagenes_correo) == 1) {
            $this->imagenes_correo = [];
        } else {
            unset($this->imagenes_correo[$key]);
            $this->imagenes_correo = array_values($this->imagenes_correo);
        }
    }

    public function enviarCorreoImagenes($inmueble_id)
    {

        $inmueble = Inmuebles::where('id', $inmueble_id)->first();
        $cliente = Clientes::where('id', $this->cliente_id)->first();

       

        $imagenes_adjuntadas = [];

        foreach (json_decode($inmueble->galeria, true) as $key => $imagen) {
            if (in_array($key, $this->imagenes_correo)) {
                $imagenes_adjuntadas[] = $imagen;
            }
        }

        $texto = 'Buenas, ' . $cliente->nombre . '. Te enviamos una selección de imágenes del inmueble ' . $inmueble->titulo;

        // Mail::raw($texto, function ($message) use ($cliente, $nombre_inmobiliaria, $inmueble, $imagenes_adjuntadas) {
        //     $message->from('admin@grupocerban.com', $nombre_inmobiliaria);
        //     $message->to($cliente->email, $cliente->nombre_completo);
        //     $message->to(env('MAIL_USERNAME'));
        //     $message->subject($nombre_inmobiliaria . " - Imágenes del inmueble" . $inmueble->titulo);

        //     foreach ($imagenes_adjuntadas as $ruta_imagen) {
        //         $message->attach($ruta_imagen);
        //     }
        // });
    }

    public function addImagen($key)
    {
        $this->imagenes_correo[] = $key;
    }
}
