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
                                        @if ($contrato->montoboleta->tipomoneda->Nombre_tipo == 'CLP' || $contrato->montoboleta->tipomoneda->Nombre_tipo == 'UF')
                                        <div class="h5">Monto: ${{ number_format($contrato->monto->moneda)}} {{$contrato->montoboleta->tipomoneda->Nombre_tipo}}</div>
                                        @endif
                                        @if ($contrato->montoboleta->tipomoneda->Nombre_tipo == 'USD')
                                        <div class="h5">Monto: ${{ number_format($contrato->monto->moneda,2,',','.')}} {{$contrato->montoboleta->tipomoneda->Nombre_tipo}}</div>
                                        @endif
                                        <div class="h5">ID Contrato: {{$contrato->id_contrato}}</div>
                                        <div class="h5">Proveedor: {{$contrato->convenio->proveedor->nombre_proveedor}}</div>
                                        <div class="h5">Rut Proveedor: {{$contrato->convenio->proveedor->rut_proveedor}}</div>
                                        <div class="h5">Referente: {{$contrato->convenio->user->name}}</div>
                                        <div class="h5">Estado del Contrato: {{$contrato->estadocontrato->estado_contrato}}</div>
                                        <div class="h5">Comentario: {{$contrato->descripcion}}</div>
                                        <div class="h5">Aumento Contrato: {{$contrato->aumento_contrato}}</div>
                                        <div class="h5">Res. Aumento Contrato: {{$contrato->res_aumento}}</div>
                                    </div>
                                    @foreach ($montoboleta as $boletas)
                                        @if ($boletas->id_contrato_original != NULL)
                                        <div class="container p-3 my-3 border">
                                            <div class="h5">N° Documento Boleta Garantía: {{$boletas->id_boleta}}</div>
                                            @if ($boletas->tipomoneda->Nombre_tipo == 'CLP')
                                            <div class="h5">Monto Boleta Garantía: ${{ number_format($boletas->monto_boleta)}} {{$boletas->tipomoneda->Nombre_tipo}}</div>
                                            @endif
                                            @if ($boletas->tipomoneda->Nombre_tipo == 'USD')
                                            <div class="h5">Monto Boleta Garantía: ${{ number_format($boletas->monto_boleta,2,',','.') }} {{$boletas->tipomoneda->Nombre_tipo}}</div>
                                            @endif
                                            @if ($boletas->tipomoneda->Nombre_tipo == 'UF')
                                            <div class="h5">Monto Boleta Garantía: ${{ number_format($boletas->monto_boleta)}} {{$boletas->tipomoneda->Nombre_tipo}}</div>
                                            @endif
                                            <div class="h5">Fecha Vencimiento Boleta Garantía: {{$boletas->fecha_vencimiento}}</div>
                                        </div>
                                        @endif
                                    @endforeach
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <a href="{{ route('contratos.boletagarantia.index', $contrato->id) }}" class="btn btn-facebook">Boletas de Garantía</a>
                                            <a href="{{ route('contratos.aumento.index', $contrato->id) }}" class="btn btn-facebook">Agregar Modificación  de Contrato</a>
                                            <a href="{{ route('contratos.multas.index', $contrato->id) }}" class="btn btn-danger">Multas del Contrato</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-primary">
                                                    <th>Resolucion Aumento</th>
                                                    <th>Monto a Aumentar</th>
                                                    <th>Fecha de Resolución</th>
                                                    <th>Monto Total</th>
                                                    <th>Monto Boleta Garantía</th>
                                                    <th>Acciones</th>
                                                </thead>
                                                <tbody>
                                                @foreach ($aumento as $aumentos)
                                                    @if ($aumentos->id_contrato == $contrato->id)
                                                    <tr>
                                                        <td>{{ $aumentos->res_aumento }}</td>
                                                        @if ($aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo == 'CLP')
                                                        <td>$ {{ number_format($aumentos->monto_aumento) }} {{$aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo}}</td>
                                                        @endif
                                                        @if($aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo == 'USD')
                                                        <td>$ {{ number_format($aumentos->monto_aumento + $aumentos->contrato->monto->moneda,2,',','.') }} {{$aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo}}</td>
                                                        @endif
                                                        @if($aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo == 'UF')
                                                        <td>$ {{ number_format($aumentos->monto_aumento,2,',','.') }} {{$aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo}}</td>
                                                        @endif
                                                        <td>{{ $aumentos->created_at }}</td>
                                                        @if ($aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo == 'CLP')
                                                        <td>$ {{ number_format($aumentos->monto_total) }} {{$aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo}}</td>
                                                        @endif
                                                        @if($aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo == 'USD')
                                                        <td>$ {{ number_format($aumentos->monto_aumento + $aumentos->contrato->monto->moneda,2,',','.') }} {{$aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo}}</td>
                                                        @endif
                                                        @if($aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo == 'UF')
                                                        <td>$ {{ number_format($aumentos->monto_aumento + $aumentos->contrato->monto->moneda) }} {{$aumentos->contrato->montoboleta->tipomoneda->Nombre_tipo}}</td>
                                                        @endif
                                                        @if ($aumentos->montoboleta->tipomoneda->Nombre_tipo == 'CLP')
                                                        <td>$ {{ number_format($aumentos->montoboleta->monto_boleta) }} {{$aumentos->montoboleta->tipomoneda->Nombre_tipo}}</td>
                                                        @endif
                                                        @if ($aumentos->montoboleta->tipomoneda->Nombre_tipo == 'USD')
                                                        <td>$ {{ number_format($aumentos->montoboleta->monto_boleta,2,',','.') }} {{$aumentos->montoboleta->tipomoneda->Nombre_tipo}}</td>
                                                        @endif
                                                        @if ($aumentos->montoboleta->tipomoneda->Nombre_tipo == 'UF')
                                                        <td>$ {{ number_format($aumentos->montoboleta->monto_boleta) }} {{$aumentos->montoboleta->tipomoneda->Nombre_tipo}}</td>
                                                        @endif
                                                        <td class="td-actions text-right">
                                                            @can('admin_destroy')
                                                            <form action="{{route('contratos.aumento.destroy', [$contrato, $aumentos])}}" method="post" style="display: inline-block" onsubmit="return confirm('¿Estás seguro?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                    </tr>
                                                    @endif
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
