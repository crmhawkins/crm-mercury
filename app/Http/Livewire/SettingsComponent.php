<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Settings;
use App\Models\TipoInmueble;
use Illuminate\Support\Facades\Storage;

class SettingsComponent extends Component
{   
    use LivewireAlert;

    public $empresa;
    public $file;
    public $tipos;
    public $nuevoTipoNombre;
    public $selectedTipo;

    protected $rules = [
        'nuevoTipoNombre' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->tipos = TipoInmueble::all();
        $this->empresa = Settings::whereNull('deleted_at')->first();
    }

    public function render()
    {
        return view('livewire.settings.settings-component');
    }

    public function addTipo()
    {
        $this->validate();

        $tipo = TipoInmueble::create(['nombre' => $this->nuevoTipoNombre]);
        $this->tipos->push($tipo);
        $this->nuevoTipoNombre = '';
        $this->alert('success', 'New type added successfully!');
    }

    public function deleteTipo($id)
    {
        $tipo = TipoInmueble::findOrFail($id);
        $tipo->delete();
        $this->tipos = $this->tipos->filter(fn($tipo) => $tipo->id !== $id);
        $this->alert('success', 'Type deleted successfully!');
    }
}
