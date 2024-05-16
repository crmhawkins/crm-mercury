<?php

namespace App\Http\Livewire\Inmuebles;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TabsComponent extends Component
{
    protected $listeners = ['seleccionarProducto' => 'selectProducto', 'seleccionarProducto2' => 'selectProducto2'];
    public $tab = "tab3";
    public $inmueble;

    public function render()
    {
        return view('livewire.inmuebles.tabs-component');
    }

    public function cambioTab($tab)
    {
        $this->tab = $tab;
    }

    public function selectProducto($inmueble)
    {
        $this->inmueble = $inmueble;
        $this->tab = "tab2";
       
    }
    public function selectProducto2($inmueble)
    {
        $this->inmueble = $inmueble;
        $this->tab = "tab5";
    }
}
