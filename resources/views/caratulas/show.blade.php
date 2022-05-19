@extends('layouts.main', ['activePage' => 'caratulas', 'titlePage' => 'Caratulas'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">{{ $caratulas->convenio->convenio }}</h4>
                                    <p class="card-category">Datos de {{$caratulas->convenio->id_licitacion}}</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ url()->route('caratula.index') }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                        </div>
                                    </div>
                                    <div class="container p-3 my-3 border">
                                        <div class="h5">Nombre Licitacion: {{$caratulas->convenio->convenio}}</div>
                                        <div class="h5">Modalidad: {{$caratulas->contrato->modalidad->nombre_modalidad}}</div>
                                        <div class="h5">ID Licitacion: {{$caratulas->convenio->id_licitacion}}</div>
                                        <div class="h5">Vigencia: Inicio: {{$caratulas->convenio->vigencia_inicio}} Fin: {{$caratulas->convenio->vigencia_fin}}</div>
                                        <div class="h5">Res. Adjudicación: {{$caratulas->contrato->res_adjudicacion}}</div>
                                        <div class="h5">Res. Aprueba Contrato: {{$caratulas->contrato->res_apruebacontrato}}</div>
                                        <div class="h5">Monto: ${{$caratulas->contrato->monto->moneda}}</div>
                                        <div class="h5">Boleta Garantía: {{$caratulas->contrato->montoboleta->monto_boleta}}</div>
                                        <div class="h5">ID Contrato: {{$caratulas->contrato->id_contrato}}</div>
                                        <div class="h5">Proveedor: {{$caratulas->proveedor->nombre_proveedor}}</div>
                                        <div class="h5">ID Contrato: {{$caratulas->proveedor->rut_proveedor}}</div>
                                        <div class="h5">Referente: {{$caratulas->convenio->user->name}}</div>
                                        <div class="h5">Aumento Contrato: {{$caratulas->contrato->aumento_contrato}}</div>
                                        <div class="h5">Res. Aumento Contrato: {{$caratulas->contrato->res_aumento}}</div>
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
                                                    <td>{{ $caratulas->proveedor->nombre_proveedor }}</td>
                                                    <td>{{ $caratulas->convenio->rut }}</td>
                                                    <td>{{ $caratulas->contrato->res_adjudicacion }}</td>
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
