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
use Illuminate\Database\Eloquent\Builder;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $contratos = Contrato::whereRaw('UPPER(id_contrato) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhere('res_adjudicacion','LIKE','%'.$texto.'%')
        ->orWhere('res_apruebacontrato','LIKE','%'.$texto.'%')
        ->orWhere('aumento_contrato','LIKE','%'.$texto.'%')
        ->orWhere('res_aumento','LIKE','%'.$texto.'%')
        ->orwhereHas('monto', function (Builder $query) use ($texto) {
            $query->where('moneda','LIKE','%'.$texto.'%');
        })
        ->orwhereHas('convenio', function (Builder $query) use ($texto) {
            $query->whereRaw('UPPER(id_licitacion) LIKE ?', ['%' . strtoupper($texto) . '%']);
        })
        ->orwhereHas('boletagarantia', function (Builder $query) use ($texto) {
            $query->whereRaw('UPPER(documentos_garantia) LIKE ?', ['%' . strtoupper($texto) . '%']);
        })
        ->orwhereHas('modalidad', function (Builder $query) use ($texto) {
            $query->whereRaw('UPPER(abreviacion_modalidad) LIKE ?', ['%' . strtoupper($texto) . '%']);
        })
        ->orderBy('id','asc')
        ->paginate(5);
        return view('contratos.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contratos.create',['tipomoneda'=>TipoMoneda::all(),'tipoboleta'=>BoletaGarantia::all(),
        'modalidad'=>Modalidad::all(),'montoboletagarantia'=>MontoBoleta::all(),'id_licitacion'=>Convenio::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $montoboleta = Monto::create($request->only('moneda', 'id_tipo_moneda'));
        $boletagarantia = MontoBoleta::create($request->only('monto_boleta','id_tipo_boleta'));
        $contrato = Contrato::create(array_merge($request->only('id_licitacion','id_contrato','res_adjudicacion','res_apruebacontrato','id_modalidad','aumento_contrato','res_aumento','id_tipo_moneda'),['id_monto'=>$montoboleta->id,'id_boleta'=>$boletagarantia->id_tipo_boleta,'id_monto_boleta'=>$boletagarantia->id]));
        return redirect()->route('contratos.index', $contrato->id)->with('success', 'Usuario creado correctamente.');
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
    public function edit(Contrato $contratos)
    {
        return view('contratos.edit', compact('contratos'),['tipomoneda'=>TipoMoneda::all(),'tipoboleta'=>BoletaGarantia::all(),
        'modalidad'=>Modalidad::all(),'montoboletagarantia'=>MontoBoleta::all(),'id_licitacion'=>Convenio::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        $montoboleta = $contrato->monto;
        $boletagarantia = $contrato->montoboleta;
        $montoboleta->update($request->only('moneda', 'id_tipo_moneda'));
        $boletagarantia->update($request->only('monto_boleta','id_tipo_boleta'));
        $contrato->update($request->only('id_licitacion','id_contrato','res_adjudicacion','res_apruebacontrato','id_modalidad','aumento_contrato','res_aumento','id_tipo_moneda'));
        return redirect()->route('contratos.index', $contrato->id)->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        $contrato -> delete();
        return redirect()->route('contratos.index');
    }
}
