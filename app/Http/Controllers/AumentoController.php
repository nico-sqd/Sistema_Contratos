<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Aumento;
use App\Models\MontoBoleta;
use App\Models\BoletaGarantia;
use App\Models\TipoMoneda;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Files;

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
        $archivo = $request->all();
        $archivo['uuid'] = (string) Str::uuid();
        $archivo['id_contrato'] = $contratos->id;

        //dd($request);
        //en php.ini subir upload_max_filesize = 2M a los megas que quieras subir y post_max_size = 8M a los megas que quieras subir
        $validator = Validator::make($request->all(), [
            'nombre_archivo' => ['required','mimes:pdf,jpg,jpeg,png,xlsx,docx,doc,ppt,octet-stream','max:25000']
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors('No se puede subir este tipo de archivo o es muy pesado');
        }

        if($request->hasFile('nombre_archivo')){
            $archivo['nombre_archivo'] = $request->file('nombre_archivo')->getClientOriginalName();
            $request->file('nombre_archivo')->storeAs('folder_file',$archivo['nombre_archivo']);
        }
        //dd($request);
        $archivoboleta = Files::create($archivo);

        $contrato = $contratos;
        $monto = $contratos->monto;
        $montoboleta = $contratos->montoboleta;
        $monto->update(array_merge($request->only('moneda'),['moneda'=>$monto->moneda+$request->monto_aumento]));
        $id_boleta = MontoBoleta::create(array_merge($request->only('monto_boleta','fecha_vencimiento','id_boleta','id_tipo_boleta','id_moneda','otraboleta','institucion','id_contrato_modificada','archivo'),['id_contrato_modificada'=>$contrato->id, 'archivo'=>$archivoboleta->id]));
        $contrato->update(array_merge($request->only('aumento_contrato','res_aumento','id_monto_boleta'),['aumento_contrato'=>$request->monto_aumento,'id_monto_boleta'=>$id_boleta->id]));
        Aumento::create(array_merge($request->only('monto_aumento','res_aumento','id_contrato','id_monto_boleta','monto_total','res_aprueba_aumento','fecha_resolucion'),['id_contrato'=>$contratos->id,'id_monto_boleta'=>$montoboleta->id,'monto_total'=>$monto->moneda]));
        //$id_boleta->update(array_merge($request->only()));
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
        dd($aumentos);
        $aumentos-> montoboleta -> delete();
        $aumentos -> delete();
        return redirect()->route('contratos.show', $contrato->id);
    }
}
