<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
