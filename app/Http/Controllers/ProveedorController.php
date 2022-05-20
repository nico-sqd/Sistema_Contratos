<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Direccion;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $proveedores = Proveedor::with('direccion')
        ->whereRaw('UPPER(nombre_proveedor) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhere('rut_proveedor','LIKE','%'.$texto.'%')
        ->orWhereRaw('UPPER(representante) LIKE ?', ['%' . strtoupper($texto) . '%'])
        ->orWhere('rut_representante','LIKE','%'.$texto.'%')
        ->orwhereHas('direccion', function (Builder $query) use ($texto) {
            $query->whereRaw('UPPER(direccion) LIKE ?', ['%' . strtoupper($texto) . '%'])
            ->orWhereRaw('UPPER(comuna) LIKE ?', ['%' . strtoupper($texto) . '%'])
            ->orWhereRaw('UPPER(region) LIKE ?', ['%' . strtoupper($texto) . '%']);
        })
        ->orderBy('id','asc')
        ->paginate(5);
        return view('proveedor.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create',['direccion'=>Direccion::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = Proveedor::create($request->only('nombre_proveedor', 'rut_proveedor', 'representante','rut_representante','direccion_id'));
        return redirect()->route('proveedor.index', $proveedor->id)->with('success', 'Usuario creado correctamente.');
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
    public function edit(Proveedor $proveedores)
    {
        return view('proveedor.edit',compact('proveedores'),['direccion'=>Direccion::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedores)
    {
        $direccion = $proveedores->direccion;
        $direccion->update($request->only('direccion', 'comuna', 'region'));
        $proveedores->update($request->only('nombre_proveedor', 'rut_proveedor', 'representante','rut_representante','direccion_id'));
        return redirect()->route('proveedor.index', $proveedores->id)->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedores)
    {
        $proveedores->delete();
        return redirect()->route('proveedor.index');
    }
}
