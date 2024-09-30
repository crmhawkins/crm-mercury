<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inmuebles;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    $title = $request->title;
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
    //la url base es la url que vienedel .env
    $urlBase = env('APP_URL');
    foreach($galeria as $key => $foto){
        $galeria[$key] = str_replace($urlBase, '', $foto);
    }
    $logo = public_path('img/logo.png');
    $datos = [
        'inmueble' => $inmueble,
        'galeria' => $galeria,
        'logo' => $withLogo != null ? $logo : null,
        'title' => $title
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
        // Verificar si el usuario está autenticado
    if (!auth()->check()) {
        return response()->json(['message' => 'No autenticado'], 401);
    }
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
    private $loginValidationRules = [
        'email' => 'required|email',
        'password' => 'required'
    ];
    
    public function loginUser(Request $request)
    {
      
        $validateUser = Validator::make($request->all(), $this->loginValidationRules);
        if($validateUser->fails()){
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $validateUser->errors()
            ], 401);
        }
        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'message' => 'El email y el password no corresponden con alguno de los usuarios',
            ], 401);
        }
        $user = User::where('email', $request->email)->first();

        return response()->json([
            'message' => 'Login correcto',
            'token' => $user->createToken("API ACCESS TOKEN")->plainTextToken
        ], 200);
        // Si la autenticación es exitosa, devolver un json con el token de autenticación
        return response()->json(['token' => auth()->user()->createToken('authToken')->plainTextToken], 200);
    }
 




}
