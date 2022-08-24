<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Movimientos;
use App\Models\UnidadMedida;
use App\Models\Cantidad;
use App\Models\Monto;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contrato $contratos, Request $request)
    {
        return view('movimientos.index',compact('contratos'),['contratos'=>Contrato::all(),'movimientos'=>Movimientos::all(),'cantidades'=>Cantidad::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contrato $contratos)
    {
        return view('movimientos.create',compact('contratos'),['unidadesmedidas'=>UnidadMedida::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contrato $contratos, Monto $monto)
    {
        $montocontrato = $contratos->monto;
        $movimiento = Movimientos::create(array_merge($request->only('id_oc','nmr_factura','fecha_factura','valor_factura','id_contrato'),['id_contrato'=>$contratos->id]));
        $cantidad = Cantidad::create(array_merge($request->only('id_unidad','cantidad','valor_unitario','id_movimiento'),['id_movimiento'=>$movimiento->id]));
        //$monto_total =  $contratos->monto->moneda - ($cantidad->valor_unitario * $cantidad->cantidad);
        //$montocontrato->update(array_merge($request->only('moneda'),['moneda'=>$monto_total]));
        return redirect()->route('contratos.movimientos.index', $contratos->id)->with('success', 'Movimiento agregado correctamente.');
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
