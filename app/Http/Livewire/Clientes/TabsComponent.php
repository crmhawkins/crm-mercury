<?php

namespace App\Http\Livewire\Clientes;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TabsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['seleccionarProducto' => 'selectProducto'];
    public $tab = "tab3";
    public $cliente;

    public function render()
    {
        return view('livewire.clientes.tabs-component');
    }

    public function cambioTab($tab){
        $this->tab = $tab;
    }

    public function selectProducto($cliente)
    {
           $this->cliente = $cliente;
            $this->tab = "tab2";
       
    }
}
