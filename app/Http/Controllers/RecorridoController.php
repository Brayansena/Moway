<?php

namespace App\Http\Controllers;

use App\Models\recorrido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecorridoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recorrido = recorrido::all();
        return $recorrido;
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
        $recorrido = new recorrido();
        $recorrido->id_festivos  =$request->id_festivos  ;
        $recorrido->id_semanas  =$request->id_semanas  ;
        $recorrido->id_empresa =$request->id_empresa ;
        $recorrido->punto_inicio=$request->punto_inicio;
        $recorrido->punto_final=$request->punto_final;
        $recorrido->imagen_recorrido=$request->imagen_recorrido;
        $recorrido->numero_ruta=$request->numero_ruta;

        $recorrido->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'empresa creada',
            'producto'=>$recorrido,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recorrido  $recorrido
     * @return \Illuminate\Http\Response
     */
    public function show(recorrido $recorrido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recorrido  $recorrido
     * @return \Illuminate\Http\Response
     */
    public function edit(recorrido $recorrido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recorrido  $recorrido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recorrido $recorrido)
    {
        $recorrido = recorrido::findOrFail($request->id);
        $recorrido->id_festivos  =$request->id_festivos  ;
        $recorrido->id_semanas  =$request->id_semanas  ;
        $recorrido->id_empresa =$request->id_empresa ;
        $recorrido->punto_inicio=$request->punto_inicio;
        $recorrido->punto_final=$request->punto_final;
        $recorrido->imagen_recorrido=$request->imagen_recorrido;
        $recorrido->numero_ruta=$request->numero_ruta;
        $recorrido->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se actualizo su informacion',
            'producto'=>$recorrido,

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recorrido  $recorrido
     * @return \Illuminate\Http\Response
     */
    public function destroy(recorrido $id)
    {
        $id->delete();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se elimino recorrido correctamente'

        ],201);
    }
    public function ConsultaRecorridos_rutas_empresa(){
        $recorrido=DB::table('recorridos')
        ->join('empresas','empresas.id' , '=', 'recorridos.id_empresa')
        ->select('recorridos.punto_inicio','recorridos.punto_final','recorridos.numero_ruta')
        ->where('empresas.id' , '=',2)
        ->get();
        return $recorrido;
    }

    public function ConsultaRecorridos_Imagen_ruta_empresa(){
        $recorrido=DB::table('recorridos')
        ->join('empresas','empresas.id' , '=', 'recorridos.id_empresa')
        ->select('recorridos.punto_inicio','recorridos.punto_final','recorridos.imagen_recorrido','recorridos.numero_ruta')
        ->where('recorridos.numero_ruta', '=', 10)
        ->where('empresas.id' , '=',2)
        ->get();
        return $recorrido;
    }
}
