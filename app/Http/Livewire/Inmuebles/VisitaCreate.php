<?php

namespace App\Http\Livewire\Inmuebles;

use App\Models\Clientes;
use App\Models\Evento;
use App\Models\HojaVisita;
use App\Models\Inmuebles;
use App\Models\TipoVivienda;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\Propietarios;

class VisitaCreate extends Component
{
    use LivewireAlert;
    public $clientes;
    public $inmueble_id;
    public $fecha;
    public $ruta;
    public $firma;
    public $cliente_id;
    public $signature;
    public $inmueble;

    protected $listeners = ['saveSignature'];

    public function mount($inmueble_id = null)
    {
        $this->inmueble_id = $inmueble_id;
        $this->inmueble = Inmuebles::where('id', $inmueble_id)->first();
        $this->clientes = Clientes::all();
    }
    public function render()
    {
        return view('livewire.inmuebles.visita-create');
    }

    public function saveSignature()
    {
        $this->alert('success', "Successfully signed");

        $encoded_image = explode(",", $this->signature)[1];
        $decoded_image = base64_decode($encoded_image);
        $imageName = Str::random(10) . '.' . "png";

        $rutaDirectorio = 'firmas_clientes' ;

        // Crea el directorio si no existe
        if (!File::exists(public_path($rutaDirectorio))) {
            File::makeDirectory(public_path($rutaDirectorio), 0777, true);
        }

        // Guardar el archivo
        Storage::disk('public')->put($rutaDirectorio . '/' . $imageName, $decoded_image);

        $this->firma = $rutaDirectorio . '/'. $imageName;
    }
    public function submit()
    {
        if($this->cliente_id == null || $this->cliente_id == 0 || $this->cliente_id == ""){
            $this->alert('error', 'Select a client!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
            ]);
            return;
        }
        $clientePDF = Clientes::where('id', $this->cliente_id)->first();
        $inmueblePDF = Inmuebles::where('id', $this->inmueble_id)->first();

        //dd($this->cliente_id,$clientePDF, $inmueblePDF);

        $propietario = Propietarios::where('id', $inmueblePDF->propietario_id)->first();


        $pdf = Pdf::loadView('inmuebles.visitaPDF', ['datos' => [
            'fecha' => $this->fecha,
            'firma' => $this->firma,
            'cliente' => [
                'nombre' => $clientePDF->nombre,
                'apellidos' => $clientePDF->apellidos,
                'dni' => $clientePDF->dni,
                'email' => $clientePDF->email,
                'telefono' => $clientePDF->telefono,
            ],
            'inmueble' => [
                'm2' => $inmueblePDF->m2,
                'm2_construidos' => $inmueblePDF->m2_construidos,
                'habitaciones' => $inmueblePDF->habitaciones,
                'banos' => $inmueblePDF->banos,
                'propietario_id' => $propietario ? $propietario->nombre : 'Not assigned',
                'direccion' => $inmueblePDF->direccion,
                'localidad' => $inmueblePDF->localidad,
                'cod_postal' => $inmueblePDF->cod_postal,
                'galeria' => $inmueblePDF->galeria,
                'disponibilidad' => $inmueblePDF->disponibilidad,
            ]
        ]]);

        // Ruta del directorio donde se guardará el archivo
        $rutaDirectorio = 'hojas_visita/' ;

        // Crea el directorio si no existe
        if (!File::exists(public_path($rutaDirectorio))) {
            File::makeDirectory(public_path($rutaDirectorio), 0777, true);
        }

        // Ruta del archivo PDF
        $rutaPdf = $rutaDirectorio . '/' . $this->cliente_id . "-" . $this->inmueble_id . "-" . $this->fecha . '.pdf';
        $rutaCompleta = public_path($rutaPdf);

        // Guarda el PDF en un archivo en el servidor.
        $pdf->save($rutaCompleta);

        // Añade la ruta del PDF a los datos validados.
        $this->ruta = $rutaDirectorio . '/' . $this->cliente_id . "-" . $this->inmueble_id . "-" . $this->fecha . '.pdf';
		
		$rutaMail = $this->ruta;

        $eventoSave = Evento::create([
            'titulo' => 'Date with ' .  $clientePDF->nombre . ' ' . $clientePDF->apellidos,
            'descripcion' => 'Cited client :' . $clientePDF->nombre . ' ' . $clientePDF->apellido . "<br>" . 'Property in relation to the appointment: ' . $inmueblePDF->direccion,
            'fecha_inicio' => $this->fecha,
            'fecha_fin' => $this->fecha,
            'tipo_tarea' => 'opcion_1',
            'cliente_id' => $this->cliente_id,
            'inmueble_id' => $this->inmueble_id,
            'inmobiliaria' => null,
        ]);
		
		
		$texto = 'Hi, ' . $clientePDF->nombre . ' ' . $clientePDF->apellidos . ". Attached is the property visit sheet that you have signed."; 
		
	// Mail::raw($texto, function ($message) use ($clientePDF, $inmueblePDF, $rutaMail) {
    // $message->from('admin@admin.com', 'Mercury');
    // $message->to($clientePDF->email, $clientePDF->nombre . ' ' . $clientePDF->apellidos);
	// $message->to(env('MAIL_USERNAME'));
    // $message->subject("Mercury - Hoja de visita del inmueble " . $inmueblePDF->direccion);
	// $message->attach($rutaMail);

    // });

        $validatedData = $this->validate(
            [
                'cliente_id' => 'required',
                'inmueble_id' => 'required',
                'fecha' => 'required',
                'ruta' => 'required',
            ],
            // Mensajes de error
            //en ingles
            [
                'cliente_id.required' => 'The client field is required.',
                'inmueble_id.required' => 'The property field is required.',
                'fecha.required' => 'The date field is required.',
                'ruta.required' => 'The route field is required.',
            ]
        );

        // Guardar datos validados
        $visitaSave = HojaVisita::create($validatedData);



        // Alertas de guardado exitoso
        if ($visitaSave) {
            $this->alert('success', '¡Correctly registered visit sheet!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'ok',
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', '¡Visit sheet information could not be saved!', [
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
}
