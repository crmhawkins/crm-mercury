<?php

namespace App\Http\Livewire\Propietarios;

use Livewire\Component;
use App\Models\Propietarios;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $propietarios;

    public function render()
    {
        
            $this->propietarios = Propietarios::all();
        
        return view('livewire.propietarios.index', [
            'propietarios' => $this->propietarios]);
    }
}
