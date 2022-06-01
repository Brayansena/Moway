<?php

namespace App\Http\Controllers;

use App\Models\puntosparada_recorrido;
use Illuminate\Http\Request;

class PuntosparadaRecorridoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puntosparada_recorrido = puntosparada_recorrido::all();
        return $puntosparada_recorrido;
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
        $puntosparada_recorrido = new puntosparada_recorrido();

        $puntosparada_recorrido->id_puntos_paradas  =$request->id_puntos_paradas  ;
        $puntosparada_recorrido->id_recorridos  =$request->id_recorridos  ;

        $puntosparada_recorrido->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'paradas y recorridos creados con exito creada',
            'producto'=>$puntosparada_recorrido,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puntosparada_recorrido  $puntosparada_recorrido
     * @return \Illuminate\Http\Response
     */
    public function show(puntosparada_recorrido $puntosparada_recorrido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puntosparada_recorrido  $puntosparada_recorrido
     * @return \Illuminate\Http\Response
     */
    public function edit(puntosparada_recorrido $puntosparada_recorrido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\puntosparada_recorrido  $puntosparada_recorrido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, puntosparada_recorrido $puntosparada_recorrido)
    {
        $puntosparada_recorrido = puntosparada_recorrido::findOrFail($request->id);

        $puntosparada_recorrido->id_puntos_paradas  =$request->id_puntos_paradas  ;
        $puntosparada_recorrido->id_recorridos  =$request->id_recorridos  ;

        $puntosparada_recorrido->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se actualizo su informacion',
            'producto'=>$puntosparada_recorrido,

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puntosparada_recorrido  $puntosparada_recorrido
     * @return \Illuminate\Http\Response
     */
    public function destroy(puntosparada_recorrido $id)
    {
        $id->delete();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se elimino recorrido correctamente'

        ],201);
    }
}
