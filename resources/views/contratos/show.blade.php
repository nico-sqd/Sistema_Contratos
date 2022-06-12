@extends('layouts.main', ['activePage' => 'contratos', 'titlePage' => 'Contratos'])
@section('content')
    <div class="content">
        <div class="container-fuid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-tittle">{{ $contrato->convenio->convenio }}</h4>
                                    <p class="card-category">Datos de {{$contrato->convenio->id_licitacion}}</p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ url()->route('contratos.index') }}" class="btn btn-facebook"><i class="material-icons">arrow_back</i></a>
                                        </div>
                                    </div>
                                    <div class="container p-3 my-3 border">
                                        <div class="h5">Nombre Licitacion: {{$contrato->convenio->convenio}}</div>
                                        <div class="h5">Modalidad: {{$contrato->modalidad->nombre_modalidad}}</div>
                                        <div class="h5">ID Licitacion: {{$contrato->convenio->id_licitacion}}</div>
                                        <div class="h5">Vigencia: Inicio: {{$contrato->convenio->vigencia_inicio}} Fin: {{$contrato->convenio->vigencia_fin}}</div>
                                        <div class="h5">Res. Adjudicación: {{$contrato->res_adjudicacion}}</div>
                                        <div class="h5">Res. Aprueba Contrato: {{$contrato->res_apruebacontrato}}</div>
                                        <div class="h5">Monto: ${{$contrato->monto->moneda}}</div>
                                        <div class="h5">Boleta Garantía: {{$contrato->montoboleta->monto_boleta}}</div>
                                        <div class="h5">ID Contrato: {{$contrato->id_contrato}}</div>
                                        <div class="h5">Proveedor: {{$contrato->convenio->proveedor->nombre_proveedor}}</div>
                                        <div class="h5">ID Contrato: {{$contrato->convenio->proveedor->rut_proveedor}}</div>
                                        <div class="h5">Referente: {{$contrato->convenio->user->name}}</div>
                                        <div class="h5">Estado del Contrato: {{$contrato->estadocontrato->estado_contrato}}</div>
                                        <div class="h5">Comentario: {{$contrato->descripcion}}</div>
                                        <div class="h5">Aumento Contrato: {{$contrato->aumento_contrato}}</div>
                                        <div class="h5">Res. Aumento Contrato: {{$contrato->res_aumento}}</div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-facebook">Agregar aumento de contrato</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-primary">
                                                    <th>Resolucion Aumteno</th>
                                                    <th>Monto a aumentar</th>
                                                    <th>fecha de aumento</th>
                                                    <th>Monto Total</th>
                                                </thead>
                                                <tbody>
                                                @foreach ($contrato as $contratos)
                                                    <tr>
                                                        <td>{{ $contrato->res_aumento }}</td>
                                                        <td>${{ $contrato->aumento_contrato }}</td>
                                                        <td>{{ $contrato->updated_at }}</td>
                                                        <td>${{ $contrato->monto->moneda }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
