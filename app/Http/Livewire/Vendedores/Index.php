<?php

namespace App\Http\Livewire\Vendedores;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $vendedores;

    public function render()
    {
        $this->vendedores = User::all();

        return view('livewire.vendedores.index', [
            'vendedores' => $this->vendedores]);
    }

}
