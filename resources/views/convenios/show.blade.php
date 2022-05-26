@extends('layouts.main', ['activePage' => 'convenios', 'titlePage' => 'Convenios'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">{{ $convenio->convenio }}</h4>
                                    <p class="card-category">Datos de {{$convenio->id_licitacion}}</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ url()->route('convenios.index') }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                        </div>
                                    </div>
                                    <div class="container p-3 my-3 border">
                                        <div class="h5">Nombre Licitacion: {{$convenio->convenio}}</div>
                                        <div class="h5">Modalidad: {{$convenio->contrato->modalidad->nombre_modalidad}}</div>
                                        <div class="h5">ID Licitacion: {{$convenio->id_licitacion}}</div>
                                        <div class="h5">Vigencia: Inicio: {{$convenio->vigencia_inicio}} Fin: {{$convenio->vigencia_fin}}</div>
                                        <div class="h5">Res. Adjudicación: {{$convenio->contrato->res_adjudicacion}}</div>
                                        <div class="h5">Res. Aprueba Contrato: {{$convenio->contrato->res_apruebacontrato}}</div>
                                        <div class="h5">Monto: ${{$convenio->contrato->monto->moneda}}</div>
                                        <div class="h5">Boleta Garantía: {{$convenio->contrato->montoboleta->monto_boleta}}</div>
                                        <div class="h5">ID Contrato: {{$convenio->contrato->id_contrato}}</div>
                                        <div class="h5">Proveedor: {{$convenio->proveedor->nombre_proveedor}}</div>
                                        <div class="h5">ID Contrato: {{$convenio->proveedor->rut_proveedor}}</div>
                                        <div class="h5">Referente: {{$convenio->user->name}}</div>
                                        <div class="h5">Aumento Contrato: {{$convenio->contrato->aumento_contrato}}</div>
                                        <div class="h5">Res. Aumento Contrato: {{$convenio->contrato->res_aumento}}</div>
                                    </div>
                                    {{--<div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID Contrato</th>
                                                <th>ID Licitacion</th>
                                                <th>Resolucion de Adj.</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $convenio->proveedor->nombre_proveedor }}</td>
                                                    <td>{{ $convenio->rut }}</td>
                                                    <td>{{ $convenio->contrato->res_adjudicacion }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>--}}
                                </div>
                                <!--footer-->
                                <!--End footer-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
