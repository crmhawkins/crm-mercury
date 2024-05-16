<?php

namespace App\Http\Livewire\Propietarios;

use Livewire\Component;

class TabsComponent extends Component
{
    protected $listeners = ['seleccionarProducto' => 'selectProducto'];
    public $tab = "tab3";
    public $propietario;

    public function render()
    {
        return view('livewire.propietarios.tabs-component');
    }

    public function cambioTab($tab){
        $this->tab = $tab;
    }

    

    public function selectProducto($propietario)
    {
        $this->propietario = $propietario;
        $this->tab = "tab2";
    }
}
