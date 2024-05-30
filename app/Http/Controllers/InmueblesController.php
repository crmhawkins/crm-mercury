<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inmuebles;
use Barryvdh\DomPDF\Facade\Pdf;

class InmueblesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //devolver la request

        $idinmueble = $request->idinmueble;

        return view('inmuebles.index' , ['idinmueble' => $idinmueble] );
    }

    public function pdf(Request $request)
{
    // Obtener el ID del inmueble del request
    $idinmueble = $request->id;
    $withLogo = $request->withLogo;
    //dd($idinmueble, $withLogo);

    // Obtener los datos del inmueble
    $inmueble = Inmuebles::where('id', $idinmueble)->first();
    if(!$inmueble){
        // Retornar 404 si no se encuentra el inmueble
        return response()->json(['message' => 'No se encontró el inmueble'], 404);
    }

    // Decodificar la galería JSON a un array
    $galeria = json_decode($inmueble->galeria, true);

    // Modificar las rutas de las imágenes para quitarles la URL base
    foreach($galeria as $key => $foto){
        $galeria[$key] = str_replace('http://localhost:8000/', '', $foto);
    }
    $logo = public_path('img/logo.png');
    $datos = [
        'inmueble' => $inmueble,
        'galeria' => $galeria,
        'logo' => $withLogo != null ? $logo : null
    ];

    // Generar el PDF con los datos del inmueble
    $pdf = app('dompdf.wrapper');
    $pdf->getDomPDF()->set_option("enable_php", true);

    $pdf = Pdf::loadView('inmuebles.generar', $datos)->setPaper('a4', 'vertical');
    $pdf->render();
    return $pdf->stream('inmueble.pdf');
}


    public function apiInmueble(Request $request)
    {
        // Crear la query de Inmueble con Eloquent para hacer filtros de búsqueda
        $query = Inmuebles::query();
    
        // Filtrar por id
        if($request->has('id')){
            $query->where('id', $request->id);
        }
    
        // Filtrar por localidad
        if($request->has('location')){
            $query->where('localidad', $request->location);
        }
    
        // Filtrar por disponibilidad
        if($request->has('availability')){
            $query->where('disponibilidad', $request->availability);
        }
    
        // Filtrar por código postal
        if($request->has('cod_postal')){
            $query->where('cod_postal', $request->cod_postal);
        }
    
        // Filtrar por estado
        if($request->has('status')){
            $query->where('estado', $request->status);
        }
    
        // Ejecutar la query y obtener los resultados
        $inmuebles = $query->get();
    
        // Si no se encuentran inmuebles, devolver un json con un mensaje de error
        if($inmuebles->isEmpty()){
            return response()->json(['message' => 'No se encontraron inmuebles'], 404);
        }
    
        // Si se encuentran inmuebles, devolver un json con los inmuebles
        return response()->json($inmuebles, 200);
    }
    

 




}
