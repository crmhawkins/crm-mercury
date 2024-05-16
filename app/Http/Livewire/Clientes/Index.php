<?php

namespace App\Http\Livewire\Clientes;
use App\Models\Clientes;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $clientes;

    public function render()
    {
            $this->clientes = Clientes::all();  
        return view('livewire.clientes.index', [
            'clientes' => $this->clientes]);
    }

}
