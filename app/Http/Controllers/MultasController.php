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
    public function index(Contrato $contratos)
    {
        return view('multas.index',compact('contratos'),['contratos'=>Contrato::all(),'multas'=>Multas::all()]);
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
        Multas::create(array_merge($request->only('descripcion','id_contrato'),['id_contrato'=>$contratos->id]));
        return redirect()->route('contratos.multas.index', $contratos->id)->with('success', 'Multa creada correctamente.');
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
    public function destroy(Contrato $contratos, Multas $multas)
    {
        $multas -> delete();
        return redirect()->route('contratos.multas.index', $contratos->id);
    }
}
