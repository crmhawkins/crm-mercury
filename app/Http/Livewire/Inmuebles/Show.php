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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Models\InmueblesRecibidos;

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
    public $daily_rental_price;
    public $reference_number;


    public $ruta_imagenes;
    public $imagenes_correo = [];
    public $galeriaArray = [];
    public $galeria;
    public $clientes;
    public $cliente_correo;
    public $cliente_id;
    protected $listeners = ['fileSelected'];
    public $inmueblesRecibidos;
    public $descripcion;
    public $tipo_inmueble;

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

        $this->descripcion = $this->inmuebles->descripcion;
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
        $this->inmueblesRecibidos = InmueblesRecibidos::where('inmueble_id', $this->identificador)->get();
        $this->tipo_inmueble = $this->inmuebles->tipo_inmueble;
        $this->daily_rental_price = $this->inmuebles->daily_rental_price;
        $this->reference_number = $this->inmuebles->reference_number;


   
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
            $this->propietario_apellidos  = $propietario->apellido;
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
                'reference_number' => 'nullable',
                
            ],
            // Mensajes de error
            //en ingles
            [
                'direccion.required' => 'The address field is required.',
                'localidad.required' => 'The location field is required.',
                'm2.required' => 'The m2 field is required.',
                'm2_construidos.required' => 'The built m2 field is required.',
                'habitaciones.required' => 'The rooms field is required.',
                'banos.required' => 'The bathrooms field is required.',
                'dormitorios.required' => 'The bedrooms field is required.',
                'piscina.required' => 'The pool field is required.',
                'garaje.required' => 'The garage field is required.',
                'propietario_id.required' => 'The owner field is required.',
                'cod_postal.required' => 'The postal code field is required.',
                'galeria.required' => 'The gallery field is required.',
                'disponibilidad.required' => 'The availability field is required.',
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

    public function createWindowCard(){


    }

    public function destroy()
    {
        // $product = Productos::find($this->identificador);
        // $product->delete();

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
            $this->propietario_apellidos  = $propietario->apellido;
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


    public function registerMailed($inmueble_id ){
        if($this->cliente_id == null){
            $this->alert('error', 'No customer selected!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
            return;
        }

        $inmueble = Inmuebles::where('id', $inmueble_id)->first();
        $cliente = Clientes::where('id', $this->cliente_id)->first();

        //si el cliente no esta en inmuebles recibidos lo añade
        if(!InmueblesRecibidos::where('cliente_id', $cliente->id)->where('inmueble_id', $inmueble->id)->exists()){
            InmueblesRecibidos::create([
                'cliente_id' => $cliente->id,
                'inmueble_id' => $inmueble->id,
            ]);
        }

        $this->InmueblesRecibidos = InmueblesRecibidos::where('inmueble_id', $inmueble_id)->get();

        $this->alert('success', 'Property registered as sent to client!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
        ]);

        //refrescar campos de la vista
    }

    public function enviarCorreoImagenes($inmueble_id)
    {
        if($this->cliente_id == null){
            $this->alert('error', 'No customer selected!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
            return;
        }



        $inmueble = Inmuebles::where('id', $inmueble_id)->first();
        $cliente = Clientes::where('id', $this->cliente_id)->first();
       

        $imagenes_adjuntadas = [];

        foreach (json_decode($inmueble->galeria, true) as $key => $imagen) {
           
           
                $imagenes_adjuntadas[] = $imagen;

                //solo enviar 4 imagenes
                
                
            
        }
        //dd( $imagenes_adjuntadas);

        $texto = 'Dear ' . $cliente->nombre . ',<br><br>

        We are pleased to send you a selection of images of the property located at ' . $inmueble->direccion . ', ' . $inmueble->localidad . ' ' . $inmueble->cod_postal . ' along with its main features.<br><br>

        The property includes ' . $inmueble->habitaciones . ' rooms, ' . $inmueble->banos . ' bathrooms, with a total area of ' . $inmueble->m2 . ' m² and ' . $inmueble->m2_construidos . ' m² built. It also features ' . $inmueble->dormitorios . ' bedrooms' . ($inmueble->piscina ? ', a pool' : '') . ($inmueble->garaje ? ', and a garage' : '') . '.<br><br>

        You can view the images below:<br><div style="display:flex; flex-wrap:wrap; justify-content:center; gap: 20px;">';

        // Añadir imágenes al cuerpo del correo
        foreach ($imagenes_adjuntadas as $ruta_imagen) {
            //dd($ruta_imagen);
            $url = $ruta_imagen; // Suponiendo que $ruta_imagen ya es una URL pública
            $texto .= '<img src="' . $url . '" alt="Property Image" style="max-width: 600px; margin: 10px;">';
        }

        $texto .= '</div><br>For more information, do not hesitate to contact us.<br><br> Best regards,<br> Mercury Properties';
        // Enviar el correo con HTML

        //try catch para enviar el correo

        try{
            if(isset($cliente->email) && $cliente->email != null && $cliente->email != ''){
                
                Mail::send([], [], function ($message) use ($cliente, $inmueble, $texto) {
                    $message->from('dani.mefle@hawkins.es', 'Mercury Properties');
                    $message->to($cliente->email, $cliente->nombre . ' ' . $cliente->apellido);
                    $message->cc(env('MAIL_USERNAME'));
                    $message->subject("Mercury Properties - Images of the property at " . $inmueble->direccion . ', ' . $inmueble->localidad . ' ' . $inmueble->cod_postal);
                    $message->html($texto); // Usar 'html' en lugar de 'setBody'
                });

                //si el cliente no esta en inmuebles recibidos lo añade
                if(!InmueblesRecibidos::where('cliente_id', $cliente->id)->where('inmueble_id', $inmueble->id)->exists()){
                    InmueblesRecibidos::create([
                        'cliente_id' => $cliente->id,
                        'inmueble_id' => $inmueble->id,
                    ]);
                }

                $this->alert('success', 'Email sent successfully!', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => false,
                ]);
            }else{
                $this->alert('error', 'The customer does not have an email address!', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => false,
                ]);
            }


        }catch(\Exception $e){
            $this->alert('error', 'Error sending email!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
            return;
        }


        
    }

    public function addImagen($key)
    {
        $this->imagenes_correo[] = $key;
    }
}
