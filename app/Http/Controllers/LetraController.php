<?php

namespace App\Http\Controllers;

use App\Models\letra;
use Illuminate\Http\Request;

class LetraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letra = letra::all();
        return $letra;
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
        $letra = new letra();

        $letra->nombre_letra =$request->nombre_letra;

        $letra->save();


        return response()->json([
            'menssage' => 'success',
            'info'=>'letra creada',
            'producto'=>$letra,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\letra  $letra
     * @return \Illuminate\Http\Response
     */
    public function show(letra $letra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\letra  $letra
     * @return \Illuminate\Http\Response
     */
    public function edit(letra $letra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\letra  $letra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, letra $letra)
    {
        $letra = letra::findOrFail($request->id);
        $letra->nombre_letra =$request->nombre_letra ;

        $letra->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'update letra susefull',
            'producto'=>$letra,

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\letra  $letra
     * @return \Illuminate\Http\Response
     */
    public function destroy(letra $id)
    {
        $id->delete();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se elimino letra correctamente'

        ],201);
    }
}
