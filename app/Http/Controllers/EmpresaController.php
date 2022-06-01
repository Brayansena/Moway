<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = empresa::all();
        return $empresa;
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
        $empresa=new empresa();
        $empresa->nit_empresa=$request->nit_empresa;
        $empresa->nombre_empresa=$request->nombre_empresa;
        $empresa->direccion_empresa=$request->direccion_empresa;
        $empresa->img_empresa=$request->img_empresa;


        $empresa->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'empresa creada',
            'producto'=>$empresa,
        ],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empresa $empresa)
    {
        $empresa = empresa::findOrFail($request->id);
        $empresa->nit_empresa=$request->nit_empresa;
        $empresa->nombre_empresa=$request->nombre_empresa;
        $empresa->direccion_empresa=$request->direccion_empresa;
        $empresa->img_empresa=$request->img_empresa;
        $empresa->save();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se actualizo su informacion',
            'producto'=>$empresa,

        ],201);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(empresa $id)
    {
        $id->delete();

        return response()->json([
            'menssage' => 'success',
            'info'=>'se elimino su empresa correctamente'

        ],201);
    }

    public function consultaNameEmpresa(){

        $empresa = empresa::all('nombre_empresa','img_empresa');
        return $empresa;
    }
}
