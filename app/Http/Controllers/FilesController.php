<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Files;
use App\Models\Convenio;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class FilesController extends Controller
{
    public function index(Request $request, Contrato $contratos)
    {   
        //dd($contratos->id);
        $texto = trim($request->get('texto'));
        $files = $contratos->files()->whereRaw('UPPER(nombre_archivo) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orderBy('id','asc')
        ->paginate(5);
        //**$files = Files::whereRaw('UPPER(nombre_archivo) LIKE ?', ['%' . strtoupper($texto) . '%'])
        return view('files.index', compact('files','contratos'));
    }

    public function create()
    {
        dd("updload");
    }

    public function store(Request $request, Contrato $contratos)
    {
        $archivo = $request->all();
        $archivo['uuid'] = (string) Str::uuid();
        $archivo['id_contrato'] = $contratos->id;

        if($request->hasFile('nombre_archivo')){
            $archivo['nombre_archivo'] = $request->file('nombre_archivo')->getClientOriginalName();
            $request->file('nombre_archivo')->storeAs('folder_file',$archivo['nombre_archivo']);
        }
        //dd($request);
        Files::create($archivo);
        return redirect()->route('contratos.files.index', $contratos->id)->with('success', 'Archivo subido correctamente.');
    }

    public function download($uuid)
    {
        $file = Files::where('uuid',$uuid)->firstOrFail();
        $pathToFile = storage_path("app/folder_file/" . $file->nombre_archivo);
        return response()->download($pathToFile);
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Contrato $contrato, Files $file)
    {
        //$contratos= $files->contrato;
        //dd($files->id);
        $file->delete();
        return redirect()->route('contratos.files.index', $contrato->id);;
    }
}
