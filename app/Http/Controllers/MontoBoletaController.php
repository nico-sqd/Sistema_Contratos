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


class MontoBoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Contrato $contratos)
    {
        return view('boletagarantia.index',compact('contratos'),['tipoboleta'=>BoletaGarantia::all(),'contratos'=>Contrato::all(),'tipomoneda'=>TipoMoneda::all(),'montoboleta'=>Montoboleta::all()]);
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
        $idboleta = MontoBoleta::create(array_merge($request->only('monto_boleta','fecha_vencimiento','id_boleta','id_tipo_boleta','id_moneda','otraboleta','institucion','id_contrato_modificada','archivo'),['id_contrato_modificada'=>$contrato->id, 'archivo'=>$archivoboleta->id]));
        $contrato->update(array_merge($request->only('id_boleta','id_monto_boleta'),['id_boleta'=>$request->id_tipo_boleta,'id_monto_boleta'=>$idboleta->id]));
        return redirect()->route('contratos.boletagarantia.index', $contrato->id)->with('success', 'Aumento modificado');
    }

    public function download($uuid)
    {
        $file = Files::where('uuid',$uuid)->firstOrFail();
        $pathToFile = storage_path("app/folder_file/" . $file->nombre_archivo);
        return response()->download($pathToFile);
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
    public function edit(Contrato $contratos, MontoBoleta $boleta, $id)
    {
        $boleta = MontoBoleta::find($id);
        return view('boletagarantia.edit', compact('contratos','boleta'),['tipomoneda'=>TipoMoneda::all(),'tipoboleta'=>BoletaGarantia::all(),
        'montoboleta'=>MontoBoleta::all(),'contrato'=>Contrato::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contratos, MontoBoleta $boleta, $id)
    {
        $boleta = MontoBoleta::find($id);
        $boleta->update($request->only('monto_boleta','fecha_vencimiento','id_boleta','id_tipo_boleta','id_moneda','otraboleta','institucion'));
        return redirect()->route('contratos.boletagarantia.index', $contratos->id)->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contratos, MontoBoleta $boleta, $id)
    {
        $boleta = MontoBoleta::find($id);
        $boleta->delete();
        return redirect()->route('contratos.boletagarantia.index', $contratos->id);
    }
}
