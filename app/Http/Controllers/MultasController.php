<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Monto;
use App\Models\BoletaGarantia;
use App\Models\MontoBoleta;
use App\Models\Modalidad;
use App\Models\TipoMoneda;
use App\Models\Convenio;
use App\Models\Proveedor;
use App\Models\User;
use App\Models\Aumento;
use App\Models\EstadoContrato;
use App\Models\Files;
use App\Models\Multas;
use App\Models\EstadoPagoMulta;
use App\Models\EstadoTramiteMulta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class MultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contrato $contratos, Request $request)
    {
        $diferencia = $request->diferencia;
        return view('multas.index',compact('contratos','diferencia'),['contratos'=>Contrato::all(),'multas'=>Multas::all()]);
    }
    public function index_alertas(Contrato $contratos, Request $request)
    {
        $diferencia = $request->diferencia;
        return view('multas.index_alertas',compact('contratos','diferencia'),['contratos'=>Contrato::all(),'multas'=>Multas::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contrato $contratos)
    {
        return view('multas.create',compact('contratos'),['multas'=>Multas::all(),'estadopagomulta'=>EstadoPagoMulta::all(),'estadotramitemulta'=>EstadoTramiteMulta::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contrato $contratos)
    {
        //dd($request->descripcion);
        $multas = Multas::create(array_merge($request->only('nmr_memo_informe','nmr_oficio','fecha_oficio','fecha_notificacion','plazo_dias_notificacion','presenta_descargos',
        'nmr_memo_juridica','fecha_memo','nmr_res_exenta','fecha_res_exenta','plazo_dias_exenta',
        'presenta_rec_de_reposicion','nmr_memo_juridica_2','nmr_res_exenta_2','fecha_res_exenta_2','descripcion','id_contrato','id_estadomulta','id_estadotramite','nmr_factura','nmr_ingreso','fecha_comprobante'),['id_contrato'=>$contratos->id]));
        return redirect()->route('contratos.multas.index', $contratos->id)->with('success', 'Multa creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contratos, Multas $multa)
    {
        return view('multas.show',compact('contratos','multa'),['multas'=>Multas::all(),'estadopagomulta'=>EstadoPagoMulta::all(),'estadotramitemulta'=>EstadoTramiteMulta::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contratos, Multas $multa)
    {
        //dd($multa);
        return view('multas.edit',compact('contratos','multa'),['estadopagomulta'=>EstadoPagoMulta::all(),'estadotramitemulta'=>EstadoTramiteMulta::all(),'multas'=>Multas::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contratos, Multas $multa)
    {
        $multa->update(array_merge($request->only('nmr_memo_informe','nmr_oficio','fecha_oficio','fecha_notificacion','plazo_dias_notificacion','presenta_descargos',
        'nmr_memo_juridica','fecha_memo','nmr_res_exenta','fecha_res_exenta','plazo_dias_exenta',
        'presenta_rec_de_reposicion','nmr_memo_juridica_2','nmr_res_exenta_2','fecha_res_exenta_2','descripcion','id_contrato','id_estadomulta','id_estadotramite','nmr_factura','nmr_ingreso','fecha_comprobante')));
        return redirect()->route('contratos.multas.index', $contratos->id)->with('success', 'Multa editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contratos, Multas $multa)
    {
        //dd($multas);
        $multa->delete();
        return redirect()->route('contratos.multas.index', $contratos->id);
    }
}
