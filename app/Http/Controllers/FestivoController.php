<?php

namespace App\Http\Controllers;

use App\Models\festivo;
use Illuminate\Http\Request;

class FestivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festivo = festivo::all();
        return $festivo;
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
        $festivo = new festivo();

        $festivo->Hora_inicio_festivos =$request->Hora_inicio_festivos;
        $festivo->Hora_final_festivos =$request->Hora_final_festivos;

        $festivo->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'empresa creada',
            'producto'=>$festivo,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\festivo  $festivo
     * @return \Illuminate\Http\Response
     */
    public function show(festivo $festivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\festivo  $festivo
     * @return \Illuminate\Http\Response
     */
    public function edit(festivo $festivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\festivo  $festivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, festivo $festivo)
    {
        $festivo = festivo::findOrFail($request->id);

        $festivo->Hora_inicio_festivos =$request->Hora_inicio_festivos;
        $festivo->Hora_final_festivos =$request->Hora_final_festivos;

        $festivo->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se actualizo su informacion',
            'producto'=>$festivo,

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\festivo  $festivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(festivo $id)
    {
        $id->delete();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se elimino festivo correctamente'

        ],201);
    }
}
