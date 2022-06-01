<?php

namespace App\Http\Controllers;

use App\Models\semana;
use Illuminate\Http\Request;

class SemanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semana = semana::all();
        return $semana;
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
        $semana = new semana();
        $semana->Hora_inicio_semana =$request->Hora_inicio_semana;
        $semana->Hora_final_semana =$request->Hora_final_semana;

        $semana->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'empresa creada',
            'producto'=>$semana,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\semana  $semana
     * @return \Illuminate\Http\Response
     */
    public function show(semana $semana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\semana  $semana
     * @return \Illuminate\Http\Response
     */
    public function edit(semana $semana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\semana  $semana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, semana $semana)
    {
        $semana = semana::findOrFail($request->id);

        $semana->Hora_inicio_semana =$request->Hora_inicio_semana;
        $semana->Hora_final_semana =$request->Hora_final_semana;

        $semana->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se actualizo su informacion',
            'producto'=>$semana,

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\semana  $semana
     * @return \Illuminate\Http\Response
     */
    public function destroy(semana $id)
    {
        $id->delete();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se elimino semana correctamente'

        ],201);
    }
}
