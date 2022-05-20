<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\DB;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $establecimientos = Establecimiento::whereRaw('UPPER(establecimiento) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhereRaw('UPPER(abreviacion) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhere('codigo_deis','LIKE','%'.$texto.'%')
        ->orderBy('id','asc')
        ->paginate(5);

        return view('establecimiento.index', compact('establecimientos','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('establecimiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Establecimiento::create($request->only('establecimiento', 'abreviacion', 'codigo_deis'));
        return redirect()->route('establecimiento.index');
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
    public function edit(Establecimiento $establecimientos)
    {
        return view('establecimiento.edit', compact('establecimientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimiento $establecimientos)
    {
        $establecimientos->update($request->only('establecimiento','codigo_deis','abreviacion'));

        return redirect()->route('establecimiento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establecimiento $establecimientos)
    {
        $establecimientos->delete();

        return redirect()->route('establecimiento.index');
    }
}
