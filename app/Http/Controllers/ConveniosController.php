<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convenio;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ConveniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $convenios = Convenio::with('proveedor')
        ->whereRaw('UPPER(id_licitacion) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhereRaw('UPPER(convenio) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhere('vigencia_inicio','LIKE','%'.$texto.'%')
        ->orWhere('vigencia_fin','LIKE','%'.$texto.'%')
        ->orWhere('monto','LIKE','%'.$texto.'%')
        ->orWhereRaw('UPPER(admin) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orwhereHas('proveedor', function (Builder $query) use ($texto) {
            $query->Where('rut_proveedor','LIKE','%'.$texto.'%');
        })
        ->orwhereHas('user', function (Builder $query) use ($texto) {
            $query->whereRaw('UPPER(name) LIKE ?', ['%' . strtoupper($texto) . '%']);
        })
        ->orderBy('id','asc')
        ->paginate(5);
        return view('convenios.index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('convenios.create',['proveedor'=>Proveedor::all(),'referente'=>User::role('Referente')->get(),'admin'=>User::role('Administrador')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $convenios = Convenio::create(array_merge($request->only('id_licitacion', 'convenio', 'rut_proveedor','rut','vigencia_inicio','vigencia_fin','monto','admin')));
        return redirect()->route('convenios.index', $convenios->id_licitacion)->with('success', 'Usuario creado correctamente.');
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
    public function edit(Convenio $convenios)
    {
        return view('convenios.edit', compact('convenios'),['proveedor'=>Proveedor::all(),'referente'=>User::role('Referente')->get(),'admin'=>User::role('Administrador')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenios)
    {
        $user = $convenios->user;
        $proveedor = $convenios->proveedor;
        $user->update($request->only('name'));
        $proveedor->update($request->only('rut_proveedor'));
        $convenios->update($request->only('id_licitacion', 'convenio', 'vigencia_inicio','vigencia_fin','monto','admin'));
        return redirect()->route('convenios.index', $convenios->id)->with('success', 'Convenio actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convenio $convenios)
    {
        $convenios->delete();
        return redirect()->route('convenios.index');
    }
}
