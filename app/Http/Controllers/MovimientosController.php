<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Movimientos;
use App\Models\UnidadMedida;
use App\Models\Cantidad;
use App\Models\Monto;
use App\Models\Establecimiento;
use App\Models\Dispositivo;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MovimientosExport;
use App\Exports\SaldoContratosExport;



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
        return view('movimientos.create',compact('contratos'),['unidadesmedidas'=>UnidadMedida::all(),'establecimientos'=>Establecimiento::all(),'dispositivos'=>Dispositivo::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contrato $contratos, Monto $monto)
    {
        $movimientos = Movimientos::all();
        $contadormovimientos = count(Movimientos::all());

        for ($i = 0; $i<=$contadormovimientos-1;$i++){
            $montoactualizado = $movimientos[$i]->monto_contrato_actualizado;
        }
        if ($contadormovimientos >=1){
            $montoconsumido = $request->cantidad * $request->valor_unitario;
            $montototal = $montoactualizado - $montoconsumido;
            $movimiento = Movimientos::create(array_merge($request->only('id_oc','nmr_factura','fecha_factura','valor_factura','id_contrato','monto_contrato_actualizado','id_establecimiento','id_dispositivo'),['id_contrato'=>$contratos->id,'monto_contrato_actualizado'=>$montototal]));
            $cantidad = Cantidad::create(array_merge($request->only('id_unidad','cantidad','valor_unitario','id_movimiento'),['id_movimiento'=>$movimiento->id]));
        }
        else{

            $montocontrato = $contratos->monto->moneda;
            $montoconsumido = $request->cantidad * $request->valor_unitario;
            $montototal = $montocontrato - $montoconsumido;

            $movimiento = Movimientos::create(array_merge($request->only('id_oc','nmr_factura','fecha_factura','valor_factura','id_contrato','monto_contrato_actualizado','id_establecimiento','id_dispositivo'),['id_contrato'=>$contratos->id,'monto_contrato_actualizado'=>$montototal]));
            $cantidad = Cantidad::create(array_merge($request->only('id_unidad','cantidad','valor_unitario','id_movimiento'),['id_movimiento'=>$movimiento->id]));
        }
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
    public function edit(Contrato $contratos, Movimientos $movimiento)
    {
        return view('movimientos.edit',compact('contratos','movimiento'),['movimiento'=>Movimientos::all(),'cantidad'=>Cantidad::all(),'contratos'=>Contrato::all(),'unidadesmedidas'=>UnidadMedida::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contratos, Movimientos $movimiento, Cantidad $cantidad)
    {
        $cantidad = $movimiento->cantidad;
        $movimientos = Movimientos::all();
        $contadormovimientos = count(Movimientos::all());

        if ($contadormovimientos >= 2){
            for ($i = 0; $i<=$contadormovimientos-2;$i++){
                $montoactualizado = $movimientos[$i]->monto_contrato_actualizado;
            }
            $montoconsumido = $request->cantidad * $request->valor_unitario;
            $montototal = $montoactualizado - $montoconsumido;
        }
        $movimiento->update(array_merge($request->only('id_oc','nmr_factura','fecha_factura','valor_factura','id_contrato','monto_contrato_actualizado'),['id_contrato'=>$contratos->id,'monto_contrato_actualizado'=>$montototal]));
        $cantidad->update(array_merge($request->only('id_unidad','cantidad','valor_unitario','id_movimiento'),['id_movimiento'=>$movimiento->id]));
        return redirect()->route('contratos.movimientos.index', $contratos->id)->with('success', 'Movimiento actualizado correctamente.');
    }

    public function exportExcel(Contrato $contrato)
    {
        //dd($contrato);
        return Excel::download(new MovimientosExport($contrato), 'movimientos de '.$contrato->id_contrato.'.xlsx');
    }
    public function exportSaldoExcel(Contrato $contrato)
    {
        //dd($contrato);
        return Excel::download(new SaldoContratosExport($contrato), 'movimientos de '.$contrato->id_contrato.'.xlsx');
    }

    public function buscarOC(Request $request)
    {
        $contrato = $request->get('contrato');
        $oc = $request->get('oc');
        $contrato = Contrato::find($contrato);
        if($contrato->movimientos->where('id_oc', '=', $oc)->count() > 0){
            return response()->json(['existe' => 'true']);
          }
          return response()->json(['existe' => 'false']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Contrato $contratos, Cantidad $cantidad, Request $request, Movimientos $movimiento)
    {
        //dd($movimiento->cantidad);
        $movimiento->cantidad -> delete();
        $movimiento -> delete();
        return redirect()->route('contratos.movimientos.index', $contratos->id);
    }
}
