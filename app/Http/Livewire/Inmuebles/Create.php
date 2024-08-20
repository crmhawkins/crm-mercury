<?php

namespace App\Http\Livewire\Inmuebles;

use App\Models\Caracteristicas;
use App\Models\Inmuebles;
use App\Models\TipoVivienda;
use App\Models\TipoInmueble;
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
    public $estado = "Disponible";
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
    public $descripcion;
    public $coste_basura;
    public $precio_venta;
    public $alquiler_semana;
    public $alquiler_mes;
    public $tipo_inmueble;
    public $tipos;
    public $daily_rental_price;

    
    public $ruta_imagenes;
    public $galeriaArray = [];
    public $galeria;
    public $reference_number;

    protected $listeners = ['fileSelected'];



    public function mount()
    {
        $this->propietarios = Propietarios::all();
        $this->tipos = TipoInmueble::all();
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
        if($this->propietario_id == ""){
            $this->propietario_id = null;
        }

        if($this->dormitorios == ""){
            $this->dormitorios = null;
        }

        if($this->piscina == ""){
            $this->piscina = 0;
        }

        if($this->garaje == ""){
            $this->garaje = 0;
        }

        if($this->ibi == ""){
            $this->ibi = null;
        }

        if($this->coste_basura == ""){
            $this->coste_basura = null;
        }

        if($this->precio_venta == ""){
            $this->precio_venta = null;
        }

        if($this->alquiler_semana == ""){
            $this->alquiler_semana = null;
        }

        if($this->alquiler_mes == ""){
            $this->alquiler_mes = null;
        }

        if($this->daily_rental_price == ""){
            $this->daily_rental_price = null;
        }

        if($this->tipo_inmueble == ""){
            $this->tipo_inmueble = null;
        }

        if($this->m2 == ""){
            $this->m2 = null;
        }

        if($this->m2_construidos == ""){
            $this->m2_construidos = null;
        }

        if($this->habitaciones == ""){
            $this->habitaciones = null;
        }

        if($this->banos == ""){
            $this->banos = null;
        }

        if($this->cod_postal == ""){
            $this->cod_postal = null;
        }

        if($this->direccion == ""){
            $this->direccion = null;
        }

        if($this->localidad == ""){
            $this->localidad = null;
        }

        if($this->disponibilidad == ""){
            $this->disponibilidad = null;
        }

        if($this->descripcion == ""){
            $this->descripcion = null;
        }
        


        $validatedData = $this->validate(
            [
                'descripcion' => 'nullable',
                'm2' => 'nullable',
                'm2_construidos' => 'nullable',
                'habitaciones' => 'nullable',
                'banos' => 'nullable',
                'cod_postal' => 'nullable',
                'galeria' => 'nullable',
                'direccion' => 'required',
                'localidad' => 'required',
                'propietario_id' => 'nullable',
                'estado' => 'nullable',
                'dormitorios' => 'nullable',
                'piscina' => 'nullable',
                'garaje' => 'nullable',
                'ibi' => 'nullable',
                'coste_basura' => 'nullable',
                'precio_venta' => 'nullable',
                'alquiler_semana' => 'nullable',
                'alquiler_mes' => 'nullable',
                'disponibilidad' => 'nullable', 
                'tipo_inmueble' => 'nullable',
                'daily_rental_price' => 'nullable',
                'reference_number' => 'nullable'

            ],
            //mensajes de error en ingles
            [
                'm2.required' => 'The m2 field is required.',
                'm2_construidos.required' => 'The built m2 field is required.',
                'habitaciones.required' => 'The rooms field is required.',
                'banos.required' => 'The bathrooms field is required.',
                'cod_postal.required' => 'The postal code field is required.',
                'galeria.required' => 'The gallery field is required.',
                'direccion.required' => 'The address field is required.',
                'localidad.required' => 'The location field is required.',
                'propietario_id.required' => 'The owner field is required.',
                'estado.required' => 'The state field is required.',
                'dormitorios.required' => 'The bedrooms field is required.',
                'piscina.required' => 'The pool field is required.',
                'garaje.required' => 'The garage field is required.',
                'ibi.required' => 'The ibi field is required.',
                'coste_basura.required' => 'The garbage cost field is required.',
                'precio_venta.required' => 'The sale price field is required.',
                'alquiler_semana.required' => 'The weekly rental field is required.',
                'alquiler_mes.required' => 'The monthly rental field is required.',
                'disponibilidad.required' => 'The availability field is required.',
                
            ]
            
        );

        // Guardar datos validados
        $inmueblesSave = Inmuebles::create($validatedData);

        // Alertas de guardado exitoso
        if ($inmueblesSave) {
            $this->alert('success', 'Property registered correctly!', [
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
