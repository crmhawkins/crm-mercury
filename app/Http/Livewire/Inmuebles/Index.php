<?php

namespace App\Http\Livewire\Inmuebles;

use App\Models\Inmuebles;
use App\Models\Caracteristicas;
use App\Models\TipoVivienda;
use App\Models\Clientes;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    public $inmuebles;
    public $acordeon_activo;
    public $clientes;
    public $cliente_id = 1;
    public $imagenes_correo = [];

    public $m2_max;
    public $opcionesPrecio;
    public $opcionesPrecioAlquilerMensual;
    public $opcionesPrecioAlquilerSemana;
    public $opcionesTamano;
    public $estadoSeleccionados = [];
    public $localidad;
    public $habitacionesSeleccionadas = [];
    public $banosSeleccionados = [];
    public $dormitoriosSeleccionados = [];
    public $garaje;
    public $piscina;
    public $m2_min;
    public $valor_min;
    public $valor_max;
    public $ubicacion;
    public $tipos_seleccionados = [];
    public $disponibilidad_seleccionados = [];
    public $cod_postal;
    

    public $valor_venta_min;
    public $valor_venta_max;

    public $alquiler_mensual_min;
    public $alquiler_mensual_max;

    public $alquiler_semana_min;
    public $alquiler_semana_max;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->opcionesPrecio = $this->opcionesDePrecio();
        $this->opcionesPrecioAlquilerMensual = $this->opcionesPrecioAlquilerMensual();
        $this->opcionesPrecioAlquilerSemana = $this->opcionesPrecioAlquilerSemana();
        $this->opcionesTamano = $this->opcionesDeTamano();
        $this->clientes = Clientes::all();
        $this->inmuebles = Inmuebles::all();
    }


   private function opcionesPrecioAlquilerMensual()
   {
         return range(200, 10000, 200); // Asegúrate de que esto retorne un array
    }
    
     private function opcionesPrecioAlquilerSemana()
     {
          return range(100, 10000, 200); // Asegúrate de que esto retorne un array
     }

    private function opcionesDePrecio()
    {
        return range(20000, 1000000, 20000); // Asegúrate de que esto retorne un array
    }

    private function opcionesDeTamano()
    {
        return range(20, 1000, 20); // Asegúrate de que esto retorne un array
    }
    public function updateInmuebles()
    {
        $query = Inmuebles::query();

        if (!empty($this->habitacionesSeleccionadas)) {
            if (in_array('4', $this->habitacionesSeleccionadas)) {
                $query->whereIn('habitaciones', $this->habitacionesSeleccionadas)->orWhere('habitaciones', '>', '4');
            } else {
                $query->whereIn('habitaciones', $this->habitacionesSeleccionadas);
            }
        }
        if (!empty($this->banosSeleccionados)) {
            if (in_array('3', $this->banosSeleccionados)) {
                $query->whereIn('banos', $this->banosSeleccionados)->orWhere('banos', '>', '3');
            } else {
                $query->whereIn('banos', $this->banosSeleccionados);
            }
        }

        if (!empty($this->dormitoriosSeleccionados)) {
            if (in_array('3', $this->dormitoriosSeleccionados)) {
                $query->whereIn('dormitorios', $this->dormitoriosSeleccionados)->orWhere('dormitorios', '>', '3');
            } else {
                $query->whereIn('dormitorios', $this->dormitoriosSeleccionados);
            }
        }

        if(!empty($this->estadoSeleccionados)){
            $query->whereIn('estado', $this->estadoSeleccionados);
        }

        if ($this->garaje == 1) {
            $query->where('garaje', 1);
        }

        if ($this->piscina == 1) {
            $query->where('piscina', 1);
        }



        if(!empty($this->localidad)){
            $query->where('localidad', 'LIKE',"%". $this->localidad ."%");
        }

        if(!empty($this->cod_postal)){
            $query->where('cod_postal', 'LIKE',"%". $this->cod_postal ."%");
        }
        
        if (!empty($this->tipos_seleccionados)) {
            $query->whereIn('tipo_vivienda_id', $this->tipos_seleccionados);
        }
        if (!empty($this->disponibilidad_seleccionados)) {
            $query->whereIn('disponibilidad', $this->disponibilidad_seleccionados);
        }
        
        if ($this->valor_min != null & $this->valor_max != null) {
            $query->whereBetween('valor_referencia', [floatval($this->valor_min), floatval($this->valor_max)]);
        }
        if($this->valor_venta_min != null & $this->valor_venta_max != null){
            $query->whereBetween('precio_venta', [floatval($this->valor_venta_min), floatval($this->valor_venta_max)]);
        }
        if($this->alquiler_mensual_min != null & $this->alquiler_mensual_max != null){
            $query->whereBetween('alquiler_mes', [floatval($this->alquiler_mensual_min), floatval($this->alquiler_mensual_max)]);
        }
        if($this->alquiler_semana_min != null & $this->alquiler_semana_max != null){
            $query->whereBetween('alquiler_semana', [floatval($this->alquiler_semana_min), floatval($this->alquiler_semana_max)]);
        }


        if ($this->m2_min != null & $this->m2_max != null) {
            $query->whereBetween('m2', [$this->m2_min, $this->m2_max]);
        }
        if ($this->ubicacion != "" && $this->localidad != null) {
            $query->where('localidad', 'LIKE',"%". $this->localidad ."%")->orWhere('cod_postal', 'LIKE',"%". $this->localidad ."%");
        }
        $this->inmuebles = $query->get();

        $this->emit('refreshComponent');
    }
    public function render()
    {
        return view('livewire.inmuebles.index');
    }

    public function setActiveInmueble($acordeon_activo)
    {
        $this->acordeon_activo = $acordeon_activo;
        $this->cliente_id = 1;
        $this->imagenes_correo = [];
    }
    public function updated($propertyName)
    {
        if (
            $propertyName == 'habitacionesSeleccionadas' ||
            $propertyName == 'banosSeleccionados' ||
            $propertyName == 'valor_min' ||
            $propertyName == 'valor_max' ||
            $propertyName == 'm2_min' ||
            $propertyName == 'm2_max' ||
            $propertyName == 'disponibilidad_seleccionados' ||
            $propertyName == 'ubicacion' ||
            $propertyName == 'localidad' ||
            $propertyName == 'cod_postal' ||
            $propertyName == 'valor_venta_min' ||
            $propertyName == 'valor_venta_max' ||
            $propertyName == 'alquiler_mensual_min' ||
            $propertyName == 'alquiler_mensual_max' ||
            $propertyName == 'alquiler_semana_min' ||
            $propertyName == 'alquiler_semana_max' ||
            $propertyName == 'garaje' ||
            $propertyName == 'piscina' ||
            $propertyName == 'dormitoriosSeleccionados' ||
            $propertyName == 'estadoSeleccionados' 
        ) {
            $this->updateInmuebles();
        }
    }
}
