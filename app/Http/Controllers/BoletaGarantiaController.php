<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\BoletaGarantia;
use app\models\Contrato;
use app\models\Monto;
use app\models\TipoMoneda;

class BoletaGarantiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contrato $contratos)
    {
        return view('boletagarantia.index',compact('contratos'),['contratos'=>Contrato::all(),'tipomoneda'=>TipoMoneda::all()]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoletaGarantia $boletagarantia, Contrato $contratos, Monto $montoboleta)
    {
        $boletagarantia -> update($request->only('monto_boleta','id_tipo_boleta'));
        $contratos -> create(array_merge($request->only('id_licitacion','id_contrato','res_adjudicacion','res_apruebacontrato','id_modalidad','aumento_contrato','res_aumento'),['id_monto'=>$montoboleta->id,'id_boleta'=>$boletagarantia->id_tipo_boleta,'id_monto_boleta'=>$boletagarantia->id]));

        return view('contratos.edit', compact('contratos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
