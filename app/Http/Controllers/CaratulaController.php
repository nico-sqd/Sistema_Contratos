<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caratula;
use App\Models\Convenio;
use App\Models\Proveedor;
use App\Models\Contrato;
use App\Models\Monto;
use App\Models\MontoBoleta;
use App\Models\User;
use App\Models\Modalidad;

class CaratulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caratulas=Caratula::paginate(5);
        return view('caratulas.index', compact('caratulas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caratulas.create',['convenios'=>Convenio::all(),'proveedores'=>Proveedor::all(),'contratos'=>Contrato::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caratulas = Caratula::create($request->only('id_proveedor','id_convenio','id_contrato'));
        return redirect()->route('caratula.index', $caratulas->id)->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Caratula $caratulas)
    {
        return view('caratulas.show', compact('caratulas'), ['convenios'=>Convenio::all(),'proveedores'=>Proveedor::all(),'contratos'=>Contrato::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Caratula $caratulas)
    {
        return view('caratulas.edit',  compact('caratulas'), ['convenios'=>Convenio::all(),'proveedores'=>Proveedor::all(),'contratos'=>Contrato::all(),
'monto'=>Monto::all(),'montoboleta'=>MontoBoleta::all(),'modalidad'=>Modalidad::all(),'user'=>User::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caratula $caratulas, Convenio $convenios, Proveedor $proveedores, Contrato $contratos, Monto $monto, MontoBoleta $montoboleta, Modalidad $modalidad, User $user)
    {
        $modalidad->update($request->only('nombre_modalidad'));
        $convenios->update($request->only('convenio','id_licitacion','vigencia_inicio','vigencia_fin'));
        $contratos->update($request->only('res_apruebacontrato','id_contrato','aumento_contrato','res_aumento'));
        $monto->update($request->only('moneda'));
        $montoboleta->update($request->only('monto_boleta'));
        $proveedores->update($request->only('nombre_proveedor','rut_proveedor'));
        $user->update($request->only('name'));
        return redirect()->route('caratula.show', $caratulas->id);
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
