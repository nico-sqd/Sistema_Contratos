<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Aumento;
use App\Models\MontoBoleta;
use App\Models\BoletaGarantia;
use App\Models\TipoMoneda;

class AumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contrato $contratos)
    {

        return view('aumentos.index', compact('contratos'),['tipoboleta'=>BoletaGarantia::all(),'tipomoneda'=>TipoMoneda::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contrato $contratos)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contrato $contratos)
    {
        //dd($request->monto_aumento);
        //$monto_boleta = number_format($request->monto_boleta,2,',','.');
        //$monto_aumento = number_format($request->monto_aumento);
        //dd($request->monto_aumento);
        $contrato = $contratos;
        $monto = $contratos->monto;
        $montoboleta = $contratos->montoboleta;
        $monto->update(array_merge($request->only('moneda'),['moneda'=>$monto->moneda+$request->monto_aumento]));
        $id_boleta = MontoBoleta::create(array_merge($request->only('monto_boleta','fecha_inicio','fecha_fin','id_boleta','id_tipo_boleta','id_moneda'),['fecha_inicio'=>$request->vigencia_inicio, 'fecha_fin'=>$request->vigencia_fin]));
        $contrato->update(array_merge($request->only('aumento_contrato','res_aumento','id_monto_boleta'),['aumento_contrato'=>$request->monto_aumento,'id_monto_boleta'=>$id_boleta->id]));
        Aumento::create(array_merge($request->only('monto_aumento','res_aumento','id_contrato','id_monto_boleta','monto_total'),['id_contrato'=>$contratos->id,'id_monto_boleta'=>$montoboleta->id,'monto_total'=>$monto->moneda]));
        return redirect()->route('contratos.show', $contratos->id)->with('success', 'Aumento modificado');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato, Aumento $aumentos, MontoBoleta $montoboleta)
    {  
        //d($aumentos->montoboleta);
        $aumentos-> montoboleta -> delete();
        $aumentos -> delete();
        return redirect()->route('contratos.show', $contrato->id);
    }
}
