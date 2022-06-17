<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Aumento;
use App\Models\MontoBoleta;
use App\Models\BoletaGarantia;

class AumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contrato $contratos)
    {

        return view('aumentos.index', compact('contratos'),['tipoboleta'=>BoletaGarantia::all()]);
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
        $monto_boleta = number_format($request->monto_boleta,2,',','.');
        //$monto_aumento = number_format($request->monto_aumento);
        //dd($monto);
        $montoboleta = MontoBoleta::create(array_merge($request->only('monto_boleta','fecha_inicio','fecha_fin','id_boleta','id_tipo_boleta'),['monto_boleta'=>$monto_boleta]));
        Aumento::create(array_merge($request->only('monto_aumento','res_aumento','id_contrato','id_monto_boleta'),['id_contrato'=>$contratos->id,'id_monto_boleta'=>$montoboleta->id]));
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
    public function destroy($id)
    {
        //
    }
}
