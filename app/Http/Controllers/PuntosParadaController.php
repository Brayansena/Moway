<?php

namespace App\Http\Controllers;

use App\Models\puntos_parada;
use Illuminate\Http\Request;

class PuntosParadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puntos_parada = puntos_parada::all();
        return $puntos_parada;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puntos_parada=new puntos_parada();
        $puntos_parada->id_letra  =$request->id_letra  ;
        $puntos_parada->nombre_punto_parada =$request->nombre_punto_parada ;

        $puntos_parada->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'empresa creada',
            'producto'=>$puntos_parada,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puntos_parada  $puntos_parada
     * @return \Illuminate\Http\Response
     */
    public function show(puntos_parada $puntos_parada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puntos_parada  $puntos_parada
     * @return \Illuminate\Http\Response
     */
    public function edit(puntos_parada $puntos_parada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\puntos_parada  $puntos_parada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, puntos_parada $puntos_parada)
    {

        $puntos_parada = puntos_parada::findOrFail($request->id);
        $puntos_parada->id_letra  =$request->id_letra;
        $puntos_parada->nombre_punto_parada =$request->nombre_punto_parada ;
        $puntos_parada->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se actualizo su informacion',
            'producto'=>$puntos_parada,

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puntos_parada  $puntos_parada
     * @return \Illuminate\Http\Response
     */
    public function destroy(puntos_parada $id)
    {
        $id->delete();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se elimino punto de parada correctamente'

        ],201);
    }
}
