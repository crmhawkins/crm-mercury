<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\TipoInmueble;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoInmueble::all();
        return view('settings.index', compact('tipos'));
    }

    /**
     * Store a newly created type of property in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nuevoTipoNombre' => 'required|string|max:255',
        ]);

        TipoInmueble::create(['nombre' => $request->nuevoTipoNombre]);

        return redirect()->route('settings.index')->with('success', 'New type added successfully');
    }

    /**
     * Remove the specified type of property from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = TipoInmueble::findOrFail($id);
        $tipo->delete();

        return redirect()->route('settings.index')->with('success', 'Type deleted successfully');
    }
}
